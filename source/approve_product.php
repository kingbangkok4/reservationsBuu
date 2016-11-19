<?
 include("config.php");
 ?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ระบบสั่งจองสินค้าในมหาลัยบูรพา วิทยาเขตสระแก้ว </title>
</head>
<body>

<div align="center">
  <?	

mysql_connect($dbhost,$dbuser,$dbpass) or die("MySQL connect failed");
mysql_select_db($dbname) or die("MySQL select database failed");
mysql_query("SET NAMES UTF8 ") or die (mysql_error());

	$Detail_Id=$_GET[Detail_Id];
	$sql = "UPDATE orders_detail
			SET Approval_Status='อนุมัติ',
			Status='สินค้าพร้อมแล้ว',
			Type='Approve'
			WHERE Detail_Id=".$Detail_Id;
	$result=mysql_query($sql);
	if($result){
		
echo "<script> alert('ลบข้อมูลเรียบร้อย')</script>";
echo "<meta http-equiv='refresh' content='2;url=mrg_approve.php'/>";
}else{
echo "<script> alert('!!!เกิดข้อผิดพลาด!!!ไม่สามารถลบข้อมูลได้')</script>";
echo "<meta http-equiv='refresh' content='2;url=mrg_approve.php'/>";
}
?>
  <img src="image/loading.png" width="250" height="250" />
</div>
</body>
</html>