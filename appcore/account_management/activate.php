<?php 
require_once '../CONFIG.php';
require_once DB_HANDLER;

$activation=new AccountActivation($_GET['token']);
$activation->activate_token();

class AccountActivation
{
	private $token;
	private $db;
	
	function __construct($token)
	{
		if(empty($token))
			$this->direct_to_target(0);
		$this->token=$token;
		$this->db=new Database();
	}
	
	function activate_token()
	{
		$db=$this->db;
		$token=$this->token;
		
		if($this->token_is_used())
			$this->direct_to_target(1);
		
		if($result=$db->execute_query("SELECT `user_id` FROM `user_activation_tokens` WHERE `value`='".$token."'"))
		{
			if($db->execute_query("UPDATE `user_activation_tokens` SET `is_used`='1' WHERE `value`='".$token."'"))
			{
				$user_id=$result->fetch_assoc()['user_id'];
				if($db->execute_query("UPDATE `user_accounts` SET `is_active`=1 WHERE `uid`=".$user_id))
					$this->direct_to_target(1);
				else
					$this->direct_to_target(0);
			}
			else
			{
				$this->direct_to_target(0);
			}
		}
		else
		{
			$this->direct_to_target(0);
		}
	}
	
	function direct_to_target($status)
	{
		header('Location: /account.php?activation&status='.$status);
	}
	
	function token_is_used()
	{
		$db=$this->db;
		$token=$this->token;
		
		if($result=$db->execute_query("SELECT `is_used` FROM `user_activation_tokens` WHERE `value`='".$token."'"))
		{
			$is_used=$result->fetch_assoc()['is_used'];
			if($is_used=="1")
				return 1;
			return 0;
		}
		else
		{
			$this->direct_to_target(0);
		}
	}
}
?>