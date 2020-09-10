<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
		
		<title>Dave&apos;s Trades Blog</title>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>
		<script src="https://unpkg.com/react@16/umd/react.development.js" crossorigin></script>
		<script src="https://unpkg.com/react-dom@16/umd/react-dom.development.js" crossorigin></script>
		<script src="../js/react-components/GlobalFooter.js" type="text/babel"></script>
		<script src="../js/react-components/GlobalHeader.js" type="text/babel"></script>
		<script src="../js/react-controller/base-controller-alt.js" type="text/babel"></script>
		<script src="../js/common.js"></script>
		
		<link rel="stylesheet" type="text/css" href="../css/common.css"/>
		<link rel="stylesheet" type="text/css" href="../css/core.css"/>
		<link rel="stylesheet" type="text/css" href="../css/blog.css"/>
		
		<script src="https://kit.fontawesome.com/6f67bd47b3.js" crossorigin="anonymous"></script>
	</head>
	<body>
		<header id="header"></header>
		<section id="blog-container" align="center">
			<div class="main">
				<h1 class="jumbo-caption-large">Dave&apos;s Blog</h1>
				<div class="inner col" align="center">
					<div id="sidepanel" class="col-13 _left">
						<div class="content shadow-soft-1">
							<div id="blog-title-image"><img src="../css/images/sample-square.png"/></div>
							<div id="blog-info-header">
								<p><strong>Author: </strong>Dave</p>
								<p><strong>Published: </strong>01-05-2020</p>
							</div>
						</div>
					</div>
					<div id="blog-data" class="col-23 _right">
						<div class="content shadow-soft-1"><h1 class="jumbo-caption-small">The blog content goes here</h1></div>
					</div>
					<div id="blog-featured-images" class="_left" align="center">
						<div class="content" align="center">
							<div class="data-item"><img src="../css/images/sample-rectangle.png"/></div>
							<div class="data-item"><img src="../css/images/sample-rectangle.png"/></div>
							<div class="data-item"><img src="../css/images/sample-rectangle.png"/></div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<footer id="footer"></footer>
	</body>
</html>