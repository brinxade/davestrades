<?php

function r_searchContractors($response, $data)
{
    $data=json_decode($data,true);
    $response['response']=array('text'=>'','data'=>array());

    $conn=new Database();
    $result=$conn->execute_query("SELECT * FROM `user_profiles` WHERE `s_expose_as_trade`=1");
    if($result->num_rows>0)
    {
        $response['response']['text']="Contractors found";
        while($row=$result->fetch_assoc())
        {
            $data_item=array(
                'name'=>$row['data_name'],
                'trade'=>$row['data_trade'],
                'phone'=>$row['data_phone'],
                'address'=>$row['data_address'],
                'profile_id'=>$row['uid']
            );
            array_push($response['response']['data'],$data_item);
        }
    }
    else
    {
        $response['response']['text']="No contractors found";
    }

    return $response;
}

?>