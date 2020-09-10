$(document).ready(function(){
	
	$(".modal .close").click(function(){
		$(this).parent().remove();
	});
	
	if(getCookie("cms-sect-id"))
	{
		select_section(getCookie("cms-sect-id"));
		if(getCookie("cms-active-subsect"))
		{
			var subsect_id=getCookie("cms-active-subsect");
			subsect=$("#cms-sections li[data-section='"+subsect_id+"']");
			cmsUpdateSection(subsect,$("#cms-core .content"),subsect.attr('data-section'));
		}
	}
	
	function setCookie(cname, cvalue, exdays) {
		var d = new Date();
		d.setTime(d.getTime() + (exdays*24*60*60*1000));
		var expires = "expires="+ d.toUTCString();
		document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
	}
	
	function getCookie(cname) {
		var name = cname + "=";
		var decodedCookie = decodeURIComponent(document.cookie);
		var ca = decodedCookie.split(';');
		for(var i = 0; i <ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) == ' ') {
				c = c.substring(1);
			}
			if (c.indexOf(name) == 0) {
				return c.substring(name.length, c.length);
			}
		}
		return "";
	}
	
	$("#cms-sections li[data-section]").click(function(){
		console.log("Changing active section to edit")
		setCookie("cms-active-subsect",$(this).attr('data-section'));
		cmsUpdateSection($(this), $("#cms-core .content"),$(this).attr('data-section'));
	});

	var tutorial_target_elem=$("#cms-tutorial");
	$.get("tutorial.html", function(data, status){
		tutorial_target_elem.find(".content").empty().html(data);
	});
	
	/* NAV UserInterface */
	
	var anim_time_1=300;
	
	$("body").on("click",".cms-nav-btn",function(){
		var target_id="#"+$(this).attr('data-target');
		var target_status=$(this).attr('data-target-active');
		
		console.log("UI Target: "+target_id);
		
		if(target_status==0)
		{
			select_section(target_id);
		}
	});
	
	$("body").on("click",".cms-section-close",function(){
		close_section("#"+$(this).attr('data-target'));
	});
	
	function select_section(id)
	{
		setCookie("cms-sect-id",id);
		id_raw=id.replace("#","");
		target_btn=$(`.cms-nav-btn[data-target='${id_raw}'`);
		
		if(!target_btn.hasClass('active'))
			target_btn.addClass('active')
		
		if(target_btn.attr('data-target-active')=="0")
		{
			$(id).stop().slideDown(anim_time_1);
		}
		
		$(".cms-section").not(id).stop().slideUp(anim_time_1);
		$(".cms-nav-btn").not(target_btn).attr('data-target-active','0').removeClass('active');
	}
	
	function button_state(elem,state,c)
	{
		if(state==0)
			elem.removeClass(c);
		
		if(state==1)
			if(!elem.hasClass(c))
				elem.addClass(c);
	}
	
	/* END Nav UserInterface */
});