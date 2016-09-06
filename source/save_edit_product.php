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
/* $Product_Id = $_REQUEST["Product_Id"];
$Product_Code = $_REQUEST["Product_Code"];
$Product_Name = $_REQUEST["Product_Name"];
$Product_Price = $_REQUEST["Product_Price"];
$Product_Stock = $_REQUEST["Product_Stock"];
$Product_Picture = $_REQUEST["Product_Picture"]; */
$Product_Id = $_POST["Product_Id"];
$Product_Code = $_POST["Product_Code"];
$Product_Name = $_POST["Product_Name"];
$Product_Price = $_POST["Product_Price"];
$Product_Stock = $_POST["Product_Stock"];
$Product_picture = $_FILES['Product_picture']['name'];

//ตรวจสอลอินพุท
$error = "";
	
//ประมงลผล
if($error == "")
{
//$connection = mysqli_connect("localhost", "root", "1234", "project");
$sql = "update product set Product_Id='$Product_Id', Product_Code='$Product_Code' , Product_Name='$Product_Name' , Product_Price='$Product_Price' , Product_Stock='$Product_Stock' , Product_picture='$Product_picture' where Product_Id='$Product_Id'";
//echo $sql;

//mysql_query($sql) or die (mysql_error());
$result = $mysqli->query($sql);
					
					
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
    if(isset($_FILES['Product_picture'])){
      $errors= array();
      $file_name = $_FILES['Product_picture']['name'];
      $file_size = $_FILES['Product_picture']['size'];
      $file_tmp = $_FILES['Product_picture']['tmp_name'];
      $file_type = $_FILES['Product_picture']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['Product_picture']['name'])));
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"image/".$file_name);
        // echo "Success";
      }else{
         //echo $errors;
      }
   }

    //$result = "แก้ไขข้อมูลเสร็จเรียบร้อย<br/><a href='show_cus.php'>ข้อมูลส่วนตัว</a>";
    echo "<script> alert('แก้ไขข้อมูลเรียบร้อย')</script>";
    echo" <meta http-equiv='refresh' content='0; url=mrg_product.php' />";

}
else 
{
//$result = $error."<br><br><a href='edit_cus.php' onclick='history.back() return false;'>กลับไป</a>";
    $result = $error;
}
			
?>	

<!-- <div align="center"><img src="image/1loader.gif" width="250" height="250" /></div> -->
<?php
if ($error != "") {
?>
<div align="left"><input type="submit" name="submit" value="< กลับไปแก้ไข"onClick="jascript:history.go(-1)"></div>
<div align="left">-------------------</div>
<?=$result?>
<?php
}
?>
			

</body>
</html>




