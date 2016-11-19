<?
 session_start();
if($sess_id == ""){
 //header("Location:../index.php"); exit(); 
 } 
 
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ระบบสั่งจองสินค้าในมหาวิทยาลัยบูรพา วิทยาเขตสระแก้ว</title>
</head>

<body>
<?php
	include "config.php";
	if($_POST[Person_Id]==null){
	$strSQL = "SELECT * FROM person WHERE Person_Username='".$_SESSION[strUsername]."'";
	}else{
	$strSQL = "SELECT * FROM person WHERE Person_Id='".$_POST[Person_Id]."'";
	}
	
	$objQuery = $mysqli->query($strSQL);
	$objResult = $objQuery->fetch_assoc();
	$Person_Id = $objResult[Person_Id];
	
//เตรียมตัวแปร
$Title_Id = $_REQUEST["Title_Id"];
$Person_Fname = $_REQUEST["txtFname"];
$Person_Lname = $_REQUEST["txtLname"];
$Person_Birthday = $_REQUEST["birthday"];
$Person_email = $_REQUEST["txtemail"];
$Person_Phone = $_REQUEST["txtPhone"];
$Person_UniversityCode = $_REQUEST["txtUniversityCode"];
$Person_Position = $_REQUEST["txtPosition"];
$Fac_Id = $_REQUEST["Faculty"];
$Branch_Id = $_REQUEST["Branch"];
	//ตรวจสอลอินพุท
	$error = "";
	//ตรวจสอบชื่อผู้ใช้
/*		if($cus_name == "")
	{
		$error.="**กรุณากรอกชือ-นามสกุล</br>";
	}	
			if($cus_address == "")
	{
		$error.="**กรุณากรอกที่อยู่</br>";
	}
			if($cus_tel == "")
	{
		$error.="**กรุณากรอกเบอร์โทรศัพท์</br>";
	}
			if($cus_email == "")
	{
		$error.="**กรุณากรอกอีเมล์</br>";
	}
*/	
	$sql = "select count(*) from person where Person_Username = '$Person_Username'";
	$result = $mysqli->query($sql);
	$row = $result->fetch_assoc();
	$num_user = $row["count(*)"];

	//ตรวจสอบอีเมล
	if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*"."@[_a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,3})$",$Person_email))
	{
		$error.="**รูปแบบอีเมลผิด</br>";
	}



	$sql = "select count(*) from Person where Person_email = '$Person_email' and Person_Id != '$Person_Id'";
	$result = $mysqli->query($sql);
	$row = $result->fetch_assoc();
	$num_user = $row["count(*)"];
	if ($num_user != 0)
	{
		$error.="**อีเมลซ้ำ</br>";
	}
	
	
		//ประมงลผล
		if($error == "")
		{
			//เแภ้ไขสมาชิก
$sql = "update person set Title_Id='$Title_Id', person_Fname='$Person_Fname',Person_Lname='$Person_Lname',Person_Birthday='$Person_Birthday',
Person_email='$Person_email',Person_Phone='$Person_Phone',Person_UniversityCode='$Person_UniversityCode',
Person_Position='$Person_Position',Fac_Id='$Fac_Id',Branch_Id='$Branch_Id' where Person_Id='$Person_Id'";
//echo $sql;
			$result = $mysqli->query($sql);	
			//mysql_query($sql) or die (mysql_error());		
		}
		//เก็บผลการทำงาน
/*		if ($error == "")
		{
			
			$result = "แก้ไขข้อมูลเสร็จเรียบร้อย<br/><a href='show_cus.php'>ข้อมูลส่วนตัว</a>";
		}
		else 
		{
			$result = $error."<br><br><a href='edit_cus.php' onclick='history.back() return false;'>กลับไป</a>";
		}
*/
		if ($error == "")
		{
			//$result = "แก้ไขข้อมูลเสร็จเรียบร้อย<br/><a href='show_cus.php'>ข้อมูลส่วนตัว</a>";
			echo "<script> alert('แก้ไขข้อมูลส่วนตัวเรียบร้อย')</script>";
			if($_POST[Person_Id]==null){
					//echo" <meta http-equiv='refresh' content='0; url=show_person.php' />";
					if ($_SESSION["Login_Position"] == "admin") {
						//header("location: show_person_admin.php");
						echo" <meta http-equiv='refresh' content='0; url=show_person_admin.php' />";
					} elseif ($_SESSION["Login_Position"] == "staff") {
						//header("location: show_person_staff.php");
						echo" <meta http-equiv='refresh' content='0; url=show_person_staff.php' />";
					} elseif ($_SESSION["Login_Position"] == "student" || $_SESSION["Login_Position"] == "teacher") {
						//header("location: show_person_user.php");
						echo" <meta http-equiv='refresh' content='0; url=show_person_user.php' />";
					} else {
						 
					}
			}else if($_POST[status]=="person"){
					echo" <meta http-equiv='refresh' content='0; url=mrg_user.php' />";
			}else {
					echo" <meta http-equiv='refresh' content='0; url=mrg_staff.php' />";
			}
		}
		else 
		{
//			$result = $error."<br><br><a href='edit_cus.php' onclick='history.back() return false;'>กลับไป</a>";
			$result = $error;
		}
			
?>	

<div align="center"><img src="image/1loader.gif" width="250" height="250" /></div>
			<?
			if ($error != "") {
			?>
<div align="left"><input type="submit" name="submit" value="< กลับไปแก้ไข"onClick="jascript:history.go(-1)"></div>
<div align="left">-------------------</div>
			<?=$result?>
			<?
			}
			?>
			

</body>
</html>




