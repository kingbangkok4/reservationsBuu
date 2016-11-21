<?

header('Content-type: application/ms-word'); //การผลเป็นไฟล์ word 
header('Content-Disposition: attachment; filename="รายงานการขายสินค้าประจำวัน.doc"');

include("config.php");
mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
mysql_query("SET NAMES UTF8 ") or die (mysql_error());
$sql = "SELECT orders_detail.* , product.* FROM orders, orders_detail, product WHERE orders.Order_Id = orders_detail.Order_Id and orders_detail.Product_Code = product.Product_Code and orders_detail.type = 'Buy' and DATE( Order_Date )=DATE(CURRENT_TIMESTAMP)"; //ดึงข้อมูลจาก เทเบิล word 
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
    <th ><center>Order ID</center></th>
		    <th ><center>Product Code</center></th>
		    <th ><center>Product Name</center></th>
		    <th ><center>Qty</center></th>
		    <th ><center>Price</center></th>
		    <th ><center>Total Price</center></th>
		    <th ><center>Type</center></th>
		    <th ><center>Status</center></th>
    
  </tr>
<? while($result = mysql_fetch_array($dbquery)) { ?>


<tr>
			<td><center><?=$result["Order_Id"];?></center></td>
			<td><center><?=$result["Product_Code"];?></center></td>
	        <td><center><?=$result["Product_Name"];?></center></td>
	        <td><center><?=$result["Qty"];?></center></td>
	        <td><center><?=$result["Product_Price"];?></center></td>
	        <td><center><?=$result["Product_Price"]*$row["Qty"];?></center></td>
	        <td><center><?=$result["Type"];?></center></td>
	        <td><center><?=$result["Status"];?></center></td>

</tr>
<?php  } ?> 
</table>