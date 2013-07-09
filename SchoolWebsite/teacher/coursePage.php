<?php include('../variables/variables.php') ?>
<?php include('../includes/schooldbconnector.php') ?>
<?php include('../models/TeachersModel.php') ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>
	<?php 
		echo $_GET["cid"] . " | ";
		echo $companyName; 
	?>
</title>
<link rel="stylesheet" type="text/css" href="../cssfile.css" />
<script src="<?php echo "../$jquerySrcName"; ?>"></script>
<script src="../teacherJScript.js"></script>
</head>
<body>
	<div id="wrapper">
		<?php include('../includes/header.php') ?>
		<?php include('../includes/nav.php') ?>
		<?php include('../includes/leftnav.php') ?>
		
		<div id="content">
			
			<?php
				echo "<h2>Create Students Account for " . $_GET["cid"] . "</h2>";
				$enteredName = "";
				if(isset($_POST["studentNameInputName"]))
				{
					$enteredNames = explode(" ", trim($_POST["studentNameInputName"]));				
					$studentInfo = ["fname" => $enteredNames[0], 
					                "lname" => $enteredNames[sizeof($enteredNames)-1],
					                "sid" => $_POST["sidName"],
					                "pword" => crypt($_POST["sidName"],"codeflow")];
					
					$TeacherObj = new Teacher();
					$insertStatus = $TeacherObj->insertStudentAccount($studentInfo, $conn);
					
					if(!($insertStatus))
					{
						echo "The Student '" . $_POST["studentNameInputName"] . "' Account was not succesfully created!";
					}
					else
					{
						echo "The Student '" . $_POST["studentNameInputName"] . "' Account was succesfully created!<br />";
						echo "------------------------------------------------<br />";
						echo "Create another Students Account";
					}
				}
			?>
			
			<form action="" method="post" id="frmId" name="frmName">
				<label for="studentNameDivId">Student Name</label>
				<input type="text" id="studentNameInputId" name="studentNameInputName" 
				  value="<?php echo $enteredName ?>"/>
				  
				<table id="studPreviewTblId">
					<caption>Student Account Preview</caption>
					<tr><th>Full Name</th><th>Id Generated</th><th>Default Password</th></tr>
					<tr>
						<td id="tdnameId"></td>
						<td id="tdsidId"><input type="text" id="sidId" name="sidName" value="" /></td>
						<td id="tdpasswordId"><input type="text" id="passwordId" name="passwordName" value="" /></td>
					</tr>
				</table>
				
				<input type="button" id="previewBtnId" value="Preview" />			
				<div id="submitBtnDivId"><input type="submit" id="submitBtnId" value="Submit" /></div>
				
			<script>
				$(document).ready(function(){
					$("#studentNameInputId").change(function(){
						$.post("../generateId.php",{studentName: (""+($(this).val()))},
						function(data, status){
							$("#tdnameId").text($("#studentNameInputId").val()+"");
							$("#sidId").val(data);
							$("#passwordId").val(data);});
														
							var allnames =  ($.trim($("#studentNameInputId").val())).split(' ');
					           if(allnames.length <= 1)
					           {
						           alert("Please entre both first and last names!");
						           $("#submitBtnDivId").hide();
					           }
					           else
					           {
						           if(status="success")
									{
										$("#studPreviewTblId").slideDown("slow");
										$("#submitBtnDivId").slideDown("slow");
									}
					           }
					});
				});
			</script>
			
			</form>
		</div>
		
		<?php include('../includes/footer.php') ?>
	</div>
</body>
</html>