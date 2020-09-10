<?php 

require_once '../appcore/_config.php';
require_once DB_HANDLER;
require_once APP_UPLOAD_HANDLER;

define("UPLOAD_DIR","data_rocknroll/songs/");
define("ALLOWED_EXT","mp3,wav");

$response=array();
$response['error']=array();
$response['success']=0;

if(isset($_FILES['s_file']) && isset($_POST['s_name']))
{
	$file=$_FILES['s_file'];
	$filename=$_POST['s_name'];
	$artist=isset($_POST['s_artist'])?$_POST['s_artist']:"";
	$album=isset($_POST['s_album'])?$_POST['s_album']:"";
	$tags_string=isset($_POST['s_tags'])?$_POST['s_tags']:"";
	
	$max_tags=5;
	
	if(empty($file) || empty($filename))
	{
		array_push($response['error'],"Fill in all required fields");
	}
	else
	{
		//Validation
		if(preg_match('/^[a-z\d\\s]+$/i',($filename)) && (preg_match('/^[a-z\d\\s]+$/i',($artist)) || trim($artist)=="") && (preg_match('/^[a-z\d\\s]+$/i',($album)) || trim($album)==""))
		{
			$tags=explode(",",$tags_string);
			$tagsAreValid=true;
			
			foreach($tags as $tag)
			{
				if(preg_match('/^[a-z\d\\s]+$/i',($tag))==false && $tag!="")
				{
					$tagsAreValid=false;
					break;
				}
			}
			
			if($tagsAreValid)
			{
				$tagCount=count($tags);
				if($tagCount>=0 && $tagCount<=$max_tags)
				{
					$target_filename= uniqid(rand(), true) . $file['name'];
					
					$uploader=new Uploader();
					$uploader->setUploadDir(UPLOAD_DIR);
					$uploader->setAllowedExt(explode(",",ALLOWED_EXT));
					
					$upload_status=$uploader->uploadFile($file,$target_filename);
					
					if($upload_status==true && !is_array($upload_status))
					{
						$db=new Database();
						
						//Reset AUTO_INCREMENT if table is empty
						$result=$db->execute_query("SELECT * FROM `section_rocknroll`");
						if($result->num_rows==0)
							$db->execute_query("ALTER TABLE `section_rocknroll` AUTO_INCREMENT = 1");
						
						if($result=$db->execute_query("INSERT INTO `section_rocknroll`(filename, name, album, artist, search_tags,added_on) VALUES('".basename($target_filename)."','".$filename."','".$album."','".$artist."','".$tags_string."',".time().")"))
						{
							$response['success']=1;
						}
						else
						{
							array_push($response['error'],"Database Error");
						}
					}
					else
					{
						array_push($response['error'],$upload_status);
					}
				}
				else
				{
					array_push($response['error'],$max_tags." Max Song Tags Allowed");
				}
			}
			else
			{
				array_push($response['error'],"Song Tags can only be Alphanumeric");
			}
		}
		else
		{
			array_push($response['error'],"Only Alphanumerics are Allowed");
		}
	}
}
else
{
	array_push($response['error'],"Fill in all required fields");
}

header("Location: se_rocknroll.php?response=".$response['success']."&error=".json_encode($response['error'][0]));

?>