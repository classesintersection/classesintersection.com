<?php 
	include('variables/variables.php') 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Logout | <?php echo $companyName ?></title>
<link rel="stylesheet" type="text/css" href="cssfile.css" />
</head>
<body>
	<div id="wrapper">
		<?php include('includes/header.php') ?>
		<?php include('includes/nav.php') ?>
		
		<div id="content">
			<?php
				if(isset($_SESSION["userSession"]))
				{
					unset($_SESSION["userSession"]);
					header("Location: logout.php");
				}
				echo "Successfully Logged out!";
			?>
		</div>
		
		<?php include('includes/footer.php') ?>
	</div>
</body>
</html>