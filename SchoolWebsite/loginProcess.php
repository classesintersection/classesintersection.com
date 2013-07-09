<?php
	session_start();
	include('includes/schooldbconnector.php');
	include('models/TeachersModel.php');
	
	if(strlen($_POST["userIdName"]) == 4)
	{
		$teacherInfo = ["tid" => $_POST["userIdName"], "pword" => crypt($_POST["pwd"],"codeflow")];
		$teacherObj = new Teacher();
		$returnStatus = $teacherObj->findTeacher($teacherInfo, $conn);
		
		if($returnStatus["queryOutcome"]->rowCount() == 0)
		{
			echo "Teacher Does Not Exist";
		}
		else
		{
			$_SESSION["userSession"] = ["type" => "teacher", "id" => $_POST["userIdName"], "name" => $returnStatus["name"]];
			header("Location: teacher/");
			//echo $returnStatus->fetchColumn(0);
			
		}
	}
?>