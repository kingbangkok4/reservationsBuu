<?php
session_start ();
// require "config.php";

// begin get db connection
$dbhost = "localhost";
$dbusername = "root";
$dbpassword = "1234";
$dbname = "Project";
$dbconn = new mysqli ( $dbhost, $dbusername, $dbpassword, $dbname );
if ($dbconn->connect_error) {
	die ( "Connection failed: " . $dbconn->connect_error );
}
$dbconn->set_charset ( "utf8" );
// end get db connection

$strUsername = $_POST ['txtUsername'];
$strPassword = $_POST ['txtPassword'];
// คำสั่ง SQL และสั่งให้ทำงาน
$sql = "SELECT * FROM person WHERE Person_Username='" . $strUsername . "' and Person_Password='" . $strPassword . "' ;";
$result = $dbconn->query ( $sql );
if ($result->num_rows > 0) {
	while ( $row = $result->fetch_assoc () ) {
		$_SESSION ["strUsername"] = $strUsername;
		$_SESSION ["strPerson_Id"] = $row ["Person_Id"];
		switch ($row [Person_Position]) {
			case "admin" :
			case "staff" :
				$_SESSION ["Login_Position"] = $row [Person_Position];
				break;
			default :
				$_SESSION ["Login_Position"] = "";
				break;
		}
	}
}
header ( "location: home.php?page=welcome" );

// begin close db connection
$dbconn->close ();
// end close db connection
?>