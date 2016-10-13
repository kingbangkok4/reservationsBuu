<?php
function getMySQLi() {
	$dbhost = "localhost";
	$dbusername = "root";
	$dbpassword = "1234";
	$dbname = "Project";
	$mysqli = new mysqli ( $dbhost, $dbusername, $dbpassword, $dbname );
	if ($mysqli->connect_errno) {
		// die ( "Connection failed: " . $mysqli->connect_error );
		exit ();
	}
	$mysqli->set_charset ( "utf8" );
	return $mysqli;
}
?>