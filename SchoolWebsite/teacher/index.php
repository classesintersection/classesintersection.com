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
			
			<table id="listOfCoursesTblId">
				<caption>Courses Instructed</caption>
				<?php
					$teacherObj = new Teacher();
					$returnVal = $teacherObj->getCoursesIManage($_SESSION["userSession"]["id"], $conn);
					
					if(sizeof($returnVal) == 0)
					{
						echo "You do not current have courses you instruct!";
					}
					else
					{
						foreach($returnVal as $value)
						{
							echo "<tr><td><a href='coursePage.php?cid=" . $value["cid"] . "'>" . $value["cid"] . ": " . $value["title"] . "</a></td></tr>";
						}
					}
				?>
			</table>		
		</div>
		
		<?php include('../includes/footer.php') ?>
	</div>
</body>
</html>