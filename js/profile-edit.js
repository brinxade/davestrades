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
});