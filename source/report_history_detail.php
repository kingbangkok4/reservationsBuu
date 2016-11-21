<?

header('Content-type: application/ms-word'); //การผลเป็นไฟล์ word 
header('Content-Disposition: attachment; filename="report.doc"');

include("config.php");
mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
mysql_query("SET NAMES UTF8 ") or die (mysql_error());

$orderId = $_GET["Order_Id"];
$sql = "SELECT orders_detail.* , product.* FROM orders_detail, product WHERE orders_detail.Order_Id = '".$orderId."' and orders_detail.Product_Code = product.Product_Code"; //ดึงข้อมูลจาก เทเบิล word 
$result = mysql_db_query($dbname, $sql);
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
    <th >Order ID</td>
    <th >Product Code</td>
    <th >Product Name</td>
    <th >Picture</td>
    <th >Qty</td>
    <th >Price</td>
    <th >Total Price</td>
    <th >Type</td>
    <!-- <td ><center>Approval Status</td> -->
    <th >Status</td>
    <th >Approve</td>
    <th >Arrived</td>
    <th >Received</td>
    <th >Post Script</td>
    
  </tr>
<? while($result = mysql_fetch_array($result)) { ?>


<tr>
<td><?= $result[Product_Id];?></td> 
<td><?= $result[Product_Code];?></td> 
<td><?= $result[Product_Name];?></td> 
<td><?= $result[Product_Price];?></td> 
<td><?= $result[Product_Stock];?></td> 


</tr>
<?php  } ?> 
</table>