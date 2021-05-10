<?php require_once '_common.php'; _auth_required("poker.php"); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Poker at Dave&apos;s</title>
		
		<?php echo $_common['head']; ?>
		<link rel="stylesheet" type="text/css" href="css/global-styles.css"/>
	</head>
	<body>

		<header id="header"></header>

		<section id="section-poker-tournament">
			<div class="section-inner col">
				<main class="col-23 _left">
					<h2 class="title">Prize Board</h2>
					<div class="inner">
						<p class="nm-top">No prizes for now</p>
					</div>
				</main>
				<aside class="col-13 _right">
					<div class="side-palette">
						<h3 class="title">Players</h3>
						<div class="inner data-container">
							<p class="nm-all">No players have registered yet</p>
						</div>
					</div>	
					<div class="side-palette">
						<h3 class="title">Register</h3>
						<div class="inner">
							<p class="nm-top">Register here for the monthly Poker tournament to win the exciting prizes from the prize board (or lose all your money in trying to win)</p>
							<a href="#" class="btn-style-1 btn full">Register</a>
						</div>
					</div>			
				</aside>
			</div>
		</section>

		<footer id="footer"></footer>
		
		<?php echo $_common["foot"]; ?>
	</body>
</html>