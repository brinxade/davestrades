console.log("Loaded react-controller:common");

var dir_root="../";
var nav_items=(
<div>
	<HeaderNavItem link={dir_root+"index.php"} state="" name="Home"/>
	<HeaderNavItem link={dir_root+"tradesandcontracts.php"} state="" name="Trades And Contracts"/>
	<HeaderNavItem link={dir_root+"classiccars.php"} state="" name="Classic Cars"/>
	<HeaderNavItem link={dir_root+"davescoolstuff.php"} state="" name="Dave's Cool Stuff"/>
	<HeaderNavItem link={dir_root+"rocknroll.php"} state="" name="Rock N' Roll"/>
	<HeaderNavDropdown state="" trigger_name="Pictures" nav=
	{
		<div>
			<HeaderNavItem link={dir_root+"pictures.php?daves"} state=" " name="Dave's Collection"/>
			<HeaderNavItem link={dir_root+"pictures.php?members"} state=" " name="Member's Pictures"/>
		</div>
	}/>
	<HeaderNavItem link={dir_root+"toolbox.php"} state=" " name="Toolbox"/>
	<HeaderNavItem link={dir_root+"poker.php"} state=" " name="Poker"/>
</div>
);

ReactDOM.render(<GlobalHeader nav={nav_items} porn_btn={dir_root+"about-us.php"} dir_root={dir_root}/>,document.getElementById("header"));
ReactDOM.render(<GlobalFooter/>,document.getElementById("footer"));



