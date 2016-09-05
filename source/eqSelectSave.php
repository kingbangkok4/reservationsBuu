<?
 session_start();
if($_SESSION["strUsername"] ==  null){
 //header("location: index.php");
 exit(); 
 }
 ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<title>ระบบสั่งจองสินค้าในมหาลัยบูรพา วิทยาเขตสระแก้ว</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<head>

<body>
<?php
	include "include/connect.php";	
//เตรียมตัวแปร
$Person_Username = $_SESSION["strUsername"];
$Product_Id = $_REQUEST["Product_Id"];
$proTake = $_REQUEST["proTake"];
$Product_Name = $_REQUEST["Product_Name"];
$Product_Price = $_REQUEST["Product_Price"];
$eqsum = $_REQUEST["eqsum"];
$eqremain = $_REQUEST["eqremain"];
$error = "";


if($error == "")
		{	
$sql = "update product set Product_Stock='$eqremain' where Product_Id='$Product_Id'";
			mysql_query($sql) or die (mysql_error());
		}

$sql1 = "INSERT INTO  `project`.`orderlist` (`Person_Username` ,`Product_Id` ,`order_amount`)VALUES ('$Person_Username','$Product_Id','$proTake')";
			mysql_query($sql1) or die (mysql_error());			

		if ($error == "")
		{
			echo "<script> alert('ท่านทำรายการจองสำเร็จเรียบร้อย ')</script>";
			echo" <meta http-equiv='refresh' content='0; url=product1.php' />";			
		}			
?>	
<div align="center"><img src="image/1loader.gif" width="250" height="250" /></div>
</body>
</html>




