<?php require_once './_common.php';require(INC_PICTURES); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo $banner_h1; ?></title>
		<?php echo $_common["head"]; ?>
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

		<?php echo $_common["foot"]; ?>
	</body>
</html>