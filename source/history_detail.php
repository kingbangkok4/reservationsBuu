<?php
session_start ();
include ("layout.php");
include ("config.php");
?>
<div id="kk-content">
	<div class="w3-container">

<br />
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 

    <td width="100%" valign="top">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#4DB6AC" id="details1">		
		<tr height="50">
<td colspan="8" height = "40" bgcolor="#4DB6AC"><div align="center"><strong><font size = "5">ประวัติการสั่งซื้อ</font></strong></div></td>			  
        </tr> 

<form action="history_detail.php" method="post">		
<table width="100%" border="1" bordercolor="#4DB6AC" align="center" cellpadding="0" cellspacing="0" >
  <tr bgcolor="#80CBC4">
    <td ><center>Order ID</center></td>
    <td ><center>Product Code</center></td>
    <td ><center>Product Name</center></td>
    <td ><center>Picture</center></td>
    <td ><center>Qty</center></td>
    <td ><center>Price</center></td>
    <td ><center>Total Price</center></td>
    <td ><center>Type</center></td>
    <!-- <td ><center>Approval Status</center></td> -->
    <td ><center>Status</center></td>
    <td ><center>Approve</center></td>
    <td ><center>Arrived</center></td>
    <td ><center>Received</center></td>
    <td ><center>Post Script</center></td>


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
        <!-- <td><center><?=$objResult["Approval_Status"];?></center></td> -->
        <td><center><?=$objResult["Status"];?></center></td>
        <td><center>
        <?php
        if (isset($objResult["Approve_Status"]) && $objResult["Approve_Status"]=="T"){
        ?>
        <img src="image/red-sign-green-icon-right-mark-symbol-minus.png" width="50" height="50" border="0" />
        <?php 
		}
        ?>
        </center></td>
        <td><center>
        <?php
        if (isset($objResult["Arrived_Status"]) && $objResult["Arrived_Status"]=="T"){
        ?>
        <img src="image/red-sign-green-icon-right-mark-symbol-minus.png" width="50" height="50" border="0" />
        <?php 
		}
        ?>
        </center></td>
        <td><center>
        <?php
        if (isset($objResult["Received_Status"]) && $objResult["Received_Status"]=="T"){
        ?>
        <img src="image/red-sign-green-icon-right-mark-symbol-minus.png" width="50" height="50" border="0" />
        <?php 
		}
        ?>
        </center></td>
        <td><center><?=$objResult["Post_Script"];?></center></td>


	  </tr>
	  <?php
          }
	  }
  
  ?>


</table>

<br />
<input name="" id="" type="button" onClick="javascript:window.location.href='print.php?Order_Id=<?=$_POST["txtOrder_Id"]?>';" value="พิมพ์รายงาน" />
</form>		  
	  

      </table>
	  </td>

  </tr>
</table>
<br />

</div>
</div>

