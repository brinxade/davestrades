<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
		
		<link rel="icon" type="image/png" href="favicon.png">
		<title>Dave&apos;s Trades - Find Contractors</title>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>
		<script src="https://unpkg.com/react@16/umd/react.development.js" crossorigin></script>
		<script src="https://unpkg.com/react-dom@16/umd/react-dom.development.js" crossorigin></script>
		<script src="js/react-components/GlobalFooter.js" type="text/babel"></script>
		<script src="js/react-components/GlobalHeader.js" type="text/babel"></script>
		<script src="js/react-controller/base-controller.js" type="text/babel"></script>
		<script src="js/common.js"></script>
		<script src="js/api_handles/find-contractors.js"></script>
		
		<link rel="stylesheet" type="text/css" href="css/core.css"/>
		<link rel="stylesheet" type="text/css" href="css/common.css"/>
		
		<script src="https://kit.fontawesome.com/6f67bd47b3.js" crossorigin="anonymous"></script>
	</head>
	<body>
		<header id="header"></header>
		<section id="contractors">
			<div class="inner">
				<p class="intro-text nm-bottom">Looking to get some job done?</p>
				<h1 class="title">Find Contractors</h1>
				<div class="search">
					<input id="contractors-search" type="text" placeholder="Search Contractors by Name, Location or Trade"/>
					<button class="search-button">Search</button>
					<div class="loader loader-medium loader-round-green m-center loader-hidden" style="margin:50px auto 0 auto;"></div>
				</div>
				<div id="contractors-search-result"></div>
			</div>
		</section>
		<footer id="footer"></footer>
	</body>
</html>