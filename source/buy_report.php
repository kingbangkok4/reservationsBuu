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
<td colspan="8" height = "40" bgcolor="#4DB6AC"><div align="center"><strong><font size = "5">รายงานการขายสินค้า</font></strong></div></td>			  
        </tr> 

<form action="history_detail.php" method="post">		
<table width="100%" border="1" bordercolor="#4DB6AC" align="center" cellpadding="0" cellspacing="0" >
  <tr bgcolor="#80CBC4">
			<th ><center>Order ID</center></th>
		    <th ><center>Product Code</center></th>
		    <th ><center>Product Name</center></th>
		    <th ><center>Picture</center></th>
		    <th ><center>Qty</center></th>
		    <th ><center>Price</center></th>
		    <th ><center>Total Price</center></th>
		    <th ><center>Type</center></th>
		    <th ><center>Status</center></th>


  </tr>
  <?php


		$strSQL = "SELECT orders_detail.* , product.* FROM orders_detail, product WHERE orders_detail.Product_Code = product.Product_Code and orders_detail.type = 'Buy'";
		$objQuery = mysqli_query($mysqli,$strSQL);
		
		while($objResult = mysqli_fetch_array($objQuery)){
	  ?>
	  <tr>
    
    		<td><center><?=$objResult["Order_Id"];?></center></td>
			<td><center><?=$objResult["Product_Code"];?></center></td>
	        <td><center><?=$objResult["Product_Name"];?></center></td>
	        <td align="center"><img src="image/<?=$row["Product_picture"]?>" width="140" height="100" border="0" /></td>
	        <td><center><?=$objResult["Qty"];?></center></td>
	        <td><center><?=$objResult["Product_Price"];?></center></td>
	        <td><center><?=$objResult["Product_Price"]*$row["Qty"];?></center></td>
	        <td><center><?=$objResult["Type"];?></center></td>
	        <td><center><?=$objResult["Status"];?></center></td>
    
	  </tr>
	  <?php
          }
  
  ?>


</table>

<br />
<input name="" id="" type="button" onClick="javascript:window.location.href='report_buy.php';" value="พิมพ์รายงาน" />
</form>		  
	  

      </table>
	  </td>

  </tr>
</table>
<br />

</div>
</div>

