<?php

DEFINE('APP_ROOT','appcore');

DEFINE('DB_HANDLER',$_SERVER['DOCUMENT_ROOT'].'/'.APP_ROOT.'/database_core/DB_MAIN.php');
DEFINE('DB_ADDR','localhost');
DEFINE('DB_USERNAME','u947445063_davestrades');
DEFINE('DB_PASSWORD','@Cyrus#123');
DEFINE('DB_NAME','u947445063_davestrades');

DEFINE('DB_NAME_SONG_REQ','i_song_requests');

DEFINE('BASE_INCLUDES','framework/includes/');
DEFINE('BASE_STORAGE','../appcore/storage/data_');

DEFINE('INC_PICTURES',$_SERVER['DOCUMENT_ROOT']."/appcore/framework/includes/pictures_core.php");
DEFINE('INC_ROCKNROLL',$_SERVER['DOCUMENT_ROOT']."/appcore/framework/includes/rocknroll_core.php");

DEFINE('STG_PICTURES',BASE_STORAGE."pictures/");
DEFINE('STG_ROCKNROLL',BASE_STORAGE."rocknroll/songs/");

//HANDLERS
DEFINE('APP_CLIENT_HANDLER',$_SERVER['DOCUMENT_ROOT'].'/'.APP_ROOT.'/account_management/user.php');
DEFINE('APP_REQ_HANDLER',$_SERVER['DOCUMENT_ROOT'].'/'.APP_ROOT.'/request_handler.php');

DEFINE('RH_PROFILE_DATA',$_SERVER['DOCUMENT_ROOT'].'/'.APP_ROOT.'/api_handles/rh_profiledata.php');
DEFINE('RH_SEARCH',$_SERVER['DOCUMENT_ROOT'].'/'.APP_ROOT.'/api_handles/rh_search.php');

?>