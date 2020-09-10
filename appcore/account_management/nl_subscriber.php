<?php 

if($_POST['nl_sub'])
{
	require_once 'user.php';
	
	$email=$_POST['nl_sub'];
	$user=new User();
	
	if($user->is_registered($email))
	{
		if($user->add_to_newsletter_list($email))
			echo 1; //successful
		else
			echo -1; //error
	}
	else
	{
		echo 0;  //email is not registered
	}
}

?>