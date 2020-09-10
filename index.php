<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
		
		<title>Dave's Trades</title>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>
		<script src="https://unpkg.com/react@16/umd/react.development.js" crossorigin></script>
		<script src="https://unpkg.com/react-dom@16/umd/react-dom.development.js" crossorigin></script>
		<script src="js/react-components/GlobalHeader.js" type="text/babel"></script>
		<script src="js/react-components/GlobalFooter.js" type="text/babel"></script>
		<script src="js/react-controller/base-controller.js" type="text/babel"></script>
		<script src="js/common.js"></script>
		
		<link rel="stylesheet" type="text/css" href="css/core.css"/>
		<link rel="stylesheet" type="text/css" href="css/poker-app.css"/>
		<link rel="stylesheet" type="text/css" href="css/common.css"/>

	</head>
	<body>
		<header id="header"></header>
		<section id="home-main">
			<div class="inner">
				<div id="member-greeting" class="page-margin-1">
					<div>
						<h3 class="subtitle-small">Well, look look who's here.</h3>
						<h1 class="jumbo-caption-large nm-bottom nm-top caption">Welcome Jimmy, you pervert!</h1>
						<p style="margin-top:10px;">While you were away, we gathered a couple of things for you.</p>
					</div>
					<div id="member-assorted" align="center">
						<div class="item shadow-soft-1">
							<h3 class="title">Music</h3>
							<h4 class="sub-title">Randomly picked beats for you</h4>
							<div class="content">
								<a href="#">Song 1</a>
								<a href="#">Song 2</a>
								<a href="#">Song 3</a>
								<a href="#">Song 4</a>
								<a href="#">Song 5</a>
							</div>
						</div>
						<div class="item shadow-soft-1">
							<h3 class="title">Trade Stats</h3>
							<h4 class="sub-title">Number of views on your trade</h4>
							<div class="content">
								<div id="trade-views">
									<h3 class="view-count nm-bottom" align="center">0</h3>
									<p class="jumbo-caption-small" align="center">Trade Views</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section id="app">
			<div class="poker-inner-wrapper col">
				<div id="poker-app-intro">
					<h1 class="nm-top">Play Poker</h1>
					<div class="platform-specific-msg" align="center"><p>Oops, the poker app is currently not avaliable for mobile devices.</p></div>
				</div>
				<div class="content">
					<div class="_right main" align="center">
						<div id="poker-table">
							<div class="wrapper">
								<div id="poker-chair-1" class="poker-chair"><div class="poker-chair-inner"><div class="poker-chair-label">Pitiful Painter</div></div></div>
								<div id="poker-chair-2" class="poker-chair"><div class="poker-chair-inner"><div class="poker-chair-label">Lousy Laborer</div></div></div>
								<div id="poker-chair-3" class="poker-chair"><div class="poker-chair-inner"><div class="poker-chair-label">Sparky</div></div></div>
								<div id="poker-chair-4" class="poker-chair"><div class="poker-chair-inner"><div class="poker-chair-label">Crappy Carpenter</div></div></div>
								<div id="poker-chair-5" class="poker-chair"><div class="poker-chair-inner"><div class="poker-chair-label">Drunken Drywaller</div></div></div>
								<div id="poker-chair-6" class="poker-chair"><div class="poker-chair-inner"><div class="poker-chair-label">Anonymous</div></div></div>
								<div id="poker-chair-7" class="poker-chair"><div class="poker-chair-inner"><div class="poker-chair-label">Anonymous</div></div></div>
								<div id="poker-chair-8" class="poker-chair"><div class="poker-chair-inner"><div class="poker-chair-label">Anonymous</div></div></div>
								<div class="inner">
									<div class="inner-content">
										<h2 class="table-text">Dave's Trades</h2>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="_left sidepanel" align="center">
						<div class="inner control-panel">
							<div class="nav" align="center">
								<button class="btn-style-1">Cashier</button>
								<button class="btn-style-1">Legal Eagles</button>
								<select id="poker-location">
									<option>City or Country</option>
									<option>Brampton</option>
									<option>Mississauga</option>
									<option>Toronto</option>
								</select>
							</div>
						</div>
						<div class="inner chat">
							<div id="chat-wrapper">
								<div class="chat-container">
									<div class="chat-item"><span class="chat-name">Dave</span><span class="chat-msg-time">20:52</span>
										<p class="chat-msg">Hey hows it going? Im not sure how to play, can someone help me learn this? Looks like people are making lots of money here. Seems legit as well.</p>
									</div>
									<div class="chat-item"><span class="chat-name">Gurparsad</span><span class="chat-msg-time">20:54</span>
										<p class="chat-msg">The game is fun</p>
									</div>
									<div class="chat-item"><span class="chat-name">Dave</span><span class="chat-msg-time">20:55</span>
										<p class="chat-msg">Yes, this is very interesting!</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<footer id="footer"></footer>
		<script src="js/authui.js"></script>
		<script src="https://kit.fontawesome.com/6f67bd47b3.js" crossorigin="anonymous"></script>
	</body>
</html>