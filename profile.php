<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/appcore/CONFIG.php';
require_once APP_CLIENT_HANDLER;

$user=new User();
if($user->is_logged_in!=1)
{
	$user->direct_user('/account.php?login&past='.$_SERVER['PHP_SELF']);
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
		
		<link rel="icon" type="image/png" href="favicon.png">
		<title>Dave's Trades - Manage Profile</title>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>
		<script src="https://unpkg.com/react@16/umd/react.production.min.js" crossorigin></script>
		<script src="https://unpkg.com/react-dom@16/umd/react-dom.production.min.js" crossorigin></script>
		<script src="js/react-components/GlobalHeader.js" type="text/babel"></script>
		<script src="js/react-components/GlobalFooter.js" type="text/babel"></script>
		<script src="js/react-controller/base-controller.js" type="text/babel"></script>
		<script src="js/common.js"></script>
		
		<link rel="stylesheet" type="text/css" href="css/core.css"/>
		<link rel="stylesheet" type="text/css" href="css/poker-app.css"/>
		<link rel="stylesheet" type="text/css" href="css/common.css"/>
		<link rel="stylesheet" type="text/css" href="css/accounts.css"/>
		
		<script src="https://kit.fontawesome.com/6f67bd47b3.js" crossorigin="anonymous"></script>
	</head>
	<body>
		<header id="header"></header>
		<section id="profile-management">
			<div class="inner">
				<h1 class="title jumbo-caption-large">Profile</h1>
				<div class="content">
					<div class="section">
						<div id="profile-picture" class="inline-block v-align-top">
							<div class="loader-container"><div class="loader-wrapper"><img class="loader" src="/css/images/loaders/loader-round.gif"/></div></div>
							<div id="user-pp"><img src="css/images/default-pp.png"/></div>
							<div class="user-pp-edit">
								<input type="file" id="user-new-pp-i"/>
								<button id="user-new-pp" class="edit"><i class="fas fa-pen"></i></button>
								<button class="edit"><i class="fas fa-trash"></i></button>
							</div>
						</div>
						<div class="stat-group">
							<div class="if-editable">
								<strong class="stat-name">Name <span class="sep">|</span></strong/><input class="if-edit-s1" id="user-name" type="text" value="" disabled/>
								<span class="span-edit" data-target="user-name"><i class="fas fa-pen"></i></span>
							</div>
							<div class="if-editable">
								<strong class="stat-name">Trade <span class="sep">|</span></strong/><input class="if-edit-s1" id="user-trade" type="text" value="" disabled/>
								<span class="span-edit" data-target="user-trade"><i class="fas fa-pen"></i></span>
							</div>
						</div>
					</div>
					<div id="profile-description" class="section">
						<textarea id="user-desc" style="resize:none;" placeholder="A description of your profile" disabled></textarea>
						<div class="if-editable" style="left:12px;">
							<span class="span-edit" data-target="user-desc"><i class="fas fa-pen"></i></span>
						</div>
					</div>
					<div id="profile-data" class="section">
						<span class="info-span-a"><i class="fas fa-phone"></i>&nbsp;&nbsp;<span id="user-phone">Not Set</span></span>
						<span class="info-span-a"><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;<span id="user-addr">Not Set</span></span>
					</div>
					<div>
						<p class="label">Expose profile as a trade</p>
						<label class="toggle-switch">
							<input id="user-trademode" type="checkbox">
							<span class="slider round"></span>
						</label>
					</div>
				</div>
			</div>
		</section>
		<footer id="footer"></footer>
		<script src="js/profile-edit.js"></script>
	</body>
</html>