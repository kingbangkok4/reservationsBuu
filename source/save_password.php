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
<title>ระบบสั่งจองสินค้าในมหาลัยบูรพา วิทยาเขตสระแก้ว</title>
</head>

<body>
<?php
	include "config.php";


	
//เตรียมตัวแปร
$Person_Id = $_POST["Person_Id"];
$Person_Username = $_POST["Person_Username"];
$Person_Password = $_POST["Person_Password"];
$Person_new = $_POST["Person_new"];
$Person_confirm = $_POST["Person_confirm"];
	//ตรวจสอลอินพุท
	$error = "";
	//ตรวจสอบชื่อผู้ใช้
/*	if($Person_Password == "")
	{
		$error.="**กรุุณากรอกรหัสผ่านเดิม</br>";
	}
		if($cus_new == "")
	{
		$error.="**กรุณากรอกรหัสผ่านใหม่</br>";
	}
		if($cus_confirm == "")
	{
		$error.="**กรุณากรอกยืนยันรหัสผ่านใหม่</br>";
	}	
*/
	$sql = "select Person_Password from person where Person_Id = '".$Person_Id."'";
	$result = $mysqli->query($sql);
	$row = $result->fetch_assoc();
	$num_user = $row;	
	$num_user = $row["Person_Password"];	
	
	if ($num_user != $Person_Password)
	{
			echo "<script> alert('รหัสผ่านเดิมไม่ถูกต้อง')</script>";
			
			if($_POST[mg]==null){
				echo" <meta http-equiv='refresh' content='0; url=edit_password.php' />";
			}else{
				echo" <meta http-equiv='refresh' content='0; url=edit_mrg_staff_password.php?Person_Id=$Person_Id' />";
			}
			//echo "<script> alert('รหัสผ่านเดิมไม่ถูกต้อง')</script>";
			//echo" <meta http-equiv='refresh' content='0; url=edit_password.php' />";		
	}
/*	
	//ตรวจสอบรหัสผ่าน
	if($cus_new != $cus_confirm)
	{
		$error.="**รหัสผ่านใหม่ไม่ตรงกัน</br>";
	}
*/	
	//ตรวจสอบอีเมล
	
		//ประมงลผล
		else
		{
			//เแภ้ไขสมาชิก
$sql = "update person set Person_Password='$Person_new' where Person_Id='$Person_Id'";

	$result = $mysqli->query($sql) or die(mysql_error());	

		//เก็บผลการทำงาน

			//$result = "เปลี่ยนรหัสผ่านใหม่เรียบร้อย<br/><a href='show_cus.php'>ข้อมูลส่วนตัว</a>";
			echo "<script> alert('เปลี่ยนรหัสผ่านใหม่เรียบร้อย')</script>";
			
			if($_POST[mg]==null){
					echo" <meta http-equiv='refresh' content='0; url=show_person.php' />";
			}else if($_POST[status]=="person"){
					echo" <meta http-equiv='refresh' content='0; url=mrg_user.php' />";
			}else{
					echo" <meta http-equiv='refresh' content='0; url=mrg_staff.php?' />";
			}	
		}

			
?>	

<div align="center"><img src="image/1loader.gif" width="250" height="250" /></div>

</body>
</html>




