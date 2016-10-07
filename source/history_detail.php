<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>ตะกร้าสินค้า</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?php
    
if(!isset($_SESSION["strPerson_Id"]))
{
	
    header("location:login.php");
	exit();
}


    include("config.php");


?>

<table width="400"  border="1">
  <tr>
    <td width="100"><center>Order ID</center></td>
    <td width="100"><center>Product Code</center></td>
    <td width="100"><center>Product Name</center></td>
    <td width=""><center>Picture</center></td>
    <td width="80"><center>Qty</center></td>
    <td width="80"><center>Price</center></td>
    <td width="80"><center>Total Price</center></td>
    <td width="80"><center>Type</center></td>
    <td width="100"><center>Approval Status</center></td>
    <td width="100"><center>Status</center></td>
    <td width="150"><center>Post Script</center></td>


  </tr>
  <?php

	  if(isset($_POST["txtOrder_Id"]))
	  {
          
		$strSQL = "SELECT orders_detail.* , product.* FROM orders_detail, product WHERE orders_detail.Order_Id = '".$_POST["txtOrder_Id"]."' and orders_detail.Product_Code = product.Product_Code";
		$objQuery = mysqli_query($mysqli,$strSQL);
		while($objResult = mysqli_fetch_array($objQuery)){
	  ?>
	  <tr>
		<td><center><?=$objResult["Order_Id"];?></center></td>
		<td><center><?=$objResult["Product_Code"];?></center></td>
        <td><center><?=$objResult["Product_Name"];?></center></td>
        <td align="center"><img src="image/<?=$objResult["Product_picture"]?>" width="140" height="100" border="0" /></td>
        <td><center><?=$objResult["Qty"];?></center></td>
        <td><center><?=$objResult["Product_Price"];?></center></td>
        <td><center><?=$objResult["Product_Price"]*$objResult["Qty"];?></center></td>
        <td><center><?=$objResult["Type"];?></center></td>
        <td><center><?=$objResult["Approval_Status"];?></center></td>
        <td><center><?=$objResult["Status"];?></center></td>
        <td><center><?=$objResult["Post_Script"];?></center></td>


	  </tr>
	  <?php
          }
	  }
  
  ?>

        
</table>
<br><br><a href="print.php?Order_Id=<?$_POST["txtOrder_Id"]?>">Print</a>
<?php
mysqli_close($mysqli);
?>
</body>
</html>

