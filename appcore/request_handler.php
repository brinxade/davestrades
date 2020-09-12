<?php

require_once 'CONFIG.php';
require_once APP_CLIENT_HANDLER;
require_once RH_PROFILE_DATA;
require_once DB_HANDLER;

if(!empty($_POST['_request']))
    $request_handler=new RequestHandler($_POST['_request']);
else
    echo "No request posted";

class RequestHandler
{
    private static $_requests_=array(
        'gProfileData'=>array('id'=>'gProfileData','name'=>'Get Profile Data','authType'=>0)
    );

    private $_response=['response'=>'','ok'=>'1','data'=>'','errors'=>array()];

    function __construct($_r)
    {
        $_request=$_r;

        if(array_key_exists($_request, $this::$_requests_))
        {
            if($this::$_requests_[$_request]['authType']==1)
            {
                $user=new User();
                if($user->is_logged_in)
                {
                    $this->process_request($this::$_requests_[$_request]);
                }
                else
                {
                    $this->_response['response']="Request Failed";
                    array_push($this->_response['errors'],"Authentication Required");
                    $this->_response['ok']=0;
                }
            }
            else
            {
                $this->process_request($this::$_requests_[$_request]);
            }
        }
        else
        {
            $this->_response['response']="400 - Bad Request";
            array_push($this->_response['errors'],"400 - Bad Request");
            $this->_response['ok']=0;
        }

        echo json_encode($this->_response);
    }

    function process_request($_r)
    {
        switch($_r['id'])
        {
            case 'gProfileData':
                $this->_response=r_getProfileData($this->_response);
                break;
            default:
                $this->_response['response']="Request is currently not supported";
                array_push($this->_response['errors'],"Request is currently not supported");
                $this->_response['ok']=0;
                break;
        }
    }
}

?>