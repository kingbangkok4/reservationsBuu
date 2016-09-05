<?
 session_start();
if($_SESSION["strUsername"] ==  null){
 //header("location: index.php");
 exit(); 
 }
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
<script language="JavaScript1" type="text/javascript">
function checkform()
{
if(document.form4.Product_Stock.value == "0"){
		alert('ขออภัยสินค้าหมด');
		document.form4.Product_Stock.focus();		
		return false;
	}		
if (document.form4.proTake.value == 0) {
    alert( "กรุณากรอกจำนวนที่จะยืม" );
    document.form4.proTake.focus();
    return false ;
  }
  
if (document.form4.NO.value == 1) {
    alert( "สินค้าไม่เพียงพอต่อจำนวนที่ท่านต้องการเบิก" );
    document.form4.NO.focus();
    return false ;
	}
	document.form4.checkform();
}
</script>

<td width="800" valign="top">
<form name="form4" id="myyes" action="eqRegist.php" method="post" onsubmit="return checkform(this);">
	  
		<table width="750" height="260" bgcolor="#FFFACD" border="0" align="center" cellpadding="0" cellspacing="0" id="details1">	

          <tr>
            <td colspan="2" height = "40" bgcolor="#FA8072"><div align="center"><strong><font size = "5">รายการอุปกรณ์</font></strong></div></td>
          </tr>
<tr><td>	 
<table width="900" border="0" bordercolor="#FF9999" align="center" cellpadding="0" cellspacing="0" >

	<?php
	include "include/connect.php";
	$sql = "select * from product where Product_Id ='$Product_Id'";
		
	$result = mysql_query($sql) or die (mysql_error());
	$row = mysql_fetch_array($result);
	$Product_picture = $row["Product_picture"];
	$Product_Code = $row["Product_Code"];
	$Product_Name = $row["Product_Name"];
	$Product_Price = $row["Product_Price"];
	$Product_Stock = $row["Product_Stock"];
	?>
		<tr>
            <td colspan = "2" align = "center">
              <img src="image/<?=$Product_picture?>" width="350" height="250" border="0" />	  
			</td>
        </tr>	
		<tr height = "40px">
            <td width = "50%"><div align="right">รหัสสินค้า :&nbsp;</div></td>
            <td width="70%">		
              <?=$Product_Code?>	  
			</td>
        </tr>
		<tr>
            <td><div align="right">ชื่อสินค้า :&nbsp;</div></td>
            <td width="70%">
              <?=$Product_Name?>	  
			</td>
        </tr>		
		<tr>
            <td><div align="right">ราคาสินค้า :&nbsp;</div></td>
            <td width="70%">
              <?=$Product_Price?>	  
			</td>
        </tr>
		<tr>
            <td><div align="right">ยอดคงเหลือ :&nbsp;</div></td>
            <td width="70%">
            <?=$Product_Stock?>
			<input name="Product_Stock" type="hidden" id="Product_Stock" value="<?=$Product_Stock?>" />		
			</td>
        </tr>		

		<tr  height = "40px">
            <td><div align="right">ป้อนจำนวนที่จะเช่า :&nbsp;</div></td>
            <td width="70%">
			 		  <script language="javascript">
function CheckNum(){
		if (event.keyCode < 48 || event.keyCode > 57){
		      event.returnValue = false;
	    	}
	}
</script>
  <input type="text" name="proTake" size="5" onKeyPress="CheckNum()" style="text-align:right" MaxLength = 1>
  <input name="Product_Id" type="hidden" id="Product_Id" value="<?=$Product_Id?>" />	  
			</td>		
        </tr>	
        </table>	
<tr>
				<th colspan="2" align="center">
				<input type="submit" name="button" id="button" value="สั่งจอง" id = "submit">&nbsp; &nbsp; &nbsp; 
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
</body>
</html>