<?php
	require_once $_SERVER['DOCUMENT_ROOT'].'/appcore/CONFIG.php';
	
	if(isset($_POST['song_name']))
	{		
		$song_name=$_POST['song_name'];
		$response=array();
		
		if(!empty($song_name))
		{
			$conn=mysqli_connect(DB_ADDR, DB_USERNAME, DB_PASSWORD, DB_NAME) or die("Database connection failed!");
			
			//Reset AUTO_INCREMENT if table is empty
			$result=$conn->query("SELECT * FROM ".DB_NAME_SONG_REQ);
			if($result->num_rows==0)
				$conn->query("ALTER TABLE ".DB_NAME_SONG_REQ." AUTO_INCREMENT = 1");
			
			//Add SONG_REQUEST to table
			if($conn->query("INSERT INTO ".DB_NAME_SONG_REQ."(song_name, requested_by) VALUES('$song_name','')"))
			{
				$response['status_text']="Song request posted!";
				$response['status_code']=1;
			}
			else
			{
				$response['status_text']="Song request could not be posted!";
				$response['status_code']=0;
			}
			
			echo json_encode($response);
			
			if($conn)
				$conn->close();
		}
	}
?>
