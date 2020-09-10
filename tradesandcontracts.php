<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
		
		<title>Dave&apos;s Trades - Trades and Contractors</title>
		
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
		
		<script src="https://kit.fontawesome.com/6f67bd47b3.js" crossorigin="anonymous"></script>
	</head>
	<body>
		<header id="header"></header>
		<section id="trades-and-contractors">
			<div class="inner" align="center">
				<div id="goto-post-trade" class="btn-big"><a href="post/"><span class="icon"><i class="fas fa-file-alt"></i></span><span class="data">Post A Trade</span></a></div>
				<div id="find-contractors" class="btn-big"><a href="#"><span class="icon"><i class="fas fa-search"></i></span><span class="data">Search Contractors</span></a></div>
			</div>
		</section>
		<footer id="footer"></footer>
	</body>
</html>