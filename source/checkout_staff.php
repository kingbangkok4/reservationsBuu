<?php
session_start ();
include ("layout.php");
include ("config.php");
?>
<div id="kk-content">
	<div class="w3-container">


<?php

if(!isset($_SESSION["intLineBuy"]) && !isset($_SESSION["intLineReserv"]))
{
	?>
	<h1>ไม่พบสินค้าในตะกร้า</h1>
	<input name="" id="" type="button" onClick="javascript:window.location.href='product.php';" value="ไปหน้าสินค้า" />
	<?php
	
	//exit();
}else{
$objCon = mysqli_connect( $dbhost, $dbuser, $dbpass, $dbname );
if (!$objCon) {
    echo $objCon->connect_error;
    exit();
}
mysqli_set_charset($objCon, "utf8");
?>
<br />
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 

    <td width="100%" valign="top">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#64B5F6" id="details1">		
		<tr height="50">
<td colspan="8" height = "40" bgcolor="#64B5F6"><div align="center"><strong><font size = "5">ตะกร้าสินค้า</font></strong></div></td>			  
        </tr> 
        
<table width="100%" border="1" bordercolor="#64B5F6" align="center" cellpadding="0" cellspacing="0" >
  <tr bgcolor="#90CAF9">
    <td width="101"><center>ProductID</center></td>
    <td width="82"><center>ProductName</center></td>
    <td width=""><center>Picture</center></td>
    <td width="82"><center>Price</center></td>
    <td width="79"><center>Qty</center></td>
    <td width="79"><center>Total</center></td>
  </tr>
  <?php
  $Total = 0;
  $SumTotal = 0;

  for($i=0;$i<=(int)$_SESSION["intLineBuy"];$i++)
  {
	  if($_SESSION["strProductIDBuy"][$i] != "")
	  {
		$strSQL = "SELECT * FROM product WHERE Product_Code = '".$_SESSION["strProductIDBuy"][$i]."' ";
		$objQuery = mysqli_query($objCon,$strSQL);
		$objResult = $objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
		$Total = $_SESSION["strQty"][$i] * $objResult["Product_Price"];
		$SumTotal = $SumTotal + $Total;
	  ?>
	  <tr>
		<td><center><?=$_SESSION["strProductIDBuy"][$i];?></center></td>
		<td><center><?=$objResult["Product_Name"];?></center></td>
        <td align="center"><img src="image/<?=$objResult["Product_picture"]?>" width="140" height="100" border="0" /></td>
		<td><center><?=$objResult["Product_Price"];?></center></td>
		<td><center><?=$_SESSION["strQty"][$i];?></center></td>
		<td><center><?=number_format($Total,2);?></center></td>
	  </tr>
	  <?php
	  }
  }
          
  for($i=0;$i<=(int)$_SESSION["intLineReserv"];$i++)
  {
      if($_SESSION["strProductIDReserv"][$i] != "")
      {
        $strSQL = "SELECT * FROM product WHERE Product_Code = '".$_SESSION["strProductIDReserv"][$i]."' ";
        $objQuery = mysqli_query($objCon,$strSQL);
        $objResult = $objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
        $Total = $_SESSION["strQtyReserv"][$i] * $objResult["Product_Price"];
        $SumTotal = $SumTotal + $Total;
      ?>
      <tr>
        <td><center><?=$_SESSION["strProductIDReserv"][$i];?></center></td>
        <td><center><?=$objResult["Product_Name"];?></center></td>
        <td align="center"><img src="image/<?=$objResult["Product_picture"]?>" width="140" height="100" border="0" /></td>
        <td><center><?=$objResult["Product_Price"];?></center></td>
        <td><center><?=$_SESSION["strQtyReserv"][$i];?></center></td>
        <td><center><?=number_format($Total,2);?></center></td>
       </tr>
       <?php
       }
  }
  ?>
</table>





 
      </table>
	  </td>

  </tr>
</table>
<br />

ราคาสินค้าทั้งหมด <?php echo number_format($SumTotal,2);?> บาท
<br><br>
<input name="" id="" type="button" onClick="javascript:window.location.href='save_checkout.php';" value="ยืนยันสั่งซื้อสินค้า" />

<?php
mysqli_close($objCon);
}
?>
<br /><br />

</div>
</div>