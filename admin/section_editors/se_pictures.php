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
		<title>Dave's Trades CMS - Pictures</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		
		<link rel="stylesheet" type="text/css" href="../css/admin-panel.css"/>
		<link rel="stylesheet" type="text/css" href="../css/rex-set-1.css"/>
	</head>
	<body>
		<header id="header">
			<div class="container-2" align="center">
				<div>
					<h1>Section Editor</h1>
					<span class="subtitle-light">PICTURES</span>
					<a href="../cms.php"><button class="btn-style-1">CMS Home</button></a>
				</div>
			</div>
		</header>
		<?php echo $resp; ?>
		<section id="cms-section-editor">
			<form id="cms-sd-pictures" method="POST" enctype="multipart/form-data" action="s_pictures.php">
				<table class="cms-de-table1">
					<tr>
						<td><span>Image <b style="color:red;">*</b></span></td>
						<td><input type="file" class="input-file-style-1" name="s_file" accept=".jpg, .png"/><br/><span>Only jpg and png allowed</span></td>
					</tr>
					<tr>
						<td><span>Image Title <b style="color:red;">*</b></span></td>
						<td><input class="input-style-2" type="text" name="s_title"/></td>
					</tr>
					<tr>
						<td><span>Image Description</span></td>
						<td><textarea class="input-textarea-1" name="s_desc"></textarea></td>
					</tr>
					<tr>
						<td><span>Section Availability <b style="color:red;">*</b></span></td>
						<td>
							<label>Dave's </label><input class="input-style-2" type="radio" name="s_sect" value="0"/>&nbsp;&nbsp;&nbsp;&nbsp;
							<label>Member's </label><input class="input-style-2" type="radio" name="s_sect" value="1"/><br/>
						</td>
					</tr>
					<tr>
						<td><button style="position:relative;top:15px;" class="btn-style-1" form="cms-sd-pictures" type="submit">Upload</button></td>
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