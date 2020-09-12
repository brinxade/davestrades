<?php 
if(session_id()=='')
	session_start();

require_once $_SERVER['DOCUMENT_ROOT'].'/appcore/CONFIG.php';
require_once 'user_functions.php';
require_once 'plugins/geo.php';
require_once DB_HANDLER.'';

$user_status="";

class User
{
	private $hash_algo="sha256";
	public $is_logged_in;
	private $db_connection;
	private $auth_token;
	private $target_uri="/";
	public $user_id;
	
	function __construct()
	{
		if(isset($_GET['past']))
			$this->target_uri=$_GET['past'];
		
		$this->set_login_status();
		$this->connect();
		$this->get_user_id();
	}
	
	function connect()
	{
		$this->db_connection=new Database();
		return $this->db_connection;
	}

	function get_user_id()
	{
		if(!empty($_SESSION['user-id']))
			$this->user_id=$_SESSION['user-id'];
		else
			$this->user_id="";
		return $this->user_id;
	}

	function set_login_status()
	{
		if(isset($_SESSION['user-logged-in']) && isset($_SESSION['user-auth-token']))
		{
			if(isset($_COOKIE['user-logged-in']) && isset($_COOKIE['user-auth-token']))
			{
				$this->is_logged_in=1;
			}
			else if(isset($this->auth_token))
			{
				setcookie("user-auth-token", $this->auth_token, 0, "/");
				setcookie("user-logged-in", 1, 0,"/");
				$this->is_logged_in=1;
			}
			else
			{
				$this->is_logged_in=0;
			}
		}
		else
		{
			$this->is_logged_in=0;
		}
	}
	
	function login($username,$password)
	{
		$db=$this->db_connection;
		$username=trim($username);
		
		$result=$db->execute_query("SELECT * FROM `user_accounts` WHERE (`username`='".$username."' OR `email`='".$username."') AND `password`='".hash($this->hash_algo,$password)."'");
		
		if($result->num_rows==1)
		{	
			$row=$result->fetch_assoc();
			if($row['is_active']=="1")
			{
				if($token=$this->gen_session_token($username))
				{
					$_SESSION['user-auth-token']=$token;
					$_SESSION['user-logged-in']=1;
					$_SESSION['user-id']=$row['uid'];
					
					$this->auth_token=$token;
					$this->set_login_status();
					$this->direct_user();
					
					return '<p class="accounts-status-text good center">Please Wait</p>';
				}
				else
				{
					return '<p class="accounts-status-text bad center">Server Error</p>';
				}
			}
			else
			{
				return  "<p align='center' style='color:red;font-weight:bold;margin:25px 0 0 0;'>Your email has not been confirmed yet</p>";
			}
		}
		else
		{
			return "<p align='center' style='color:red;font-weight:bold;margin:25px 0 0 0;'>Credentials Incorrect</p>";
		}
	}
	
