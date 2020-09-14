console.log("Loaded component Global Header");

class GlobalHeader extends React.Component
{
	componentDidMount()
	{
		var expand_count=0;
			
		$(window).click(function(event){
			if(expand_count>0)
				$("#site-nav").stop().slideUp();
		});
			
		$("#mobile-nav-trigger").click(function(){
			$("#site-nav").stop().slideToggle();
			expand_count+=1;
		});
		
			
		$("body").on("click","#site-nav,#mobile-nav-trigger",function(e){
			e.stopPropagation();
		});
			
		
		if(getCookie("user-auth-token")==false || getCookie("user-logged-in")==false)
		{
			
		}
		else
		{
			$("#header").find("#hl-buttons").empty();
			ReactDOM.render(<AuthUserUI/>,document.querySelector("#hl-buttons"));
		}
	}
	
	render()
	{
		return(
			<div className="col">
				<div className="logo-img">
					<a href={this.props.dir_root+"index.php"}><img src={this.props.dir_root+"css/images/logo-head.png"} alt="logo"/></a>
					<a className="porn-btn" href={this.props.porn_btn}>About Us</a>
				</div>
				<div className="upper" align="center">
					<div className="left logo">
						<h1><a href={this.props.dir_root+"index.php"}>Dave&apos;s Trades</a></h1>
						<p className="tagline">It&apos;s three cents a day for you cheap BASTARDS<span>Censored</span></p>
					</div>
					<div id="hl-buttons" className="right">
						<a href={this.props.dir_root+"account.php?login"} className="btn">Login</a>
						<a href={this.props.dir_root+"account.php?signup"} className="btn">Register</a>
					</div>
				</div>
				<div id="mobile-nav-trigger" align="center"><span></span></div>
				<nav id="site-nav" align="center">
					{this.props.nav}
				</nav>
			</div>
		);
	}
}

class HeaderNavItem extends React.Component
{
	render()
	{
		var classes=this.props.state+" btn-style-3"
		return(
			<a href={this.props.link} className={classes}>{this.props.name}</a>
		);
	}
}

class HeaderNavDropdown extends React.Component
{
	render()
	{
		var classes=this.props.state+" nav-dd-trigger btn-style-3"
		return(
			<div className="nav-dd">
				<a href="#" className={classes}>{this.props.trigger_name}</a>
				<div className="nav-dd-items">{this.props.nav}</div>
			</div>
		);
	}
}

class AuthUserUI extends React.Component
{
	componentDidMount()
	{		
		var _self=$("#header").find(".auth-user-ui");
		_self.hover(function(){
			_self.find(".content").show();
		},function(){
			_self.find(".content").hide();
		});
	}
	
	render()
	{
		return (
			<div className="auth-user-ui">
				<div className="trigger">
					<div className="user-pp"><img src="/css/images/sample-pp.png" width="100px" height="100px"/></div>
				</div>
				<div className="content">
					<div className="inner">
						<div className="auth-user-nav">
							<a href="/profile.php"><i className="fas fa-edit"></i>Manage Profile</a>
							<a id="user-auth-logout" href="appcore/account_management/logout.php"><i className="fas fa-sign-out-alt"></i>Logout</a>
						</div>
					</div>
				</div>
			</div>
		);
	}
}









