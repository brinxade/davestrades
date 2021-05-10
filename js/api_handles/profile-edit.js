console.log("Profile editor loaded");

$(document).ready(function(){
	//Profile Picture Update
	//-------------------------------------------------
	$("#user-new-pp").click(function(){
		$("#user-new-pp-i").click();
	});

	$("#user-new-pp-i").change(function(){
		var fd=new FormData();
		var files = $(this)[0].files;
		console.log("File Upload Initiate: "+files);
		
		if(files.length>0){
			fd.append('fProfilePicture', files[0]);

			$.ajax({
				url: '/appcore/api_handles/dr_profile_pic_upload.php',
				type: 'POST',
				contentType: false,
				processData: false,
				data: fd,
				success: function(response){
					//var parsedResponse=JSON.parse(response);
					//console.log("Status: "+parsedResponse.text);

					console.log(response);
				}
			});
		}
		
	});

	//Get User Profile Data
	//--------------------------------------------------
	getProfileData();
	function getProfileData()
	{
		$.ajax({
			url:'/appcore/request_handler.php',
			type:'POST',
			dataType:'json',
			data:{_request:'gProfileData'},
			success:function(response)
			{				
				if(response['ok']==1)
				{
					$("#user-name").val(response['data']['name']);
					$("#user-trade").val(response['data']['trade']);
					$("#user-desc").val(response['data']['description']);
					$("#user-phone").val(response['data']['phone']);
					$("#user-addr").val(response['data']['address']);

					if(response['data']['s_tradeExpose']==1)
						$("#user-trademode").prop('checked','true');
					if(response['data']['s_contractorExpose']==1)
						$("#user-contractormode").prop('checked','true');
				}
				else
				{
					console.log("Failed to get profile data: "+e);
				}
			},
			error:function(xhr, e)
			{
				console.log("Failed to get profile data: "+e);
				console.log(xhr.responseText);
			}
		});
	}


	//Update User Profile
	//----------------------------------------------------
	$(".span-edit").click(function(){
		var $self=$(this);
		var target=$("#"+$self.attr("data-target"));
		var icon=$self.find(".fas");
		
		var is_disabled=target.prop("disabled");
		
		if(is_disabled)
		{
			is_disabled=target.prop("disabled",false).focus();
			$self.addClass("active");
			icon.removeClass("fa-pen").addClass("fa-check");
		}
		else
		{
			$self.removeClass("active");
			is_disabled=target.prop("disabled",true);
			icon.removeClass("fa-check").addClass("fa-pen");

			var data_elem=$(this).parent().find('.data-rd');
			var rd_target=data_elem.attr('data-rd-target');
			var rd_value=data_elem.val().trim();
			updateProfileData(rd_target,rd_value);
		}
	});
	
	$(".data-rd-clk").on("click touch",function(){
		var value = $(this).prop("checked") ? 1 : 0;
		updateProfileData($(this).attr('data-rd-target'),value);
	});

	function updateProfileData(target,value)
	{
		var data={};
		data['target']=target;
		data['value']=value;

		$.ajax({
			url:'/appcore/request_handler.php',
			type:'POST',
			dataType:'json',
			data:{_request:'pProfileData',_data:JSON.stringify(data)},
			success:function(response)
			{				
				console.log(response);
				if(response['ok']!=1)
				{
					console.log("Failed to update profile data");
				}
			},
			error:function(xhr, e)
			{
				console.log("Failed to update profile data: "+e);
			}
		});
	}
});