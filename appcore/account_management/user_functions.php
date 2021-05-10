<?php 

	require_once 'plugins/geo.php';
	require_once 'mailer/mailer.php';
	
	function get_user_location()
	{
		$ip_data=ip_info(file_get_contents("http://ipecho.net/plain"));
		$location=$ip_data['state'].", ".$ip_data['country'];
		return $location;
	}
	
	function validate_registration_data($email, $password, $cpassword, $isAgree)
	{
		$min_pass_length=7;
		$data_count=4;
		
		$errors=array();
		$valid_count=0;
		
		//email (1)
		if(filter_var($email, FILTER_VALIDATE_EMAIL))
			$valid_count+=1;
		else
			array_push($errors, "EMAIL_FORMAT_INVALID");
		
		//passwords (2)
		if(strlen($password)>$min_pass_length && $password==$cpassword)
			$valid_count+=2;
		else{
			array_push($errors, "PASSWORD_INVALID");
		}
		
		//TOS (1)
		if($isAgree=="1")
			$valid_count+=1;
		else
			array_push($errors, "TERMS_DENIED");
		
		if($valid_count==$data_count)
			return TRUE;
		//else
			//print_r($errors);
	}
	
	function user_activation_dispatch($email, $token)
	{
		if(empty($token))
			return false;

		if(dispatch_activation($email,$token))
			return TRUE;
	}
	
?>