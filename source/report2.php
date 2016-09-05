<?
header('Content-type: application/ms-word'); //การผลเป็นไฟล์ word 
header('Content-Disposition: attachment; filename="report.doc"');

$host = "localhost"; //ชื่อโอส 
$db_username = "root"; //ชื่อผู้ใช้
$db_password = "1234"; //รหัสผ่าน 
$dbname = "Project"; //ชื่อฐานข้อมูล
mysql_connect($host, $db_username, $db_password) or die(mysql_error());
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
<p>ffffffffff</p>
<table>
<tr>
    <th>รหัส</th>
    <th>รหัสสินค้า</th>
    <th>ชื่อสินค้า</th>
    <th>ราคา</th>
    <th>คงเหลือ</th>
  </tr>
<? while($result = mysql_fetch_array($dbquery)) { ?>


<tr>
<td><?= $result[Product_Id];?></td> 
<td><?= $result[Product_Code];?></td> 
<td><?= $result[Product_Name];?></td> 
<td><?= $result[Product_Price];?></td> 
<td><?= $result[Product_Stock];?></td> 

</tr>
<?php  } ?> 
</table>