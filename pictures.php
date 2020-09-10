<?php require('appcore/CONFIG.php');require(INC_PICTURES); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
		
		<title><?php echo $banner_h1; ?></title>

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
	</head>
	<body>
		<header id="header"></header>
		<section id="main">
			<div class="inner">
				<div id="sect-pictures">
					<div class="banner col">
						<h1><?php echo  $banner_h1;?></h1>
					</div>
					<div id="photo-grid" align="center">
						<div class="photo-grid-inner">
						<?php
							if(!is_array($data_photos) || count($data_photos)<=0)
							{
								echo '<h1 align="center" class="clr-white" style="margin:80px 0;font-weight:normal;font-size:24px;">No Images in this section</h1>';
							}
							else
							{
								foreach ($data_photos as $items)
									echo $items;
							}
						?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<footer id="footer"></footer>
		<script src="https://kit.fontawesome.com/6f67bd47b3.js" crossorigin="anonymous"></script>
	</body>
</html>