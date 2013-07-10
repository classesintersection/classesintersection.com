<?php
	echo "<div id='leftnav'>";
	echo "<li><a href='../teacher/'>Teacher's Home</a></li>";
	
	if(isset($_GET["cid"]))
	{
		echo "<li><a href='createStudentsAccount.php?cid=" . $_GET["cid"] . "'>Create Students Accounts</a></li>";
		echo "<li><a href='uploadFiles.php?cid=" . $_GET["cid"] . "'>Upload Files</a></li>";
	}
	else
	{
		echo "<li><a href='createStudentsAccount.php'>Create Students Accounts</a></li>";
		echo "<li><a href='uploadFiles.php'>Upload Files</a></li>";
	}
	echo "</div>";
?>