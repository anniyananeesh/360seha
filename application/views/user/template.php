<?php include(INCLUDE_ACCOUNT_PATH."/header.php");?>
<?php
	switch($page)
	{
		case($page):
		{
			include($page.".php");
			break;
		}
		case("errors"):
		{
			include("error404.php");
			break;
		}
		default:
		{
			include("home.php");
			break;
		}
	}
?>
<?php include(INCLUDE_ACCOUNT_PATH."/footer.php");?>