<?php
session_start();
include("config.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>ตะกร้าสินค้า</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?php
    
if(!isset($_SESSION["intLineBuy"]) && !isset($_SESSION["intLineReserv"]))
{
	echo "Cart Empty";
//    echo "<br>intLineBuy = ".$_SESSION["intLineBuy"];
//     echo "<br>intLineReserv = ".$_SESSION["intLineReserv"];
	exit();
}



$objCon = mysqli_connect( $dbhost, $dbuser, $dbpass, $dbname );
if (!$objCon) {
    echo $objCon->connect_error;
    exit();
}
mysqli_set_charset($objCon, "utf8");
?>
  <form action="update.php" method="post">
<table width="400"  border="1">
  <tr>
    <td width="101"><center>ProductID</center></td>
    <td width="82"><center>ProductName</center></td>
    <td width=""><center>Picture</center></td>
    <td width="82"><center>Price</center></td>
    <td width="79"><center>Qty</center></td>
    <td width="79"><center>Total</center></td>
    <td width="10"><center>Del</center></td>
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
  <td align="right">Sum Total <?php echo number_format($SumTotal,2);?></td>
  </tr>
  </table>
</form>
<br><a href="product1-test.php">Go to Product</a>
<?php
	if($SumTotal > 0)
	{
?>
	| <a href="checkout.php">CheckOut</a>
<?php
	}
?>
<?php
mysqli_close($objCon);
?>
</body>
</html>

