<?php
session_start();
?>
<html>
<head>
<title>ยืนยันการสั่งซื้อ</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<?php

if(!isset($_SESSION["intLineBuy"]) && !isset($_SESSION["intLineReserv"]))
{
	echo "Cart Empty";
	exit();
}

$serverName = "localhost";
$userName = "root";
$userPassword = "1234";
$dbName = "project";

$objCon = mysqli_connect($serverName,$userName,$userPassword,$dbName);
if (!$objCon) {
    echo $objCon->connect_error;
    exit();
}
mysqli_set_charset($objCon, "utf8");
?>

<table width="400"  border="1">
  <tr>
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
<br>
Sum Total <?php echo number_format($SumTotal,2);?>
<br><br>
<a href="save_checkout.php">Confirm</a>

<?php
mysqli_close($objCon);
?>
</body>
</html>

