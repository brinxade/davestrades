<?php 

require_once '../appcore/_config.php';
require_once DB_HANDLER;
require_once APP_UPLOAD_HANDLER;

define("UPLOAD_DIR","data_pictures/");
const SUB_SECT=array(0=>"dave_collection/",1=>"member_collection/");

define("ALLOWED_EXT","jpg,png,jpeg");

$response=array();
$response['error']=array();
$response['success']=0;

if(isset($_FILES['s_file']) && (isset($_POST['s_title']) && !empty($_POST['s_title'])))
{
	$file=$_FILES['s_file'];
	$title=empty($_POST['s_title'])?"":$_POST['s_title'];
	$desc=empty($_POST['s_desc'])?"":$_POST['s_desc'];
	$sectcode=empty($_POST['s_sect'])?0:intval($_POST['s_sect']);
	
	$targetfile=time()*rand(0,time())/time().$file['name'];
	
	$uploader=new Uploader();
	$uploader->setUploadDir(UPLOAD_DIR.SUB_SECT[$sectcode]);
	$uploader->setAllowedExt(explode(",",ALLOWED_EXT));
	
	$upload_status=$uploader->uploadFile($file,$targetfile);
	
	if($upload_status==true && !is_array($upload_status))
	{
		$db=new Database();
		
		//Reset AUTO_INCREMENT if table is empty
		$result=$db->execute_query("SELECT * FROM `section_pictures`");
		if($result->num_rows==0)
			$db->execute_query("ALTER TABLE `section_pictures` AUTO_INCREMENT = 1");
		
		if($result=$db->execute_query("INSERT INTO `section_pictures`(filename, title, description, section_code, added_on) VALUES('".basename($targetfile)."','".$title."','".$desc."',".$sectcode.",".time().")"))
		{
			$response['success']=1;
		}
		else
		{
			array_push($response['error'],"Database Error");
		}
	}
	elseif(is_array($upload_status))
	{
		array_push($response['error'],$upload_status);
	}
}
else
{
	array_push($response['error'],"Fill in all required fields");
}

header("Location: se_pictures.php?response=".$response['success']."&error=".$response['error'][0]);

?>