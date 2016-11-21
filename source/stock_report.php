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
<td colspan="8" height = "40" bgcolor="#4DB6AC"><div align="center"><strong><font size = "5">รายงานสินค้าคงเหลือ</font></strong></div></td>			  
        </tr> 

<form action="history_detail.php" method="post">		
<table width="100%" border="1" bordercolor="#4DB6AC" align="center" cellpadding="0" cellspacing="0" >
  <tr bgcolor="#80CBC4">
    <th><center>รหัส</center></th>
    <th><center>รหัสสินค้า</center></th>
    <th><center>ชื่อสินค้า</center></th>
    <th><center>ราคา</center></th>
    <th><center>คงเหลือ</center></th>


  </tr>
  <?php


		$strSQL = "select * from product";
		$objQuery = mysqli_query($mysqli,$strSQL);
		
		while($objResult = mysqli_fetch_array($objQuery)){
	  ?>
	  <tr>
	    <td><center><?= $objResult["Product_Id"];?></center></td> 
		<td><center><?= $objResult["Product_Code"];?></center></td> 
		<td><center><?= $objResult["Product_Name"];?></center></td> 
		<td><center><?= $objResult["Product_Price"];?></center></td> 
		<td><center><?= $objResult["Product_Stock"];?></center></td> 
    
    
	  </tr>
	  <?php
          }
  
  ?>


</table>

<br />
<input name="" id="" type="button" onClick="javascript:window.location.href='report_stock.php';" value="พิมพ์รายงาน" />
</form>		  
	  

      </table>
	  </td>

  </tr>
</table>
<br />

</div>
</div>

