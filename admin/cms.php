<?php 
require_once 'appcore/user.php';
require_once 'appcore/_config.php';

$user=get_user_object();

if($user->is_admin!=1)
	$user->direct_user("index.php");

$cms_sections='';

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Dave's Trades CMS</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="js/rex-cms-core.js"></script>
		<script src="js/rex-cms-interface.js"></script>
		<script src="js/rex-cms-user.js"></script>
		
		<script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
		<link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
		<link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">
		
		<script src="https://kit.fontawesome.com/6f67bd47b3.js" crossorigin="anonymous"></script>
		
		<link rel="stylesheet" type="text/css" href="css/quill-theme.css"/>
		<link rel="stylesheet" type="text/css" href="css/admin-panel.css"/>
		<link rel="stylesheet" type="text/css" href="css/rex-set-1.css"/>
	</head>
	<body>
		<header id="header">
			<div class="container-2" align="center">
				<div>
					<h2>Content Management System</h2>
					<span class="subtitle-light"><a href="../">Dave's Trades</a></span>
				</div>
			</div>
			<div class="header-utility">
				<div class="base-padding" align="center">
					<button id="rex-cms-blog-mgmt" class="btn-style-1 nm-top nm-bottom inline cms-nav-btn" data-target="cms-blog-mgmt" data-target-active="0"><i class="fas fa-edit"></i> Blog Management</button>
					<button id="rex-cms-editor" class="btn-style-1 active nm-top nm-bottom inline cms-nav-btn" data-target="cms-sections" data-target-active="1"><i class="fas fa-edit"></i> Sections Editor</button>
					<button id="rex-cms-tutorial" class="btn-style-1 nm-top nm-bottom inline cms-nav-btn" data-target="cms-tutorial" data-target-active="0"><i class="fas fa-user-graduate"></i> Tutorial</button>
					<button id="rex-cms-changepass" class="btn-style-1 nm-top nm-bottom inline cms-nav-btn" data-target="cms-change-password" data-target-active="0"><i class="fas fa-key"></i> Change Password</button>
					<button id="rex-cms-logout" class="btn-style-1 nm-top nm-bottom inline cms-nav-btn" data-target="cms-logout" data-target-active="0"><i class="fas fa-sign-out-alt"></i> Logout</button>
				</div>
			</div>
		</header>
		<section id="cms-change-password" class="sect-layout-1 cms-section">
			<div class="content">
				<span class="close-a cms-section-close" data-target="cms-change-password"><i class="fas fa-times"></i></span>
				<h3>Change Password</h3>
				<br/>
				<div style="margin-left:10px;">
					<label style="min-width:200px;display:inline-block;">Current Password</label>
					<input type="password" id="current-password" class="input-style-1" placeholder="Current Password"/><br/>
					<label style="min-width:200px;display:inline-block;">New Password</label>
					<input type="password"  id="new-password" class="input-style-1" placeholder="New Password"/><br/>
					<label style="min-width:200px;display:inline-block;">Confirm New Password</label>
					<input type="password"  id="new-cpassword" class="input-style-1" placeholder="Type New Password again"/><br/><br/>
				</div>
				<p id="change-pass-status" style="margin-left:10px;display:none;"><br/></p>
				<button id="btn-change-pass" class="btn-style-1 nm-all" style="position:relative;left:10px;">Confirm</button><br/>
			</div>
		</section>
		<section id="cms-tutorial" class="sect-layout-1 cms-section">
			<div class="content"></div>
		</section>
		<section id="cms-sections" class="container-3 cms-section">
			<div class="content shadow-smooth-1 container-3">
				<h3 align="center" style="color:white;">Sections</h3>
				<ul class="list-vertical-a" align="center">
					<a href="section_editors/se_rocknroll.php"><li class="round-list-item round-list-item-inline">RockNRoll</li></a>
					<a href="section_editors/se_pictures.php"><li class="round-list-item round-list-item-inline">Pictures</li></a>
				</ul>
			</div>
		</section>
		<section id="cms-blog-mgmt" class="sect-layout-1 cms-section">
			<div class="content">
					<div class="main-screen">
					<span class="close-a cms-section-close" data-target="cms-blog-mgmt"><i class="fas fa-times"></i></span>
					<h1>Blog Management</h1>
					<span class="spacer-large"></span>
					<div class="utilities col">
						<input type="text" id="blog-search" class="input-style-1 _left" placeholder="Search Blogs"/>
						<button class="btn-style-1 _right">
							<i class="fas fa-plus-square"></i>&nbsp; Create
						</button>
					</div>
					<div class="table-wrap">
						<table id="blog-list" class="table-style-1">
							<tr>
								<th>Blog ID</th>
								<th>Blog Title</th>
								<th>Last Updated</th>
								<th>Edit</th>
								<th>Delete</th>
								<th>Published</th>
							</tr>
							<tr>
								<td>1</td>
								<td>Blog intro</td>
								<td>03-05-2020</td>
								<td class="icon-data" title="Edit the blog"><i class="fas fa-edit"></i></td>
								<td class="icon-data" title="Delete the blog"><i class="fas fa-trash-alt"></i></td>
								<td class="icon-data" title="Unpublish the blog"><i class="fas fa-check-circle"></i></td>
							</tr>
						</table>
					</div>
				</div>
				<div class="edit-screen">
					<span class="spacer-large"></span>
					<h2 class="mgmt-mode">Edit</h2>
					<div class="save-discard">
						<button id="blog-edit-cancel" class="btn-style-1 _left"><i class="fas fa-ban"></i> Cancel</button>
						<button id="blog-edit-save" class="btn-style-1 _left"><i class="fas fa-check"></i> Save</button>
					</div>
					<div id="blog-toolbar"></div>
					<div id="blog-write-area"></div>
				</div>
			</div>
		</section>
		<footer id="footer">
			<div class="inner container-2">
				<p align="center" class="copyright">
					Designed by Brinxade &copy; 2020
				</p>
			</div>
		</footer>
		<script src="js/rex-quill.js"></script>
	</body>
</html>