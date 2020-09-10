<?php 

	if(session_id()=='')
		session_start();

	require_once 'user.php';
	$user=new User();
	if($user->logout())
		$user->direct_user();
	
?>