<?php require('appcore/CONFIG.php');require(INC_ROCKNROLL); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
		<title>Rock N&apos; Roll</title>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>
		<script src="https://unpkg.com/react@16/umd/react.development.js" crossorigin></script>
		<script src="https://unpkg.com/react-dom@16/umd/react-dom.development.js" crossorigin></script>
		<script src="js/react-components/GlobalFooter.js" type="text/babel"></script>
		<script src="js/react-components/GlobalHeader.js" type="text/babel"></script>
		<script src="js/react-controller/base-controller.js" type="text/babel"></script>
		<script src="js/common.js"></script>
		<script src="js/plugins/clean-audio-player/js/audioplayer.js"></script>
		
		<link rel="stylesheet" type="text/css" href="css/core.css"/>
		<link rel="stylesheet" type="text/css" href="css/common.css"/>
		<link rel="stylesheet" href="js/plugins/clean-audio-player/css/audioplayer.css" />
	</head>
	<body>
		<header id="header"></header>
		<section id="rocknroll-main">
			<div id="sect-rocknroll">
				<div class="banner col">
					<div class="content">
						<h1>Rock N' Roll</h1>
						<h2>Reward your ears with the good ol' 90s beats</h2>
					</div>
				</div>
				<div id="song-list-con" align="center">
					<div class="inner">
						<div id="song-search-request">
							<div class="song-search"><input id="i-song-search" type="text" placeholder="Search song, artist, album"/><button id="btn-song-search">Search</button></div>
							<div class="song-request"><input id="i-song-request" type="text" placeholder="Request a Song"/><button id="btn-song-request">Request a Song</button></div>
						</div>
					<?php echo $data_formatted; ?>
					</div>
				</div>
			</div>
		</section>
		<div class="modal modal-center modal-1"></div>
		<footer id="footer"></footer>
		<script src="js/webpage-rocknroll.js"></script>
		<script src="https://kit.fontawesome.com/6f67bd47b3.js" crossorigin="anonymous"></script>
	</body>
</html>