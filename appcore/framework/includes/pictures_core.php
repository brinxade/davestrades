<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/appcore/CONFIG.php';

if(isset($_GET['daves']) || isset($_GET['members']))
{
	$banner_h1='';
	$section_dir=array(0=>"dave_collection/",1=>"member_collection/");
	
	$conn=mysqli_connect(DB_ADDR, DB_USERNAME, DB_PASSWORD, DB_NAME) or die("Database connection failed!");
	
	//Vars
	$banner_h1=null;
	$data_photos=null;
	
	if(isset($_GET['daves']))
	{
		$sect_code=0;
		$sect_dir=STG_PICTURES.$section_dir[$sect_code];
		$banner_h1="Dave's Collection";
		
		$result=$conn->query("SELECT * FROM `section_pictures` WHERE `section_code`=0");
		if($result->num_rows<=0)
		{
			$data_photos="<h1>No photos found</h1>";
		}
		else
		{
			$data_photos=array();
			while($row=$result->fetch_assoc())
			{
				array_push($data_photos,embed_picture_to_ui($sect_dir,$row) );
			}
		}
	}
	elseif(isset($_GET['members']))
	{
		$sect_code=1;
		$sect_dir=STG_PICTURES.$section_dir[$sect_code];
		$banner_h1="Member's Pictures";
		
		$result=$conn->query("SELECT * FROM `section_pictures` WHERE `section_code`=1");
		if($result->num_rows<=0)
		{
			$data_photos="<h1>No photos found</h1>";
		}
		else
		{
			$data_photos=array();
			while($row=$result->fetch_assoc())
			{
				array_push($data_photos, embed_picture_to_ui($sect_dir,$row));
			}
		}
	}
	$conn->close();
}

function embed_picture_to_ui($sect_dir,$data)
{
	return '<div class="picture-wrapper"><img src="'.$sect_dir.$data['filename'].'" alt="'.$data['title'].'"></div>';
}

?>
