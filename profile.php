<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/appcore/CONFIG.php';
require_once APP_CLIENT_HANDLER;

$user=new User();
if($user->is_logged_in!=1)
{
	$user->direct_user('/account.php?login&past='.$_SERVER['PHP_SELF']."?".$_SERVER["QUERY_STRING"]);
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
		<script src="js/api_handles/profile-edit.js"></script>
		
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
							<div id="user-pp"><img src="css/images/default-pp.png"/></div>
							<div class="user-pp-edit">
								<input type="file" id="user-new-pp-i"/>
								<button id="user-new-pp" class="edit"><i class="fas fa-pen"></i></button>
								<button class="edit"><i class="fas fa-trash"></i></button>
							</div>
						</div>
						<div class="stat-group">
							<div class="if-editable">
								<span class="stat-name fixed-width">Name</span></span><input data-rd-target="0" class="data-rd if-edit-s1" id="user-name" type="text" value="" disabled/>
								<span class="span-edit" data-target="user-name"><i class="fas fa-pen"></i></span>
							</div>
							<div class="if-editable">
								<span class="stat-name fixed-width">Trade</span></span><input data-rd-target="1" class="data-rd if-edit-s1" id="user-trade" type="text" value="" disabled/>
								<span class="span-edit" data-target="user-trade"><i class="fas fa-pen"></i></span>
							</div>
							<div class="if-editable">
								<span class="stat-name"><i class="icon fas fa-phone"></i></span><input data-rd-target="3" class="data-rd if-edit-s1" id="user-phone" type="text" value="" disabled/>
								<span class="span-edit" data-target="user-phone"><i class="fas fa-pen"></i></span>
							</div>
							<div class="if-editable">
								<span class="stat-name"><i class="icon fas fa-map-marker-alt"></i></span><input data-rd-target="4" class="data-rd if-edit-s1" id="user-addr" type="text" value="" disabled/>
								<span class="span-edit" data-target="user-addr"><i class="fas fa-pen"></i></span>
							</div>
						</div>
					</div>
					<div id="profile-description" class="section">
						<div class="if-editable if-editable-textarea">
							<textarea class="data-rd" data-rd-target="2" id="user-desc" style="resize:none;" placeholder="A description of your profile" disabled></textarea>
							<span class="span-edit" data-target="user-desc"><i class="fas fa-pen"></i></span>
						</div>
					</div>
					<div>
						<p class="label">Expose profile as a trade</p>
						<label class="toggle-switch">
							<input class="data-rd-clk" data-rd-target="5" id="user-trademode" type="checkbox" value="1">
							<span class="slider round"></span>
						</label>
						<p class="label">Expose profile as a contractor</p>
						<label class="toggle-switch">
							<input class="data-rd-clk" data-rd-target="6" id="user-contractormode" type="checkbox" value="1">
							<span class="slider round"></span>
						</label>
					</div>
				</div>
			</div>
		</section>
		<footer id="footer"></footer>
	</body>
</html>