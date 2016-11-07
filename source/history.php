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

		
<table width="100%" border="1" bordercolor="#4DB6AC" align="center" cellpadding="0" cellspacing="0" >
  <tr bgcolor="#80CBC4">
    <td ><center>Order ID</center></td>
    <td ><center>Order Date</center></td>
    <td ><center></center></td>

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
        
		<td><center><?=$objResult["Order_Id"];?></center></td>
		<td><center><?=$objResult["Order_Date"];?></center></td>
        <td align="center">
        <form action="history_detail.php" method="post">
	        <input type="hidden" name="txtOrder_Id" id="txtOrder_Id" value="<?=$objResult["Order_Id"];?>">
	        <input type="submit" name="btn_view" value="ดูรายละเอียด">
        </form>
        </td>
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

</div>
</div>

