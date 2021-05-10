<?php require_once './_common.php';require(INC_ROCKNROLL); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Rock N&apos; Roll</title>
		<?php echo $_common["head"]; ?>
		<script src="js/plugins/clean-audio-player/js/audioplayer.js"></script>
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
				<div id="song-list-con">
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

		<?php echo $_common["foot"]; ?>
		<script src="js/webpage-rocknroll.js"></script>
	</body>
</html>