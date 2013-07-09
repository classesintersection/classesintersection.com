<?php
	class Teacher
	{
		public function insertStudentAccount($studentInfo, $conn){
			$sql = "INSERT INTO Students (firstName, lastName, sid, password) VALUES ('" .$studentInfo['fname'] . "','" . $studentInfo['lname'] . "',"
				   . $studentInfo['sid'] . ",'" . $studentInfo['pword'] . "')";
			$returnValue = $conn->query($sql);
			
			if($returnValue != false)
			{
				$sqlCourse = "INSERT INTO Takes (sid, cid) VALUES ('" . $studentInfo['sid'] . "','" . $studentInfo['cid'] . "')";
				$returnValue = $conn->query($sqlCourse);
			}
			
			return $returnValue;
		}
		
		public function findTeacher($teacherInfo, $conn){
			$sql = "SELECT * from Teachers WHERE tid = " . $teacherInfo['tid'] . " AND password = '" . $teacherInfo['pword'] . "'";
			$returnValue = $conn->query($sql);
			$fields = $returnValue->fetch();
			$temp = ["queryOutcome" => $returnValue, "name" => $fields["firstName"] . " " . $fields["lastName"]];
			$returnValue = $temp;
			
			return $returnValue;
		}
		
		public function getCoursesIManage($tid, $conn){
			$sql = "SELECT * from Courses, Teaches WHERE Teaches.tid = '" . $tid. "' AND Courses.cid = Teaches.cid";
			$returnValue = $conn->query($sql);
			$rows = $returnValue->fetchAll();
			
			return $rows;	
		}
		
		public function insertUploadedResourceInfo($resourceInfo, $conn){
			$returnValue = true;
			$resourcesSql = "INSERT INTO Resources (rid, tid, cid) VALUES ('" .$resourceInfo['rid'] . "'," 
			 				. $resourceInfo['tid'] . ", '" . $resourceInfo['cid'] . "')";
			$statementExecuteStatus = $conn->query($resourcesSql);
			
			if($statementExecuteStatus != false)
			{
				if(strcmp($resourceInfo['sharingStatus'], "Private") == 0)
				{
					$privateResourceSql = "INSERT INTO PrivateLectureNotes (rid) VALUES ('" .$resourceInfo['rid'] . "')";
					$statementExecuteStatus = $conn->query($privateResourceSql);
				}
				else
				{
					$publicResourceSql = "INSERT INTO SharedResources (rid) VALUES ('" .$resourceInfo['rid'] . "','AB')";
					$statementExecuteStatus = $conn->query($publicResourceSql);
				}
			}
			else
			{
				$returnValue = false;
			}
			
			return $returnValue;
		}
	}
?>