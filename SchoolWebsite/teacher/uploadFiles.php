<?php include('../variables/variables.php') ?>
<?php include('../includes/schooldbconnector.php') ?>
<?php include('../models/TeachersModel.php') ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Upload Files | <?php echo $companyName; ?></title>
<link rel="stylesheet" type="text/css" href="../cssfile.css" />
<link rel="stylesheet" type="text/css" href="../inputFieldsCssfile.css" />
<script src="<?php echo "../$jquerySrcName"; ?>"></script>
<script src="../teacherJScript.js"></script>
</head>
<body>
	<div id="wrapper">
		<?php include('../includes/header.php') ?>
		<?php include('../includes/nav.php') ?>
		<?php include('../includes/leftnav.php') ?>
		
		<script>
			$(document).ready(function(){
						      $("[href='loginAndCreateAccount.php']").addClass("highlight")});
		</script>
			
		<div id="content">
			<?php
				if($_SERVER['REQUEST_METHOD'] == "POST")
				{
					if($_FILES["fileInputName"]["error"] <= 0)
					{
						if(file_exists("uploads/".$_FILES["fileInputName"]["name"]))
						{
							echo $_FILES["fileInputName"]["name"]." Already Exists!";
						}
						else
						{
							move_uploaded_file($_FILES["fileInputName"]["tmp_name"], "uploads/".$_FILES["fileInputName"]["name"]);
							echo "Stored in: ". "C:\\wamp\\www\\SchoolWebsite\\teacher\\uploads\\".$_FILES["fileInputName"]["name"];
							
							$resourceInfo = ["rid" => $_FILES["fileInputName"]["name"],
							                 "tid" => $_SESSION["userSession"]["id"],
							                 "cid" => $_GET["cid"],
							                 "sharingStatus" => $_POST["fsharingInputName"]];
							                 
							$teacherObj = new Teacher();
							$insertStatus = $teacherObj->insertUploadedResourceInfo($resourceInfo, $conn);
							
							if(!($insertStatus))
							{
								echo "File Not inserted properly!";
							}
							else
							{
								echo "File inserted properly!";
							}
						}
					}
				}
			?>
		    <?php echo "<form action='uploadFiles.php?cid=" . $_GET["cid"] . "' method='post' enctype='multipart/form-data'>" ?>
		    	<div id="formContentDivId" class="formContentDivClass">
			    	<div class="textInputDivClass">
				        <label class="textInputLabelClass" for="fileInputId">File Name:</label>
				        <input class="textInputFieldClass" type="file" name="fileInputName" id="fileInputId">
			        </div>
			    	<div class="textInputDivClass">
			        	<label class="textInputLabelClass" for="fileDescId">File Sharing Status:</label> 
			        	<select class="textInputFieldClass" size="2" name="fsharingInputName">
			        		<option selected="selected" value="Private">Private</option>
			        		<option value="Public">Public</option>
			        	<select>
			        	<!-- <input class="textInputFieldClass" type="text" name="fileDescName" id="fileDescId" value=""> -->
			        </div>
			        
			        <input class="buttonClass" type="submit" value="Submit">
			    </div>
		    </form>
		</div>
		
		<?php include('../includes/footer.php') ?>
	</div>
</body>
</html>