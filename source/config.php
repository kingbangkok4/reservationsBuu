<?php
//connect database
global $mysqli;
$mysqli = mysqli_connect("localhost", "root", "1234", "Project");
mysqli_set_charset($mysqli, "UTF8");
if ($mysqli->connect_error) {
	echo "Failed to connect to MySQL: " . $mysqli->connect_error;
	exit();
}else{
	//echo "connect";
}
//set language
$mysqli->query("SET NAMES UTF8");

?>