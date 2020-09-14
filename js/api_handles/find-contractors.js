console.log("Find Contractors loaded");

$(document).ready(function(){
	$("#contractors .search .search-button").on("click touch",function(){
		var q=$("#contractors-search").val().trim();
		var data={}
		data['_q']=q;

		$("#contractors .loader").show();

		$.ajax({
			url:'/appcore/request_handler.php',
			type:'POST',
			dataType:'json',
			data:{_request:'gContractors',_data:JSON.stringify(data)},
			success:function(response){
				if(response['ok']==1)
				{
					if(response['response']['data'].length==0)
					{
						$("#contractors-search-result").show().html('<p class="response-text">'+response['response']['text']+'</p>');
					}
					else
					{
						var result_list=[];
						for(var i=0;i<response['response']['data'].length;i++)
						{
							result_list.push(`
							<div class="result-item">
								<span class="stat">
									<span class="stat-name">Name</span>
									<span class="stat-value">${response['response']['data'][i]['name']}</span>
								</span>
								<span class="stat">
									<span class="stat-name">Trade</span>
									<span class="stat-value">${response['response']['data'][i]['trade']}</span>
								</span>
								<span class="stat">
									<span class="stat-name">Phone</span>
									<span class="stat-value">${response['response']['data'][i]['phone']}</span>
								</span>
								<span class="stat">
									<span class="stat-name">Address</span>
									<span class="stat-value">${response['response']['data'][i]['address']}</span>
								</span>
								<span class="stat"><a class="btn-s1" href="profile.php?view=${response['response']['data'][i]['profile_id']}">View Profile</a></span>
							</div>
							`);
						}
						$("#contractors-search-result").show().html(result_list);
					}
				}
				else
				{
					$("#contractors-search-result").show().html('<p class="response-text">Failed to load contractors</p>');
					console.log("Failed to fetch contractors");
				}
				$("#contractors .loader").hide();
			},
			error:function(xhr, e){
				$("#contractors-search-result").show().html('<p class="response-text">Failed to load contractors</p>');
				console.log("Failed to fetch contractors: "+e);
				console.log(xhr.responseText);
				$("#contractors .loader").hide();
			}
		});
	});
});