<?php include('variables/variables.php') ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Login | <?php echo $companyName ?></title>
<link rel="stylesheet" type="text/css" href="cssfile.css" />
<link rel="stylesheet" type="text/css" href="inputFieldsCssfile.css" />
<script src="<?php echo $jquerySrcName; ?>"></script>
</head>
<body>
	<div id="wrapper">
		<?php include('includes/header.php') ?>
		<?php include('includes/nav.php') ?>
		
		<script>
			$(document).ready(function(){
						      $("[href='loginAndCreateAccount.php']").addClass("highlight")});
		</script>

		
		<div id="content">
		    <form action="loginProcess.php" method="post">
		    	<div id="formContentDivId" class="formContentDivClass">
			    	<div class="textInputDivClass">
				        <label class="textInputLabelClass" for="userIdId">User ID:</label>
				        <input class="textInputFieldClass" type="text" name="userIdName" id="userIdId">
			        </div>
			    	<div class="textInputDivClass">
			        	<label class="textInputLabelClass" for="pwdId">Password:</label> 
			        	<input class="textInputFieldClass" type="password" name="pwd" id="pwdId" value="">
			        </div>
			        
			        <input class="buttonClass" type="submit" value="Login">
			        
			        <p>
			        	or sign up <a href="register.php"> here </a>
			        </p>
			    </div>
		    </form>
		</div>
		
		<?php include('includes/footer.php') ?>
	</div>
</body>
</html>