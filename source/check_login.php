<?php
session_start ();
// require "config.php";

//
$dbhost = "localhost";
$dbusername = "root";
$dbpassword = "1234";
$dbname = "Project";
$dbconn = new mysqli ( $dbhost, $dbusername, $dbpassword, $dbname );
if ($dbconn->connect_error) {
	die ( "Connection failed: " . $dbconn->connect_error );
}
$dbconn->set_charset ( "utf8" );
//

$strUsername = $_POST ['txtUsername'];
$strPassword = $_POST ['txtPassword'];
// คำสั่ง SQL และสั่งให้ทำงาน
$sql = "SELECT * FROM person WHERE Person_Username='" . $strUsername . "' and Person_Password='" . $strPassword . "' ;";
$result = $dbconn->query ( $sql );

if ($result->num_rows > 0) {
	while ( $row = $result->fetch_assoc () ) {
		$_SESSION ["strUsername"] = $strUsername;
		$_SESSION ["strPerson_Id"] = $row ["Person_Id"];
		if ($row [Person_Position] == "admin") {
			
			$_SESSION ["Login_Position"] = "admin";
			header ( "location: page2.php" );
		} else if ($row [Person_Position] == "staff") {
			
			$_SESSION ["Login_Position"] = "staff";
			header ( "location: page4.php" );
		} else {
			header ( "location: page3.php" );
		}
	}
} else {
	header ( "location: login.php" );
}

$dbconn->close ();
?>