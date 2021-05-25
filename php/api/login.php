<?php

require_once "../config.php";
require_once DB;

$response=array(
    "text"=>"Credentials Invalid",
    "code"=>101
);

if(empty($_POST["username"]) || empty($_POST["password"]))
{
    echo json_encode($response);
    exit(0);
}

$username=$_POST["username"];
$password=$_POST["password"];
$db=new Db();

$user_data=$db->query("SELECT ua.id, ua.email, ua.password_hash, uas.first_name, uas.last_name 
                        FROM user_accounts as ua
                        JOIN user_accounts_settings as uas 
                        ON ua.id=uas.id 
                        WHERE ua.email=?", $username)->fetchAll();

if(count($user_data)==1 && password_verify($password, $user_data[0]["password_hash"]))
{
    $response["text"]="Logging In";
    $response["code"]=100;
    $response["data"]=$user_data;
}
    
$db->close();
echo json_encode($response);

?>