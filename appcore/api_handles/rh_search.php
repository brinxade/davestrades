<?php

function r_searchContractors($response, $data)
{
    $data=json_decode($data,true);
    $targets=array("trades"=>"s_expose_as_trade","contractors"=>"s_expose_as_contractor");
    $response['response']=array('text'=>'','data'=>array());

    if(!empty($data['_target']) && array_key_exists($data['_target'],$targets))
    {
        $conn=new Database();
        $result=$conn->execute_query("SELECT * FROM `user_profiles` WHERE `".$targets[$data['_target']]."`=1");
        if($result && $result->num_rows>0)
        {
            while($row=$result->fetch_assoc())
            {
                $data_item=array(
                    'name'=>$row['data_name'],
                    'trade'=>$row['data_trade'],
                    'phone'=>$row['data_phone'],
                    'address'=>$row['data_address'],
                    'profile_id'=>$row['uid']
                );

                $query=explode(" ",strtolower($data['_q']));
                $haystack=strtolower(" ".$row['data_name']." ".$row['data_trade']." ".$row['data_address']);

                for($i=0;$i<count($query);$i++)
                {
                    if(!empty($query[$i]) && strpos($haystack,$query[$i]))
                    {
                        array_push($response['response']['data'],$data_item);     
                        break;
                    } 
                }        
            }

            if(count($response['response']['data'])>0)
                $response['response']['text']="Results found";
            else
                $response['response']['text']="No results found";
        }
        else
        {
            $response['response']['text']="No results found";
        }
    }
    else
    {
        $response['response']['text']=$data;
        array_push($response['errors'],"Error 400 - Bad Request");
    }

    return $response;
}

?>