<?php
session_start ();
require "config.php";
$dbconn = getDbConn ();
// begin check login
$strUsername = $_POST ['txtUsername'];
$strPassword = $_POST ['txtPassword'];
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
// end check login
closeDbConn ( $dbconn );
?>