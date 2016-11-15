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
	echo "<h1>ไม่พบสินค้าในตะกร้า</h1>";
	//exit();
}else{
?>

<br />
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 

    <td width="100%" valign="top">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#4DB6AC" id="details1">		
		<tr height="50">
<td colspan="8" height = "40" bgcolor="#4DB6AC"><div align="center"><strong><font size = "5">ตะกร้าสินค้า</font></strong></div></td>			  
        </tr> 
        


<?php
$objCon = mysqli_connect( $dbhost, $dbuser, $dbpass, $dbname );
if (!$objCon) {
    echo $objCon->connect_error;
    exit();
}
mysqli_set_charset($objCon, "utf8");
?>
  <form action="update.php" method="post">
<table width="100%" border="1" bordercolor="#4DB6AC" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td width="" bgcolor="#80CBC4"><center>ProductID</center></td>
    <td width="" bgcolor="#80CBC4"><center>ProductName</center></td>
    <td width="" bgcolor="#80CBC4"><center>Picture</center></td>
    <td width="" bgcolor="#80CBC4"><center>Price</center></td>
    <td width="" bgcolor="#80CBC4"><center>Qty</center></td>
    <td width="" bgcolor="#80CBC4"><center>Total</center></td>
    <td width="" bgcolor="#80CBC4"><center>Del</center></td>
  </tr>
  <?php
  $Total = 0;
  $TotalReserv = 0;
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
		<td><center>
			<select name="txtQty<?php echo $i;?>">
				<?php 
			
				for($qty=1;$qty<=$objResult["Product_Stock"];$qty++)
			  {
					$sel = "";
					if($_SESSION["strQty"][$i] == $qty)
				  {
						$sel = "selected";
				  }
			  ?>
				<option value="<?php echo $qty;?>" <?php echo $sel;?>><?php echo $qty;?></option>
				<?php
			  }
			  ?>
			</select></center>
		</td>
		<td><center><?=number_format($Total,2);?></center></td>
		<td><center><a href="delete.php?Type=Buy&Line=<?=$i;?>">x</a></center></td>
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
                      $TotalReserv = $_SESSION["strQtyReserv"][$i] * $objResult["Product_Price"];
                      $SumTotal = $SumTotal + $TotalReserv;
                      ?>
<tr>
<td><center><?=$_SESSION["strProductIDReserv"][$i];?></center></td>
<td><center><?=$objResult["Product_Name"];?></center></td>
<td align="center"><img src="image/<?=$objResult["Product_picture"]?>" width="140" height="100" border="0" /></td>
<td><center><?=$objResult["Product_Price"];?></center></td>
<td><center>
<select name="txtQtyReserv<?php echo $i;?>">
<?php
    
				for($qty=1;$qty<=10;$qty++)
    {
        $sel = "";
        if($_SESSION["strQtyReserv"][$i] == $qty)
        {
            $sel = "selected";
        }
        ?>
<option value="<?php echo $qty;?>" <?php echo $sel;?>><?php echo $qty;?></option>
<?php
    }
    ?>
</select></center>
</td>
<td><center><?=number_format($TotalReserv,2);?></center></td>
<td><center><a href="delete.php?Type=Reserv&Line=<?=$i;?>">x</a></center></td>
</tr>
<?php
    }
}
  ?>
</table>
<br>
<table width="400"  border="0">
  <tr>
  <td><input type="submit" value="Update"></td>
  <td align="right">ราคาสินค้าทั้งหมด <?php echo number_format($SumTotal,2);?> บาท</td>
  </tr>
  </table>


</table>
</form>		  


	  
      </table>
	  </td>

  </tr>
</table>
<br />
<?php 
	mysqli_close($objCon);
}
?>

<input name="" id="" type="button" onClick="javascript:window.location.href='product.php';" value="ไปหน้าสินค้า" />  <?php
	if($SumTotal > 0)
	{
?><input name="" id="" type="button" onClick="javascript:window.location.href='checkout.php';" value="ไปหน้ายืนยันสินค้า" /><?php
	}
	
?>
<br /><br />

</div>
</div>