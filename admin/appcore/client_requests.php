<?php 

require_once 'user.php';

$user=get_user_object();
$user->change_password($_GET['cp'],$_GET['np']);
		
if(!empty($_GET['cp']) && !empty($_GET['np']) && !empty($_GET['npc']))
{
	if($_GET['np']==$_GET['npc'])
	{
	
	}
	else
	{
		$data_dispatch['status']="New password does not match";
		$data_dispatch['error']=1;
		echo json_encode($data_dispatch);
	}
}
?>