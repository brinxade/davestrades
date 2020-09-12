<!doctype html>
<?php

if(session_id()=='')
	session_start();

require_once 'appcore/account_management/user.php';

$self_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$user=new User();
if(isset($_POST['login-email']) && isset($_POST['login-password']))
	$user_status=$user->login($_POST['login-email'],$_POST['login-password']);
else if(isset($_POST['reg-email']))
	$user_status=$user->register($_POST);

if($user->is_logged_in)
	$user->direct_user();

//REFERRAL MESSAGE
$ref_message="";
if(isset($_GET['ref-msg']))
{
	$ref_message='<div class="shadow-soft-1 accounts-modal-1"><p>'.$_GET['ref-msg'].'</p></div>';
}
?>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
		
		<link rel="icon" type="image/png" href="favicon.png">
		<title>Dave's Trades Account</title>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		
		<link rel="stylesheet" href="css/accounts.css" type="text/css"/>
		<link rel="stylesheet" href="css/common.css" type="text/css"/>
	</head>
	<body class="accounts-body">
		<header align="center" id="header-mini">
			<a href="index.php"><h1 class="jumbo-caption-medium nm-top">DAVE&apos;S TRADES</h1></a>
		</header>
		<section id="accounts-con">
			<?php 
			if(isset($_GET['login']))
			echo '
			<div id="login">
				'.$ref_message.'
				<form class="shadow-soft-1" id="login-form" method="POST" action="'.$self_link.'">
					<h3 align="center" class="jumbo-caption-medium">Log In</h3>
					<div class="input-field">
						<label>Email or Username</label>
						<input id="login-email" name="login-email" type="text" placeholder="Type your email or username"/>
					</div>
					<div class="input-field">
						<label>Password</label>
						<input id="login-password" name="login-password" type="password" placeholder="Type your password"/>
					</div>
						<p align="right" class="nm-bottom"><a href="#">Forgot Password?</a></p>
						'.$user_status.'
						<button class="form-btn" type="submit">Login</button>
						<p align="center"><strong><a href="account.php?signup">Don&apos;t have an account? Sign up.</a></strong></p>
					</div>
				</form>
			</div>';
			else if(isset($_GET['signup']))
				echo '
				<div id="signup">
					<form class="shadow-soft-1" id="signup-form" method="POST" action="'.$self_link.'">
						<h3 align="center" class="jumbo-caption-medium">Sign Up</h3>
						<div class="input-field">
							<label>Email</label>
							<input id="reg-email" name="reg-email" type="text" placeholder="Type your email"/>
						</div>
						<div class="input-field">
							<label>Password</label>
							<input id="reg-password" name="reg-password" type="password" placeholder="Type your password"/>
							<span class="input-requirement">Password must be atleast 8 characters long</span>
						</div>
						<div class="input-field">
							<label>Confirm Password</label>
							<input id="reg-cpassword" name="reg-cpassword" type="password" placeholder="Type again"/>
						</div>
						<div class="input-field" align="left">
							<div style="margin:5px 0;"><input type="checkbox" id="reg-isAgree" name="reg-isAgree" value="1"/><label class="inline">I Agree to Terms of Services</label></div>
							<div><input type="checkbox" id="reg-newsSub" name="reg-newsSub" value="1"/><label class="inline">Subscribe to weekly newsletter</label></div>
						</div>
						'.$user_status.'
						<button class="form-btn" type="submit">Sign Up</button>
						<p align="center"><strong><a href="account.php?login">Already have an account? Sign in.</a></strong></p>
					</form>
				</div>';
				else if(isset($_GET['activation']) && isset($_GET['status']))
				{
					$html='
					<div id="acc-activate" align="center">
						<div class="content shadow-soft-1" align="center">';
					if($_GET['status']=="1")
					{
						$html.='<h1 class="title nm-bottom">Account Activated</h1>
						<p class="acc-p-style-1 clr-green-1">Welcome to the family. Login to get started!</p>
						<a href="'.$_SERVER['PHP_SELF'].'?login'.'" class="acc-btn-style-1">Login</a>';
					}
					else
					{
						$html.='<h1 class="title nm-bottom">Account Activation Failed</h1>
						<p class="acc-p-style-1 clr-red-1">Activation token invalid</p>
						<a href="#" class="acc-btn-style-1">Support</a>';
					}
					$html.='
						</div>
					</div>
					';
					
					echo $html;
				}
			?>
		</section>
		<footer id="footer-mini" align="center"><span class="copyright">Designed by Brinxade &copy; 2020. All Rights Reserved.</span></footer>
		<script src="https://kit.fontawesome.com/6f67bd47b3.js" crossorigin="anonymous"></script>
	</body>
</html>