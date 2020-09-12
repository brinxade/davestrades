<?php 
require_once '_config.php';

session_start();
if(session_id()!='')
	session_destroy();

echo json_encode(CMS_LOGIN_PAGE);
?>