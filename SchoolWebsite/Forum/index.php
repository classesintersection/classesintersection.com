<?php include('../variables/variables.php') ?>
<?php include('../includes/schooldbconnector.php') ?>
<?php include('../models/TeachersModel.php') ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Teacher | <?php echo $companyName; ?></title>
<link rel="stylesheet" type="text/css" href="../cssfile.css" />
<script src="<?php echo $jquerySrcName; ?>"></script>
<script src="../teacherJScript.js"></script>
</head>
<body>
	<div id="wrapper">
		<?php include('../includes/header.php') ?>
		<?php include('../includes/nav.php') ?>
		<!-- <?php include('../includes/leftnav.php') ?> -->

		<div id="content">
			<?php
				if(isset($_SESSION["userSession"]))
				{
					echo "Logged in as " . $_SESSION["userSession"]["name"];
				}
			?>

			<form action="loginProcess.php" method="post">
				User Name: <input type="text" name="uname">
				<br />
				Password: <input type="password" name="pwd" value="">
				<br />
				<input type="submit" value="Login">
			</form>
			<?php
				echo'<br/> or sign up <a href="register.php"> here </a>';
			?>
		</div>

		<?php include('../includes/footer.php') ?>
	</div>
</body>
</html>
