$(document).ready(function(){
	
	$("audio").audioPlayer();
	
	$("#btn-song-search").click(function(){
		console.log("ACTION: Song search");
	});

	$("#btn-song-request").click(function(){
		console.log("ACTION: Song request");
		
		var data=$("#i-song-request").val().trim();
		
		if(data)
		{
			$.ajax({
				url:'../appcore/framework/includes/song_request.php',
				type:'POST',
				data:{song_name:data},
				success:function(response)
				{
					parsed_response=JSON.parse(response);
					$("#i-song-request").val('');
					
					if(parsed_response['status_code']==1)
					{
						$(".modal").html(parsed_response['status_text']).show();
					}
					else
					{
						$(".modal").html(parsed_response['status_text']).show();
					}
					
					setTimeout(function(){$(".modal").fadeOut(1000);},2500);
				}
			});
		}
	});
});