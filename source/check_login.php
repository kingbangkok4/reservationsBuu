<?php
 session_start();
include("config.php");

 $strUsername = $_POST['txtUsername'];
 $strPassword = $_POST['txtPassword'];
// คำสั่ง SQL และสั่งให้ทำงาน
$sql = "SELECT * FROM person WHERE Person_Username='".$strUsername."' and Person_Password='".$strPassword."' ;";
$result = $mysqli->query($sql);

  if ($result->num_rows >0){
	while($row = $result->fetch_assoc()){
		$_SESSION["strUsername"] = $strUsername;
        $_SESSION["strPerson_Id"] = $row["Person_Id"];
	  if($row[Person_Position]=="admin"){
		  
		$_SESSION["Login_Position"] = $row[Person_Position];
		header("location: main_admin.php");
		
	  }else if($row[Person_Position]=="staff"){
		  
	  	$_SESSION["Login_Position"] = $row[Person_Position];
		header("location: main_staff.php");
		  
	  }else{
	  	$_SESSION["Login_Position"] = $row[Person_Position];
		header("location: main_user.php");
		  
	  }
	}
 }else {
  header("location: login.php");
 }
$mysqli->close();

?>