	function register($data)
	{
		if(isset($data['reg-email']) && isset($data['reg-password']) && isset($data['reg-cpassword']))
		{
			if(!empty($data['reg-email']) && !empty($data['reg-password']) && !empty($data['reg-cpassword']))
			{
				if(isset($data['reg-isAgree']))
				{
					$db=$this->db_connection;
					
					$email=trim($data['reg-email']);
					$password=$data['reg-password'];
					$cpassword=$data['reg-cpassword'];
					$isAgree=$data['reg-isAgree'];
					if(isset($data['reg-newsSub']))
						$newsletter="1";
					else
						$newsletter="0";
					
					$location=get_user_location();
					
					$result=$db->execute_query("SELECT * FROM `user_accounts`");
					if($result->num_rows==0)
						$db->execute_query("ALTER TABLE `user_accounts` AUTO_INCREMENT = 1");
					
					$result=$db->execute_query("SELECT * FROM `user_accounts` WHERE `email`='".$email."'");
					
					if($result->num_rows>0)
					{	
						if ($result->fetch_assoc()['is_active']=="0")
							return '<p class="accounts-status-text bad center">Given email is already in use (pending confirmation)</p>';
						else
							return '<p class="accounts-status-text bad center">Given email is already in use</p>';
					}
					else
					{
						$data_validator=validate_registration_data($email, $password, $cpassword, $isAgree);
						if($data_validator==TRUE)
						{
							if($result=$db->execute_query("INSERT INTO `user_accounts` (
								email,password,location,TOS,newsletter_enable,is_active,created_on,last_used) VALUES (
								'".$email."','".hash($this->hash_algo,$password)."','".$location."','".$isAgree."','".$newsletter."',0,'".date('Y-m-d H:i:s',time())."','')"))
								{
									if(user_activation_dispatch($email,$this->gen_activation_token($email)))
										return '<p class="accounts-status-text good center">Please check your email to activate your account</p>';
									else
										return '<p class="accounts-status-text bad center">Internal Error. Please try again later.</p>';
								}
								else
								{
									return '<p class="accounts-status-text bad center">Internal Error</p>';
								}
						}
						else
						{
							return '<p class="accounts-status-text bad center">Please fulfill the requirements</p>';
						}
					}
				}
				else
				{
					return '<p class="accounts-status-text bad center">You have not accepted the terms of services</p>';
				}
			}
			else
			{
				return '<p class="accounts-status-text bad center">All Fields are Required</p>';
			}
		}
		else
		{
			return '<p class="accounts-status-text bad center">All Fields are Required</p>';
		}
	}
	
	function gen_activation_token($username)
	{
		$db=$this->db_connection;
		$token=hash($this->hash_algo,rand(0,200)*rand(-1,microtime(true))%microtime(true)*rand(0.1,100));
		
		if($result=$db->execute_query("SELECT `value` FROM `user_activation_tokens` WHERE `value`='".$token."'"))
		{
			if($result->num_rows==0)
			{
				$result=$db->execute_query("SELECT `uid` FROM `user_accounts` WHERE `email`='".$username."'");
				$user_id=$result->fetch_assoc()['uid'];
				
				if($result=$db->execute_query("INSERT INTO `user_activation_tokens`(user_id,value,issued_on,is_used) VALUES (".intval($user_id).",'".$token."','".date('Y-m-d H:i:s',time())."','0')"))
				{
					return $token;
				}
				else
				{
					return null;
				}
			}
			else
			{
				gen_activation_token($username);
			}
		}
		else
		{
			return null;
		}
	}
	
	function gen_session_token($username)
	{
		$db=$this->db_connection;
		$token=hash($this->hash_algo,rand(0,99)*rand(-1,microtime(true))%microtime(true));
		
		if($result=$db->execute_query("SELECT `session_token` FROM `user_accounts` WHERE `session_token`='".$token."'"))
		{
			if($result->num_rows==0)
			{
				if($result=$db->execute_query("UPDATE `user_accounts` SET  `session_token`='".$token."' WHERE `username`='".$username."'"))
					return $token;
				else
					return FALSE;
			}
			else
			{
				gen_session_token($username);
			}
		}
		else
		{
			return FALSE;
		}
	}
	
	function is_registered($email)		//email
	{
		$db=$this->db_connection;
		$result=$db->execute_query("SELECT * FROM `user_accounts` WHERE `email`='".$email."'");
			
		if($result->num_rows>0)
		{	
			if ($result->fetch_assoc()['is_active']=="0")
				return false;
			else
				return true;
		}
		
		return false;
	}
	
	function add_to_newsletter_list($email)
	{
		$db=$this->db_connection;
		if($result=$db->execute_query("UPDATE `user_accounts` SET  `newsletter_enable`='1' WHERE `email`='".$email."'"))
			return true;
		else
			return false;
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
	
	function logout()
	{
		setcookie("user-auth-token", "", time() - 3600, "/");
		setcookie("user-logged-in", "", time() - 3600,"/");
		session_destroy();
		return 1;
	}
	
	function direct_user($url="/")
	{
		if(isset($_GET['past']))
			$url=$_GET['past'];
		
		header("Location: ".$url);
	}
	
	function __destruct()
	{
		$this->db_connection->close();
	}
}

?>