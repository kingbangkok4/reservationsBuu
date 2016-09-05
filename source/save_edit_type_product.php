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
$TypeP_Id = $_REQUEST["TypeP_Id"];
$TypeP_Nametype = $_REQUEST["TypeP_Nametype"];

	//ตรวจสอลอินพุท
	$error = "";
	


		//ประมงลผล
		if($error == "")
		{
			//เแภ้ไขสมาชิก
$sql = "update type_product set TypeP_Id='$TypeP_Id', TypeP_Nametype='$TypeP_Nametype'where TypeP_Id='$TypeP_Id'";
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
			echo "<script> alert('แก้ไขข้อมูลเรียบร้อย')</script>";
			echo" <meta http-equiv='refresh' content='0; url=mrg_type_product.php' />";
			
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




