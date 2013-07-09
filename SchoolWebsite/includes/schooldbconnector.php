<?php
$dsn = 'mysql:host=localhost;dbname=schoolsystemdb';
$username = 'root';
$password = '';
/*$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
); */

try{
$conn = new PDO($dsn, $username, $password);
//echo 'Connected to database';
$isdbconnected="true";
}
catch(PDOException $err)
{
	echo $err->getMessage();
$isdbconnected="false";
}
?>