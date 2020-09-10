<?php 
require_once '_config.php';
require_once DB_HANDLER;

if(session_id()=='')
	session_start();

$user_auth_status="";
$data_dispatch=array();

if(isset($_GET['req']))
{
	$req=$_GET['req'];
	if($req=="cp")
	{
		if(!empty($_GET['cp']) && !empty($_GET['np']) && !empty($_GET['npc']))
		{
			if($_GET['np']==$_GET['npc'])
			{
				$user=get_user_object();
				$user->change_password($_GET['cp'],$_GET['np']);
			}
			else
			{
				$data_dispatch['status']="New password does not match";
				$data_dispatch['error']=1;
				
				echo json_encode($data_dispatch);
			}
		}
	}
}


function get_user_object()
{
	return new User();
}

class User
{
	const CMS_HOMEPAGE="cms.php";
	const LOGIN_PAGE="index.php";
	
	private static $hash_algo="sha256";
	public $is_admin=0;
	private $db_connection;
	
	function __construct()
	{
		$this->set_user_type();
		$this->connect();
	}
	
	function connect()
	{
		$this->db_connection=new Database();
		return $this->db_connection;
	}
	
	function set_user_type()
	{
		if(isset($_SESSION['rex-cms-admin']))
		{
			if($_SESSION['rex-cms-admin']==1)
				$this->is_admin=1;
			else
				$this->is_admin=0;
		}
		else
		{
			$this->is_admin=0;
		}
	}
	
	function admin_login($username,$password)
	{
		$db=$this->db_connection;
		$username=trim($username);
		$result=$db->execute_query("SELECT * FROM `admin_accounts` WHERE `username`='".$username."' AND `password`='".hash($this::$hash_algo,$password)."'");
		if($result->num_rows==1)
		{
			if($token=$this->gen_session_token($username))
			{
				$_SESSION['rex-admin-token']=$token;
				$_SESSION['rex-cms-admin']=1;
				$this->set_user_type();
				header('Location: '.$this::CMS_HOMEPAGE);
				return '<p class="status-text good">Please Wait</p>';
			}
			else
			{
				return '<p class="status-text bad">Internal Error. Please contact dev.</p>';
			}
		}
		else
		{
			return '<p class="status-text bad">Invalid Credentials</p>';
		}
	}
	
	function gen_session_token($username)
	{
		$db=$this->db_connection;
		$token=hash("sha256",rand(0,99)*rand(-1,microtime(true))%microtime(true));
		
		if($result=$db->execute_query("SELECT `session_token` FROM `admin_accounts` WHERE `session_token`='".$token."'"))
		{
			if($result->num_rows==0)
			{
				if($result=$db->execute_query("UPDATE `admin_accounts` SET  `session_token`='".$token."' WHERE `username`='".$username."'"))
					return $token;
				else
					return 0;
			
			}
			else
			{
				gen_session_token($username);
			}
		}
		else
		{
			return 0;
		}
	}
	
	function execute_task($task)
	{
		if($this->is_admin==1) 
		{
			//Admin tasks here
			$task=($task=="logout")?$this->admin_logout():null;
		}
		else
		{
			//User tasks here
		}
	}
	
	function change_password($curr_pass, $new_pass)
	{
		$data_dispatch=array();
		$data_dispatch['error']=1;
		$data_dispatch['status']="Internal Error. Contact Dev.";
		
		$db=$this->db_connection;
		
		if(isset($_SESSION['rex-admin-token']))
		{
			$token=$_SESSION['rex-admin-token'];
			if($result=$db->execute_query("SELECT `password` FROM `admin_accounts` WHERE `session_token`='".$token."'"))
			{
				if($result->num_rows==1)
				{
					$row=$result->fetch_assoc();
					if($row['password']==hash($this::$hash_algo,$curr_pass))
					{
						if($result_1=$db->execute_query("UPDATE `admin_accounts` SET `password`='".hash($this::$hash_algo,$new_pass)."' WHERE `session_token`='".$token."'"))
						{
							$data_dispatch['status']="Password changed";
							$data_dispatch['error']=0;
						}
					}
					else
					{
						$data_dispatch['status']="Current password is incorrect.";
					}
				}
			}
		}
		echo json_encode($data_dispatch);
	}
	
	function admin_logout()
	{
		if($this->is_admin==1)
		{
			$this->is_admin=0;
			$_SESSION['rex-cms-admin']=0;
			session_destroy();
			header('Location: '.$this::LOGIN_PAGE);
		}
	}
	
	function direct_user($url)
	{
		header("Location: ".$url);
	}
	
	function __destruct()
	{
		$this->db_connection=null;
	}
}

?>