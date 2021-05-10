<?php require_once './_common.php'; _auth_required($_SERVER['PHP_SELF']."?".$_SERVER["QUERY_STRING"]);?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Dave's Trades - Manage Profile</title>
		<?php echo $_common["head"]; ?>
	</head>
	<body>

		<header id="header"></header>

		<section id="profile-management">
			<div class="inner">
				<h1 class="title jumbo-caption-large">Profile</h1>
				<div class="content">
					<div class="section">
						<div id="profile-picture" class="inline-block v-align-top">
							<div id="user-pp">
								<img src="css/images/default-pp.png"/>
								<div class="vh-center loader loader-round-green"></div>
							</div>
							<div class="user-pp-edit">
								<form id="user-pp-form" enctype="multipart/form-data">
									<input type="file" id="user-new-pp-i" name="user-pp"/>
								</form>
								<button id="user-new-pp" class="edit"><i class="fas fa-pen"></i></button>
								<button class="edit"><i class="fas fa-trash"></i></button>
							</div>
						</div>
						<div class="stat-group">
							<div class="if-editable">
								<span class="stat-name fixed-width">Name</span></span><input data-rd-target="0" class="data-rd if-edit-s1" id="user-name" type="text" value="" disabled/>
								<span class="span-edit" data-target="user-name"><i class="fas fa-pen"></i></span>
							</div>
							<div class="if-editable">
								<span class="stat-name fixed-width">Trade</span></span><input data-rd-target="1" class="data-rd if-edit-s1" id="user-trade" type="text" value="" disabled/>
								<span class="span-edit" data-target="user-trade"><i class="fas fa-pen"></i></span>
							</div>
							<div class="if-editable">
								<span class="stat-name"><i class="icon fas fa-phone"></i></span><input data-rd-target="3" class="data-rd if-edit-s1" id="user-phone" type="text" value="" disabled/>
								<span class="span-edit" data-target="user-phone"><i class="fas fa-pen"></i></span>
							</div>
							<div class="if-editable">
								<span class="stat-name"><i class="icon fas fa-map-marker-alt"></i></span><input data-rd-target="4" class="data-rd if-edit-s1" id="user-addr" type="text" value="" disabled/>
								<span class="span-edit" data-target="user-addr"><i class="fas fa-pen"></i></span>
							</div>
						</div>
					</div>
					<div id="profile-description" class="section">
						<div class="if-editable if-editable-textarea">
							<textarea class="data-rd" data-rd-target="2" id="user-desc" style="resize:none;" placeholder="A description of your profile" disabled></textarea>
							<span class="span-edit" data-target="user-desc"><i class="fas fa-pen"></i></span>
						</div>
					</div>
					<div>
						<p class="label">Expose profile as a trade</p>
						<label class="toggle-switch">
							<input class="data-rd-clk" data-rd-target="5" id="user-trademode" type="checkbox" value="1">
							<span class="slider round"></span>
						</label>
						<p class="label">Expose profile as a contractor</p>
						<label class="toggle-switch">
							<input class="data-rd-clk" data-rd-target="6" id="user-contractormode" type="checkbox" value="1">
							<span class="slider round"></span>
						</label>
					</div>
				</div>
			</div>
		</section>

		<footer id="footer"></footer>

		<?php echo $_common["foot"]; ?>
		<script src="./js/api_handles/profile-edit.js"></script>
	</body>
</html>