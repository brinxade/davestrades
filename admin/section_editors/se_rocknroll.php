<?php
require_once '../appcore/_config.php';
require_once APP_USER_HANDLER;

$user=get_user_object();

if($user->is_admin==0)
	$user->direct_user("../index.php");

$resp="";
if(isset($_GET['response']))
{
	$resp_code=$_GET['response'];
	if($resp_code=="1")
	{
		$resp='
		<div class="modal modal-success">
			<span class="close">Dismiss</span>
			<p class="data">File Uploaded Successfully</p>
		</div>';
	}
	else
	{
		$resp='
		<div class="modal modal-fail">
			<span class="close">Dismiss</span>
			<p class="data">File Upload Failed: '.$_GET['error'].'</p>
		</div>';
	}
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Dave's Trades CMS - RockNRoll</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		
		<link rel="stylesheet" type="text/css" href="../css/admin-panel.css"/>
		<link rel="stylesheet" type="text/css" href="../css/rex-set-1.css"/>
	</head>
	<body class="bg-section-editor">
		<header id="header" class="nm-bottom">
			<div class="container-2" align="center">
				<div>
					<h1 class="nm-bottom">Section Editor</h1>
					<span class="subtitle-light">ROCKNROLL</span>
					<a href="../cms.php"><button class="btn-style-1">CMS Home</button></a>
				</div>
			</div>
		</header>
		<?php echo $resp; ?>
		<section id="cms-section-editor" class="se-container container-1-tb">
			<form id="cms-sd-rocknroll" class="se-form" method="POST" enctype="multipart/form-data" action="s_rocknroll.php">
				<table class="cms-de-table1">
					<tr>
						<td><span>Song File <b style="color:red;">*</b></span></td>
						<td><input type="file" class="input-file-style-1 nm-bottom" name="s_file" accept=".mp3,audio/*"/><p>Only mp3 and wav files allowed</p></td>
					</tr>
					<tr>
						<td><span>Song Name <b style="color:red;">*</b></span></td>
						<td><input class="input-style-2" type="text" name="s_name"/></td>
						<td><span>Album Name</span></td>
						<td><input class="input-style-2" type="text" name="s_album"/></td>
					</tr>
					<tr>
						<td><span>Artist Name</span></td>
						<td><input class="input-style-2" type="text" name="s_artist"/></td>
						<td><span>Search Tags</span></td>
						<td><input class="input-style-2" type="text" name="s_tags"/></td>
					</tr>
					<tr>
						<td><button style="position:relative;top:15px;" class="btn-style-1 nm-left" form="cms-sd-rocknroll" type="submit">Upload</button></td>
					</tr>
				</table>
			</form>
		</section>
		<footer id="footer">
			<div class="inner container-2">
				<p align="center" class="copyright">
					Designed by Brinxade &copy; 2020
				</p>
			</div>
		</footer>
		<script src="../js/rex-cms-interface.js"></script>
	</body>
</html>