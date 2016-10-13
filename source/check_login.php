<?php
session_start ();
require "config.php";
$mysqli = getMySQLi ();
// begin check login
$query = "SELECT * FROM person WHERE Person_Username='" . $_POST ["txtUsername"] . "' and Person_Password='" . $_POST ["txtPassword"] . "'";
if ($result = $mysqli->query ( $query )) {
	while ( $row = $result->fetch_assoc () ) {
		$_SESSION ["strUsername"] = $_POST ["txtUsername"];
		$_SESSION ["strPerson_Id"] = $row ["Person_Id"];
		switch ($row ["Person_Position"]) {
			case "admin" :
			case "staff" :
				$_SESSION ["Login_Position"] = $row ["Person_Position"];
				break;
			default :
				$_SESSION ["Login_Position"] = "";
				break;
		}
	}
	header ( "location: home.php?page=welcome" );
	$result->free ();
} else {
}
// end check login
$mysqli->close ();
?>