<?php 

define('APP_FOLDER','admin/appcore/');
define('APP_UPLOAD_HANDLER',$_SERVER['DOCUMENT_ROOT'].'/'.APP_FOLDER.'file_uploader.php');

define('DB_HANDLER',$_SERVER['DOCUMENT_ROOT'].'/'.APP_FOLDER.'db_core.php');
define('APP_USER_HANDLER',$_SERVER['DOCUMENT_ROOT'].'/'.APP_FOLDER.'user.php');

DEFINE('DB_ADDR','localhost');
DEFINE('DB_USERNAME','u947445063_davestrades');
DEFINE('DB_PASSWORD','@Cyrus#123');
DEFINE('DB_NAME','u947445063_davestrades');

define('CMS_UTILS','/');
define('CMS_LOGIN_PAGE','index.php');
define('CMS_MAIN','cms.php');

define('SECTIONS',['section_rocknroll','section_pictures','section_davescoolstuff','section_classiccars','section_toolbox']);
?>