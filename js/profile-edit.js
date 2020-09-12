console.log("Profile editor loaded");

$(document).ready(function(){
	$("#user-new-pp").click(function(){
		$("#user-new-pp-i").click();
	});
	
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
		}
	});

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
				console.log(response);		
				if(response['ok']==1)
				{
					$("#user-name").val(response['data']['name']);
					$("#user-trade").val(response['data']['trade']);
					$("#user-desc").text(response['data']['description']);
					$("#user-phone").text(response['data']['phone']);
					$("#user-addr").text(response['data']['address']);

					if(response['data']['s_tradeExpose']==1)
						$("#user-trademode").prop('checked','true');
				}
				else
				{
					console.log("Failed to get profile data: "+e);
				}
			},
			error:function(xhr, e)
			{
				console.log("Failed to get profile data: "+e);
			}
		});
	}
});