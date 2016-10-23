<?php
// connect database
global $mysqli;
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "1234";
$dbname = "project";
$mysqli = mysqli_connect ( $dbhost, $dbuser, $dbpass, $dbname );
mysqli_set_charset ( $mysqli, "UTF8" );
if ($mysqli->connect_error) {
	echo "Failed to connect to MySQL: " . $mysqli->connect_error;
	exit ();
} else {
	// echo "connect";
}
// set language
$mysqli->query ( "SET NAMES UTF8" );

?>