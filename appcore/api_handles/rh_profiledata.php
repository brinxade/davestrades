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
            's_tradeExpose'=>$data['s_expose_as_trade'],
            's_contractorExpose'=>$data['s_expose_as_contractor']
        );
        $response['response']="Profile Data Retrieved";
    }
    else
    {
        $response['response']="Failed to retrieve profile data";
        array_push($response['errors'],"User profile does not exist");
        $response['ok']=0;
    }

    $conn->close();
    return $response;
}

function r_updateProfileData($response, $data)
{
    $data=json_decode($data,true);

    $user=new User();
    $user_id=$user->user_id;

    $targets=array(
        0=>"data_name",
        1=>"data_trade",
        2=>"data_description",
        3=>"data_phone",
        4=>"data_address",
        5=>"s_expose_as_trade",
        6=>"s_expose_as_contractor"
    );
    
    if(key_exists($data['target'], $targets))
    {
        $target=$targets[$data['target']];
        $value=$data['value'];

        $conn=new Database();
        if($conn->execute_query("UPDATE `user_profiles` SET `$target`='$value' WHERE `uid`=$user_id"))
        {
            $response['response']="Profile Updated";
        }
        else
        {
            array_push($response['errors'],"Failed to update profile (DB Error)");
            $response['ok']=0;
        }
        $conn->close();
    }
    else
    {
        array_push($response['errors'],"Data Invalid");
        $response['ok']=0;
    }

    return $response;
}

?>