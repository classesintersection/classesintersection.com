<?php session_start() ?>
<div id="nav">
	<a href="index.php">Home</a>
	<a href="">About Us</a>
	<!--<a href="createAccount.php">Login / Create Account</a> -->
	<?php
		if(!isset($_SESSION["userSession"]))
		{
	?>
			<a href="loginAndCreateAccount.php">Login / Create Account</a>
	<?php
	    }
	    else
	    {
	?>
			<a href="../logout.php">Logout</a>
			<a href="/SchoolWebsite/forum">Forum</a>
	<?php
	    }
	?>
	<a href="">Contact</a>
</div>