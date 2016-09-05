<?
 session_start();
if($_SESSION["strUsername"] ==  null){
 //header("location: index.php");
 exit(); 
 }

	include "include/connect.php";	
//เตรียมตัวแปร
$Product_Id1 = $_REQUEST["Product_Id"];
$proTake1 = $_REQUEST["proTake"];
	
	if($proTake > $Product_Stock )
	{
		echo "<script> alert('**สินค้าไม่เพียงพอต่อยอดที่ท่านจะยืม')</script>";
		echo" <meta http-equiv='refresh' content='0; url=product1.php' />";		
	}
	if($proTake < $Product_Stock )
	{
?>
 
<table width="100%" border="1">
  <tr> 
    <td colspan="2"><div align="center">
	<!-- Header -->
	<?php include("header.php"); ?><br> 
	</td>
</tr>	 

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>  
<td width="800" valign="top">
<form name="form4" id="myyes" action="eqSelectSave.php" method="post" onsubmit="return checkform(this);">
	  
		<table width="750" height="260" bgcolor="#FFFACD" border="0" align="center" cellpadding="0" cellspacing="0" id="details1">	

          <tr>
            <td colspan="2" height = "40" bgcolor="#FA8072"><div align="center"><strong><font size = "5">รายการอุปกรณ์ที่สั่งจอง</font></strong></div></td>
          </tr>
<tr><td>	 
<table width="900" border="0" bordercolor="#FF9999" align="center" cellpadding="0" cellspacing="0" >
        <tr height = "50px">
          <!--<td width="" bgcolor="#FF6666"><div align="center">id</div></td>-->
          <td width="" bgcolor="#FF6666"><div align="center">รหัสอุปกรณ์</div></td>  	  
          <td width="" bgcolor="#FF6666"><div align="center">ชื่อสินค้า</div></td>
          <td width="" bgcolor="#FF6666"><div align="center">ราคาต่อหน่วย</div></td> 
		  <td width="" bgcolor="#FF6666"><div align="center">จำนวนที่ยืม</div></td>
		  <td width="" bgcolor="#FF6666"><div align="center">ราคารวม</div></td>
          <!--<td width="" bgcolor="#FF6666"><div align="center">แก้ไขรหัสผ่าน</div></td>-->         
        </tr>
<?php
	include "include/connect.php";
	$sql = "select * from product where Product_Id ='$Product_Id1'";
		
	$result = mysql_query($sql) or die (mysql_error());
	$row = mysql_fetch_array($result);
	$Product_picture = $row["Product_picture"];
	$Product_Code = $row["Product_Code"];
	$Product_Name = $row["Product_Name"];
	$Product_Price = $row["Product_Price"];
	$Product_Stock = $row["Product_Stock"];
$eqsum = ($proTake1 * $Product_Price);	
$eqremain = ($Product_Stock - $proTake);
?>  
        <tr height = "50px">
          <td width="" bgcolor="#FFFF99" align = "center">
		  <input name="Product_Id" type="hidden" id="Product_Id" value="<?=$Product_Id?>" /><?=$Product_Id?></td>  	  
          <td width="" bgcolor="#FFFF99" align = "center">
		  <input name="Product_Name" type="hidden" id="Product_Name" value="<?=$Product_Name?>" /><?=$Product_Name?></td>
          <td width="" bgcolor="#FFFF99" align = "center">
		  <input name="Product_Price" type="hidden" id="Product_Price" value="<?=$Product_Price?>" /><?=$Product_Price?></td> 
		  <td width="" bgcolor="#FFFF99" align = "center">
		  <input name="proTake" type="hidden" id="proTake" value="<?=$proTake?>" /><?=$proTake?></td>
		  <td width="" bgcolor="#FFFF99" align = "center">
		  <input name="eqsum" type="hidden" id="eqsum" value="<?=$eqsum?>" /><?=$eqsum?></td>  
		  <input name="eqremain" type="hidden" id="eqremain" value="<?=$eqremain?>" /></td>   		  
        </tr>
</table>	
		<tr>
				<th colspan="2" align="center">
				<input type="submit" name="button" id="button" value="ยืนยัน" id = "submit">&nbsp; &nbsp; &nbsp; 
				<input name="" id="" type="button" onClick="Javascript:history.back();" value="ยกเลิก" />
				</th>
		</tr> 		
      </form>



	  </td>
  		<tr>
              <td bgcolor="#FFDAB9" colspan = "8" height = "40"><div align="center"><strong>มหาวิทยาลัยบูรพา  วิทยาเขตสระแก้ว 2016</strong></div></td>
        </tr>
		</tr>
</table>
	<?php } ?>
</body>
</html>