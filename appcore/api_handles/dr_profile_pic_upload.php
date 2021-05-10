<?php

require_once '../CONFIG.php';
require_once APP_CLIENT_HANDLER;

$pathBaseUserProfiles="../storage/user_profiles";

$response=array();
$response['errors']=array();
$response['text']="No file selected";

if(!empty($_FILES['fProfilePicture']['name'])){
    $file=$_FILES['fProfilePicture'];
    $user=new User();
    $ext=explode(".",$file['name']);

    if($user->is_logged_in && $user->user_id){
        $pathUserProfile=$pathBaseUserProfiles."/".$user->user_id."/pp.".end($ext);
        $response=uploadFile($file, $pathUserProfile, $response);
    }
}

function uploadFile($file, $targetPath, $response){

    $allowedExt=array("jpg");
    $imageFileType = pathinfo($targetPath,PATHINFO_EXTENSION);
    $imageFileType = strtolower($imageFileType);

    if(in_array($imageFileType, $allowedExt)) {

        // Delete profile picture(s) with any of the allowed extensions
        if(is_dir(dirname($targetPath))){
            $oldProfilePicture = glob(dirname($targetPath)."/*");
            foreach($oldProfilePicture as $img){
                if(is_file($img)) {
                    unlink($img);
                }
            }
        }
        
        if(move_uploaded_file($file['tmp_name'],$targetPath)){
            $response['text']="Profile picture updated";
        }
        else{
            array_push($response['errors'], "ERR_FILE_UPLOAD_FAILED");
            $response['text']="Failed to change profile picture";
        }

    }
    else{
        array_push($response['errors'], "ERR_INVALID_FILE_EXT");
        $response['text']="Please select a .jpg type image";
    }

    $response['path']=$targetPath;
    return $response;
}

echo json_encode($response);

?>