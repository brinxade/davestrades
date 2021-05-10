console.log("Loaded component Global Footer");
class GlobalFooter extends React.Component
{
	
	componentDidMount()
	{
		document.getElementById("sub-email-btn").addEventListener("click",function(){
			var email=document.getElementById("sub-email").value;
			var status_e=document.getElementById("sub-status");
			if(email)
			{
				status_e.innerHTML='<div class="loader-small loader-1"></div>';
				$.ajax({
					url:"appcore/account_management/nl_subscriber.php",
					type:"POST",
					data:{nl_sub:email},
					success:function(data)
					{
						var status_e=document.getElementById("sub-status");
						if(data=="1")
						{
							status_e.innerHTML="Subscribed!";
						}
						else
						{
							status_e.innerHTML='Looks like your email is not registered with us yet! You can do it <a style="color:#45b649;" href="account.php?signup">here</a>.';
						}
					},
					error:function(x,e)
					{
						status_e.innerHTML='Failed to subscribe. Try again later.';
					}
				});
			}
			else
			{
				status_e.innerHTML='No email provided';
			}
		});
	}
	
	render()
	{
		var directory="";
		if(this.props.dir_modifier)
			directory=this.props.dir_modifier;
		
		return(
			<div>
				<div className="footer-inner col">
				<div className="col-14 _left">
					<div className="footer-logo">
						<div className="logo-text"><h3 className="logo-text__company-name">Dave's Trades</h3><span>Where Trades Play Poker</span><br/><br/><address>Brampton, ON</address></div>
					</div>
				</div>
				<div className="col-34 col _right footer-nav">
					<div className="col-13 _left footer-items" align="left"><h4 className="footer-items__title">Quicklinks</h4>
						<nav>
							<a href={directory+"poker.php"}>Poker Tournaments</a>
						</nav>
					</div>
					<div className="col-13 _left footer-items" align="left"><h4 className="footer-items__title">Legal</h4>
						<nav>
							<a href={directory+"helpdesk/view.php?privacy"}>Privacy Policy</a>
							<a href={directory+"helpdesk/view.php?tos"}>Terms of Use</a>
						</nav>
					</div>
					<div className="col-13 _right footer-items" align="left"><h4 className="footer-items__title">Weekly Newsletter</h4>
						<input id="sub-email" type="text" placeholder="john.doe@gmail.com"/><button id="sub-email-btn">Subscribe</button>
						<p id="sub-status"></p>
					</div>
				</div>
			</div>
			<p className="copyright" align="center">Designed by Brinxade &copy; 2020. All Rights Reserved.</p>
			</div>
		);
	}
}