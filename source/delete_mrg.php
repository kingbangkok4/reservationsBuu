<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ระบบสั่งจองสินค้าในมหาลัยบูรพา วิทยาเขตสระแก้ว </title>
</head>
<body>

<div align="center">
  <?	
  
$dbhost="localhost"; 
$dbuser="root";  
$dbpass="1234";
$dbname="project";
mysql_connect($dbhost,$dbuser,$dbpass) or die("MySQL connect failed");
mysql_select_db($dbname) or die("MySQL select database failed");
mysql_query("SET NAMES UTF8 ") or die (mysql_error());

	$sql = "delete from Person  where Person_Id='$Person_Id'";
	$result=mysql_query($sql);
	if($result){
		
echo "<script> alert('ลบข้อมูลเจ้าหน้าที่เรียบร้อย')</script>";
echo "<meta http-equiv='refresh' content='2;url=mrg_staff.php'/>";
}else{
echo "<script> alert('!!!เกิดข้อผิดพลาด!!!ไม่สามารถลบข้อมูลได้')</script>";
echo "<meta http-equiv='refresh' content='2;url=mrg_staff.php'/>";
}
?>
  <img src="image/1loader.gif" width="250" height="250" />
</div>
</body>
</html>