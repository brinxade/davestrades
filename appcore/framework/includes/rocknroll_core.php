<?php
	require_once $_SERVER['DOCUMENT_ROOT'].'/appcore/CONFIG.php';
	
	$data=array();
	$row_count=0;
	
	$conn=mysqli_connect(DB_ADDR, DB_USERNAME, DB_PASSWORD, DB_NAME) or die("Database connection failed!");
	
	$res=$conn->query("SELECT * FROM `section_rocknroll`");
	if($res->num_rows>0)
	{
		while($row=$res->fetch_assoc())
		{
			array_push($data, $row);
			++$row_count;
		}
		$data_formatted=formatData($data,$row_count);
	}
	else
	{
		$data_formatted='<h2 class="clr-white jumbo-caption-medium" style="margin:100px 0;">No songs found</h2>';
	}
	$conn->close();
	
	function formatData($data,$data_count)
	{
		$data_formatted='<table id="song-list">
							<tr class="column-names">
								<th>Name</th>
								<th>Album</th>
								<th>Artist</th>
								<th>Play</th>
								<th>Save</th>
							</tr>';
							
		for($i=0;$i<$data_count;$i++)
		{
			$data_formatted=$data_formatted.'
			<tr>
				<td>'.$data[$i]["name"].'</td>
				<td>'.$data[$i]["album"].'</td>
				<td>'.$data[$i]["artist"].'</td>
				<td><span class="audio"><audio controls><source src="'.STG_ROCKNROLL.$data[$i]["filename"].'" type="audio/mp3" ></audio></span></td>
				<td><a href="'.$data[$i]["filename"].'" class="audio-download"><i class="fas fa-download"></i></a></td>
			</tr>
			';
		}
		
		$data_formatted=$data_formatted.'</table>';
		
		return $data_formatted;
	}
?>
