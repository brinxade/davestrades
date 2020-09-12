$(document).ready(function(){
	$("body").on("click","#rex-cms-logout",function(){
		console.log("Logging out")
		$.ajax({
			url:"appcore/admin_logout.php",
			type:"POST",
			data:{task:'logout'},
			success:function(data){
				data=JSON.parse(data);
				window.location.replace(data);
			}
		});
	});
	
	$("body").on("click","#btn-change-pass",function(){
		console.log("Attempt to change password");
		var curr_pass=$("#current-password").val();
		var new_pass=$("#new-password").val();
		var new_cpass=$("#new-cpassword").val();
		
		if(curr_pass && new_pass && new_cpass)
		{
			console.log("Changing password");
			$.ajax({
				url:"appcore/user.php?req=cp&cp="+curr_pass+"&np="+new_pass+"&npc="+new_cpass,
				type:"GET",
				success:function(response)
				{
					console.log(response);
					response=JSON.parse(response);
					if(response['error']==0)
					{
						$("#btn-change-pass").text(response['status']).attr("disabled","");
						$("#change-pass-status").hide();
					}
					else
					{
						$("#change-pass-status").css('color','white').text(response['status']).show();
					}
				}
			});
		}
		else
		{
			$("#change-pass-status").css('color','red').text("Password fields cannot be blank").show();
		}
	});
});