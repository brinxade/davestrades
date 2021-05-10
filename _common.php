<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/appcore/CONFIG.php';

# Cache Disable
header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');

$_common['head']='
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <link rel="icon" type="image/png" href="favicon.png">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>
    <script src="https://unpkg.com/react@16/umd/react.development.js" crossorigin></script>
    <script src="https://unpkg.com/react-dom@16/umd/react-dom.development.js" crossorigin></script>    

    <script src="js/react-components/GlobalHeader.js" type="text/babel"></script>
	<script src="js/react-components/GlobalFooter.js" type="text/babel"></script>
    <script src="js/react-controller/base-controller.js" type="text/babel"></script>
    
    <link rel="stylesheet" type="text/css" href="css/core.css"/>
    <link rel="stylesheet" type="text/css" href="css/common.css"/>
    <link rel="stylesheet" type="text/css" href="css/accounts.css"/>
';

$_common['foot']='
    <script src="js/authui.js"></script>
    <script src="js/common.js"></script>
    <script src="https://kit.fontawesome.com/6f67bd47b3.js" crossorigin="anonymous"></script>
';

function _auth_required($path){
    require_once APP_CLIENT_HANDLER;

    $user=new User();
    /*if($user->is_logged_in!=1)
        $user->direct_user('/account.php?login&redirect='.$path);*/
}

?>