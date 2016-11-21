<?

header('Content-type: application/ms-word'); //การผลเป็นไฟล์ word 
header('Content-Disposition: attachment; filename="รายงานประวัติการสั่งซื้อ.doc"');

include("config.php");
mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
mysql_query("SET NAMES UTF8 ") or die (mysql_error());

$orderId = $_GET["Order_Id"];
$sql = "SELECT orders_detail.* , product.* FROM orders_detail, product WHERE orders_detail.Order_Id = '".$orderId."' and orders_detail.Product_Code = product.Product_Code"; //ดึงข้อมูลจาก เทเบิล word 
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
    <th ><center>Order ID</center></td>
    <th ><center>Product Code</center></td>
    <th ><center>Product Name</center></td>
    <th ><center>Qty</center></td>
    <th ><center>Price</center></td>
    <th ><center>Total Price</center></td>
    <th ><center>Type</center></td>
    <!-- <td ><center>Approval Status</td> -->
    <th ><center>Status</center></td>
    <th ><center>Approve</center></td>
    <th ><center>Arrived</center></td>
    <th ><center>Received</center></td>
    <th ><center>Post Script</center></td>
    
  </tr>
<? while($result = mysql_fetch_array($dbquery)) { ?>


<tr>
<td><center><?= $result["Order_Id"];?></center></td> 
<td><center><?= $result["Product_Code"];?></center></td> 
<td><center><?= $result["Product_Name"];?></center></td> 
<td><center><?= $result["Qty"];?></center></td> 
<td><center><?= $result["Product_Price"];?></center></td> 
<td><center><?= $objResult["Product_Price"]*$objResult["Qty"];?></center></td> 
<td><center><?= $result["Type"];?></center></td> 
<td><center><?= $result["Status"];?></center></td> 
<td><center><?= $result["Approve_Status"];?></center></td> 
<td><center><?= $result["Arrived_Status"];?></center></td> 
<td><center><?= $result["Received_Status"];?></center></td> 
<td><center><?= $result["Post_Script"];?></center></td> 


</tr>
<?php  } ?> 
</table>