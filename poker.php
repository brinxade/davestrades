<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/appcore/CONFIG.php';
require_once APP_CLIENT_HANDLER;

$user=new User();
if($user->is_logged_in!=1)
{
	$user->direct_user('/account.php?login&past=/poker.php');
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
		
		<link rel="icon" type="image/png" href="favicon.png">
		<title>Poker at Dave&apos;s</title>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>
		<script src="https://unpkg.com/react@16/umd/react.development.js" crossorigin></script>
		<script src="https://unpkg.com/react-dom@16/umd/react-dom.development.js" crossorigin></script>
		
		<script src="js/react-components/GlobalFooter.js" type="text/babel"></script>
		<script src="js/react-components/GlobalHeader.js" type="text/babel"></script>
		<script src="js/react-controller/base-controller.js" type="text/babel"></script>
		<script src="js/common.js"></script>
		
		<link rel="stylesheet" type="text/css" href="css/core.css"/>
		<link rel="stylesheet" type="text/css" href="css/common.css"/>
		<link rel="stylesheet" type="text/css" href="css/global-styles.css"/>
	</head>
	<body class="body-poker">
		<header id="header"></header>
		<section id="poker-con">
			<div class="page-margin-2">
				<div class="poker-con-inner column col">
					<div id="prize-board-con" class="column-left col-23 _left base-padding">
						<div id="prize-board" class="ui-2col-set-b">
							<h1 class="title">Poker Prize Board</h1>
							<div class="content" align="center">
								<!--<div class="data-item"><div class="inner"><img class="featured-image" src="css/images/sample-rectangle.png"/>
									<div class="data-info"><span class="data-name">Prize Name</span><p class="data-description">Description goes here.</p></div>
								</div></div>-->
								<h5 style="font-weight:normal;font-size:18px;" align="center">No prizes available currently</h5>
							</div>
						</div>
					</div>
					<div  id="player-list" class="column-right col-13 _right base-padding">
						<div class="inner">
							<div class="ui-1col-set-a">
								<h1 class="title">Players</h1>
								<div class="content" id="player-list">
									<!--<div class="data-item"><span class="poker-winner-name">Bob</span></div>-->
									<h5 style="font-weight:normal;font-size:18px;" align="center">No Registered Players Yet</h5>
								</div>
							</div>
							<div class="col-pallette-a">
								<div class="inner">
									<h5 style="font-weight:normal;font-size:18px;" align="center">Register here for our monthly poker tournament</h5>
									<div align="center">
										<button class="btn-style-2 nm-top">Register</button>
									</div><br/>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="poker-entry-tutorial">
					<div class="content page-margin-1 base-padding">
						<!--<h1 align="center">How to enter the Poker Tournament?</h1>-->
					</div>
				</div>
			</div>
		</section>
		<footer id="footer"></footer>
		<script src="https://kit.fontawesome.com/6f67bd47b3.js" crossorigin="anonymous"></script>
	</body>
</html>