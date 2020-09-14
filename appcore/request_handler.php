<?php

require_once 'CONFIG.php';
require_once APP_CLIENT_HANDLER;
require_once DB_HANDLER;

if(!empty($_POST['_request']))
    $request_handler=new RequestHandler($_POST['_request']);
else
    echo "No request posted";

class RequestHandler
{
    private static $_requests_=array(
        'gProfileData'=>array('id'=>'gProfileData','name'=>'Get Profile Data','authType'=>1),
        'pProfileData'=>array('id'=>'pProfileData','name'=>'Update Profile Data','authType'=>1),
		'gContractors'=>array('id'=>'gContractors','name'=>'Find Contractors','authType'=>0)
    );

    private $_response=['response'=>'','ok'=>'1','data'=>'','errors'=>array()];

    function __construct($_r)
    {
        $_request=$_r;
        if(!empty($_POST['_data']))
            $this::$_requests_[$_request]['data']=$_POST['_data'];
        else
            $this::$_requests_[$_request]['data']=NULL;

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
                require_once RH_PROFILE_DATA;
                $this->_response=r_getProfileData($this->_response);
                break;

            case 'pProfileData':
                require_once RH_PROFILE_DATA;
                if(!is_null($this::$_requests_['pProfileData']['data']))
                    $this->_response=r_updateProfileData($this->_response, $this::$_requests_['pProfileData']['data']);
                else
                $this->_response['response']="No changes to be made";
                break;

            case 'gContractors':
                require_once RH_SEARCH;
                if(!is_null($this::$_requests_['gContractors']['data']))
                    $this->_response=r_searchContractors($this->_response, $this::$_requests_['gContractors']['data']);
                else
                    $this->_response['response']="Search query empty";
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