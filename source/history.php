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
	
    header("location:page1.php");
	exit();
}


    include("config.php");


?>

<table width="400"  border="1">
  <tr>
    <td width="100"><center>Order ID</center></td>
    <td width="100"><center>Order Date</center></td>
    <td width="80"><center>View</center></td>

  </tr>
  <?php

	  if(isset($_SESSION["strPerson_Id"]))
	  {
          
		$strSQL = "SELECT * FROM orders WHERE Person_Id = '".$_SESSION["strPerson_Id"]."' ";
		$objQuery = mysqli_query($mysqli,$strSQL);
        $row = mysqli_num_rows($objQuery);
          
          $Per_Page = 50;   // Per Page
          $Page = $_GET["Page"];
          if(!$_GET["Page"])
          {$Page=1;}
          $Prev_Page = $Page-1;
          $Next_Page = $Page+1;
          $Page_Start = (($Per_Page*$Page)-$Per_Page);
          if($row<=$Per_Page)
          {$Num_Pages =1;}
          else if(($row % $Per_Page)==0)
          {$Num_Pages =($row/$Per_Page) ;}
          else
          {$Num_Pages =($row/$Per_Page)+1;
              $Num_Pages = (int)$Num_Pages;}
          
          $strSQL .= " order  by Order_Date DESC LIMIT $Page_Start , $Per_Page";
          $objQuery = mysqli_query($mysqli,$strSQL);
          
		while($objResult = mysqli_fetch_array($objQuery)){
	  ?>
	  <tr>
        <form action="history_detail.php" method="post">
		<td><center><?=$objResult["Order_Id"];?></center></td>
		<td><center><?=$objResult["Order_Date"];?></center></td>
        <td align="center"><input type="hidden" name="txtOrder_Id" id="txtOrder_Id" value="<?php echo $objResult["Order_Id"];?>"><input type="submit" name="btn_view" value="View"></td>
	  </tr>
    </form>
	  <?php
          }
	  }
  
  ?>

        
</table>



<?php
mysqli_close($mysqli);
?>
</body>
</html>

