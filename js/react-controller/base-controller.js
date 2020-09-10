console.log("Loaded react-controller:common");

var dir_root="";
var nav_items=(
<div>
	<HeaderNavItem link="index.php" state="" name="Home"/>
	<HeaderNavItem link="tradesandcontracts.php" state="" name="Trades And Contracts"/>
	<HeaderNavItem link="classiccars.php" state="" name="Classic Cars"/>
	<HeaderNavItem link="davescoolstuff.php" state="" name="Dave's Cool Stuff"/>
	<HeaderNavItem link="rocknroll.php" state="" name="Rock N' Roll"/>
	<HeaderNavDropdown state="" trigger_name="Pictures" nav=
	{
		<div>
			<HeaderNavItem link="pictures.php?daves" state=" " name="Dave's Collection"/>
			<HeaderNavItem link="pictures.php?members" state=" " name="Member's Pictures"/>
		</div>
	}/>
	<HeaderNavItem link="toolbox.php" state=" " name="Toolbox"/>
	<HeaderNavItem link="poker.php" state=" " name="Poker"/>
</div>
);

ReactDOM.render(<GlobalHeader nav={nav_items} porn_btn={dir_root+"about-us.php"} dir_root={dir_root}/>,document.getElementById("header"));
ReactDOM.render(<GlobalFooter/>,document.getElementById("footer"));



