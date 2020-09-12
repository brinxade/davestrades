<?php

function r_getProfileData($response)
{
    $user=new User();
    $user_id=$user->user_id;

    $conn=new Database();

    $result=$conn->execute_query("SELECT * FROM `user_profiles` WHERE `uid`=$user_id");
    if($data=$result->fetch_assoc())
    {
        $response['data']=array(
            'name'=>$data['data_name'],
            'trade'=>$data['data_trade'],
            'description'=>$data['data_description'],
            'phone'=>$data['data_phone'],
            'address'=>$data['data_address'],
            's_tradeExpose'=>$data['s_expose_as_trade']
        );
    }
    else
    {
        $response['response']="Failed to update profile";
        array_push($response['errors'],"User profile does not exist");
        $response['ok']=0;
    }

    $conn->close();
    return $response;
}

function r_setProfileData($response, $data)
{

}

?>