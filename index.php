<?php require_once './_common.php'; ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Dave's Trades</title>
		
		<?php echo $_common['head']; ?>
		<link rel="stylesheet" type="text/css" href="css/poker-app.css"/>
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
					<div id="member-assorted">
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
									<h3 class="view-count nm-bottom">0</h3>
									<p class="jumbo-caption-small">Trade Views</p>
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
					<h1 class="title">Play Poker</h1>
					<div class="platform-specific-msg"><p>Oops, the poker app is currently not avaliable for mobile devices.</p></div>
				</div>
				<div class="content">
					<div class="_right main">
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
					<div class="_left sidepanel">
						<div class="inner control-panel">
							<div class="nav">
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
						<h2 class="title nm-top">Chat Room</h2>
							<div id="chat-wrapper">
								<div class="chat-container">
									<!--<div class="chat-item"><span class="chat-name">Dave</span><span class="chat-msg-time">20:52</span>
										<p class="chat-msg">Hey hows it going? Im not sure how to play, can someone help me learn this? Looks like people are making lots of money here. Seems legit as well.</p>
									</div>-->
									<div class="chat-item">
										<p class="chat-msg">No previous messages</p>
									</div>
								</div>
							</div>
							<div class="chat-input">
								<input id="chat-textbox" type="text" placeholder="Type here..."/>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<footer id="footer"></footer>
		
		<?php echo $_common['foot']; ?>

	</body>
</html>