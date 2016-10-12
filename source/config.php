<?php
function getDbConn() {
	$dbhost = "localhost";
	$dbusername = "root";
	$dbpassword = "1234";
	$dbname = "Project";
	$dbconn = new mysqli ( $dbhost, $dbusername, $dbpassword, $dbname );
	if ($dbconn->connect_error) {
		die ( "Connection failed: " . $dbconn->connect_error );
	}
	$dbconn->set_charset ( "utf8" );
	return $dbconn;
}
function closeDbConn($dbconn) {
	$dbconn->close ();
}
?>