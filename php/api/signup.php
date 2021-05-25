<?php

require_once "../config.php";
require_once DB;

$hasError=false;
$response=array(
    "text"=>"You must agree to Terms of Services",
    "code"=>101
);

if(empty($_POST["user"]))
{
    $response["text"]="Bad Request";
    echo json_encode($response);
    exit(0);
}

$userData=$_POST["user"];
$regUsername=$userData["regUsername"];
$regPwd=$userData["regPassword"];
$regCpwd=$userData["regCpassword"];
$regTos=$userData["regTos"];
$regNewsletter=$userData["regNewsletter"];

$db=new Db();

if(count($db->query("SELECT * FROM user_accounts WHERE email=? LIMIT 1", $regUsername)->fetchArray()) > 0)
{
    $response["text"]="Email is already in use";
    echo json_encode($response);
    exit(0);
}

$response["code"]=100;
$response["text"]="Mock Success";

$db->close();
echo json_encode($response);

?>