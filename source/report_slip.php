<?

header('Content-type: application/ms-word'); //การผลเป็นไฟล์ word 
header('Content-Disposition: attachment; filename="report.doc"');

include("config.php");
mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
mysql_query("SET NAMES UTF8 ") or die (mysql_error());
$sql = "select * from product"; //ดึงข้อมูลจาก เทเบิล word 
$dbquery = mysql_db_query($dbname, $sql);
?>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
}
</style>
<p ><h1> รายงานสินค้าคงเหลือ</h1></p>

<table>
<tr>
    <th><center>รหัส</center></th>
    <th><center>รหัสสินค้า</center></th>
    <th><center>ชื่อสินค้า</center></th>
    <th><center>ราคา</center></th>
    <th><center>คงเหลือ</center></th>
    
  </tr>
<? while($result = mysql_fetch_array($dbquery)) { ?>


<tr>
<td><center><?= $result[Product_Id];?></center></td> 
<td><center><?= $result[Product_Code];?></center></td> 
<td><center><?= $result[Product_Name];?></center></td> 
<td><center><?= $result[Product_Price];?></center></td> 
<td><center><?= $result[Product_Stock];?></center></td> 


</tr>
<?php  } ?> 
</table>