<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/appcore/CONFIG.php';
require_once APP_CLIENT_HANDLER;

$user=new User();
if($user->is_logged_in!=1)
{
	$user->direct_user('/account.php?login&past=/post');
	echo "LOGGED IN";
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Post A Trade</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>
		<script src="https://unpkg.com/react@16/umd/react.development.js" crossorigin></script>
		<script src="https://unpkg.com/react-dom@16/umd/react-dom.development.js" crossorigin></script>
		<script src="../js/react-components/GlobalHeader.js" type="text/babel"></script>
		<script src="../js/react-components/GlobalFooter.js" type="text/babel"></script>
		<script src="../js/react-controller/base-controller-alt.js" type="text/babel"></script>
		<script src="../js/common.js"></script>
		
		<link rel="stylesheet" type="text/css" href="../css/core.css"/>
		<link rel="stylesheet" type="text/css" href="../css/poker-app.css"/>
		<link rel="stylesheet" type="text/css" href="../css/common.css"/>
	</head>
	<body>
		<header id="header"></header>
		<section id="post-a-trade" class="trade-contract-ui">
			<div class="main">
				<h1 class="jumbo-caption-large">Post A Trade</h1>
				<form id="trade-post-form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					<table class="form-table-s1">
						<tr><td class="label"><label>Trade Name</label></td><td><input type="text"/></td></tr>
						<tr><td class="label"><label>Trade Description</label></td><td><textarea></textarea></div></td></tr>
						<tr><td class="label"><label>Trade Location</label></td><td><input type="text"/></div></td></tr>
						<tr><td class="label"><label>Images</label></td><td><input type="file" multiple/></div></td></tr>
					</table>
					<button class="submit" type="submit">Post Trade</button>
				</form>
			</div>
		</section>
		<footer id="footer"></footer>
	</body>
</html>