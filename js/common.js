console.log("Loading Common.js");

function getCookie(name) 
{
	const value = `; ${document.cookie}`;
	const parts = value.split(`; ${name}=`);
	if (parts.length === 2) return parts.pop().split(';').shift();
	else return false;
}

window.onload=function()
{
	var __js=[['js/authui.js','']];
			  
	for(var i=0;i<__js.length;i++)
	{
		var node=document.createElement('script');
		node.onload=function(){};
		
		node.src=__js[i][0];
		node.async=false;
		
		if(__js[i][1])
			node.type=__js[i][1];
		if(__js[i][2])
			node.setAttribute(__js[i][2],"");
			
		document.head.appendChild(node);
	}
};