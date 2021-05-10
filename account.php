<?php
	require_once './_common.php';
	require_once 'appcore/account_management/user.php';
	if(session_id()=='')
		session_start();

	$self_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$user=new User();

	$user_status="<p class='response-text'></p>";
	if(isset($_POST['login-email']) && isset($_POST['login-password']))
		$user_status=$user->login($_POST['login-email'],$_POST['login-password']);
	else if(isset($_POST['reg-email']))
		$user_status=$user->register($_POST);
	if($user->is_logged_in)
		$user->direct_user();

	//REFERRAL MESSAGE
	$ref_message="";
	if(isset($_GET['ref-msg']))
		$ref_message='<div class="accounts-modal-1"><p>'.$_GET['ref-msg'].'</p></div>';
?>
<!doctype html>
<html lang="en">
	<head>
		<title>Dave's Trades Account</title>
		<?php echo $_common["head"]; ?>
	</head>
	<body class="accounts-body">

		<section class="accounts-hero">
			<div class="content vh-center">
				<a href="/"><img class="logo-text large" src="css/images/logo-text.png"/></a>
				<h4 class="nm-top font-wt-normal font-spartan font-lh-normal">Where The Trades Play Poker...Only in Ontario</h4>
			</div>
		</section>

		<section id="accounts-section">
			<div class="close-button"><a href="/"><i class="fas fa-times"></i></a></div>
			<?php 
			if(isset($_GET['login']))
			echo '
			<div class="inner">
				'.$ref_message.'
				<form class="form-style-1" id="login-form" method="POST" action="'.$self_link.'">
					<h3 align="center" class="jumbo-caption-medium nm-top">Log In</h3>
					<div class="input-field">
						<label>Email or Username</label>
						<input id="login-email" name="login-email" type="text" placeholder="Type your email" autocomplete="off"/>
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
				<div class="inner">
					'.$ref_message.'
					<form class="form-style-1" method="POST" action="'.$self_link.'">
						<h3 align="center" class="jumbo-caption-medium nm-top">Sign Up</h3>
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
							<div style="margin:5px 0;"><input type="checkbox" id="reg-isAgree" name="reg-isAgree" value="1"/><label for="reg-isAgree" class="inline">I Agree to Terms of Services</label></div>
							<div><input type="checkbox" id="reg-newsSub" name="reg-newsSub" value="1"/><label for="reg-newsSub" class="inline">Subscribe to weekly newsletter</label></div>
						</div>
						'.$user_status.'
						<button class="form-btn" type="submit">Sign Up</button>
						<p align="center"><strong><a href="account.php?login">Already have an account? Sign in.</a></strong></p>
					</form>
				</div>';
				else if(isset($_GET['activation']) && isset($_GET['status']))
				{
					$html='
					<div class="account-activation align="center">
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

		<?php echo $_common["foot"]; ?>
	</body>
</html>