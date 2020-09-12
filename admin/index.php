<?php
require_once 'appcore/user.php';
$user=get_user_object();

if($user->is_admin==1)
	$user->direct_user("cms.php");

if(isset($_POST['admin-username']) && isset($_POST['admin-password']))
	$user_auth_status=$user->admin_login($_POST['admin-username'],$_POST['admin-password']);
else
	$user_auth_status="<br/>";

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Dave's Trades Admin Login</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>		
		
		<link rel="stylesheet" type="text/css" href="css/admin-panel.css"/>
		<link rel="stylesheet" type="text/css" href="css/rex-set-1.css"/>
	</head>
	<body>
		<header id="header">
			<div class="container-2" align="center">
				<div>
					<h1 class="nm-bottom nm-top">Admin Panel</h1>
					<span class="subtitle-light">Dave's Trades</span>
				</div>
			</div>
		</header>
		<section id="admin-login-con">
			<form id="admin-login" class="container-2 shadow-smooth-1" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
				<h2 class="title" align="center">Login</h2><br/>
				<input id="admin-username" name="admin-username" class="input-style-1 col-11" type="text" autocomplete="off" spellcheck="off" placeholder="username"/>
				<input id="admin-password" name="admin-password" class="input-style-1 col-11" type="password" placeholder="password"/>
				<?php echo $user_auth_status; ?>
				<button class="btn-style-1 margin-center" type="submit" form="admin-login">Login</button>
			</form>
		</section>
		<footer id="footer">
			<div class="inner container-2">
				<p align="center" class="copyright">
					Designed by Brinxade &copy; 2020
				</p>
			</div>
		</footer>
	</body>
</html>