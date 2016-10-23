<?
 session_start();
if($_SESSION["strUsername"] ==  null){
 //header("location: index.php");
 exit(); 
 }
 include("config.php");
 
mysql_connect($dbhost,$dbuser,$dbpass) or die("MySQL connect failed");
mysql_select_db($dbname) or die("MySQL select database failed");
mysql_query("SET NAMES UTF8 ") or die (mysql_error());
	
	
	$strSQL = "SELECT * FROM orderlist WHERE Person_Username='".$_SESSION[strUsername]."' and Product_Id='".$_GET[Product_Id]."'";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	if($objResult[order_id]==null){
		$strSQLINSERTorder = "INSERT INTO  `project`.`orderlist` (`order_id` ,`Product_Id` ,`Person_Username`,`order_amount`)
		VALUES (NULL ,  '$_GET[Product_Id]',  '$_SESSION[strUsername]',  '');";
		mysql_query($strSQLINSERTorder);
	}
	
	$strSQL2 = "SELECT * FROM orderlist WHERE Person_Username='".$_SESSION[strUsername]."'";
	$result = mysql_query($strSQL2);
	
	
 ?>
 
<table width="100%" border="1">
  <tr>
  
    <td colspan="2"><div align="center">

	<!-- Header -->
	<?php include("header.php"); ?><br> 
	
<TABLE>  

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>      	
<script >
function chkForm(){
    
    if(document.frm.txtFname.value == ""){
        alert('กรุณากรอกชื่อจริง');
	
        frm.txtFname.focus();
        return false;
    }else if(document.frm.txtLname.value == ''){
        alert('กรุณากรอกนามสกุล');
        document.frm.txtLname.focus();
        return false;
        
    }else if(document.frm.txtemail.value == ''){
        alert('กรุณากรอกอีเมล');
        document.frm.txtemail.focus();
        return false;
        
    }else if(document.frm.txtPhone.value == ''){
        alert('กรุณากรอกเบอร์โทรศัพท์');
        document.frm.txtPhone.focus();
        return false;
        
    }else if(document.frm.txtUniversityCode.value == ''){
        alert('กรุณากรอกรหัสประจำตัว');
        document.frm.txtUniversityCode.focus();
        return false;
        
    }else if(document.frm.txtPosition.value == ''){
        alert('กรุณาเลือกสถานะ');
        document.frm.txtPosition.focus();
        return false;
    }else if(document.frm.Month.value == ''){
        alert('กรุณาเลือกเดือน');
        document.frm.Month.focus();
        return false;
    }else if(document.frm.Day.value == ''){
        alert('กรุณาเลือกวันที่');
        document.frm.Day.focus();
        return false;
    }
}

</script>
<td width="800" valign="top">

<form name="form4" id="myyes" action="order_detail.php" method="post" onsubmit="return checkform(this);">
	  
		<table width="750" height="260" bgcolor="#FFFACD" border="0" align="center" cellpadding="0" cellspacing="0" id="details1">	

          <tr>
            <td colspan="2" height = "40" bgcolor="#FA8072"><div align="center"><strong><font size = "5">รายการสินค้าที่สั่งจอง</font></strong></div></td>
          </tr>
<tr><td>	 
<table width="900" border="1" bordercolor="#FF9999" align="center" cellpadding="0" cellspacing="0" >
        <tr>
          <!--<td width="" bgcolor="#FF6666"><div align="center">id</div></td>-->
          <td width="" bgcolor="#FF6666"><div align="center">รหัสสินค้า</div></td>  	  
          <td width="" bgcolor="#FF6666"><div align="center">ชื่อสินค้า</div></td>
          <td width="" bgcolor="#FF6666"><div align="center">ราคา</div></td> 
		  <td width="" bgcolor="#FF6666"><div align="center">จำนวนสินค้าคงเหลือ</div></td>
		  <td width="" bgcolor="#FF6666"><div align="center">เลือกจำนวน</div></td>	
          <td width="" bgcolor="#FF6666"><div align="center">ลบ</div></td>	
          
          
        </tr>
	<?php

	$i=0;
	while ($roworder = mysql_fetch_array($result)) 
	{
		$i++;
		$strSQLproduct = "SELECT * FROM product WHERE Product_Id='".$roworder[Product_Id]."'";
		$objQueryproduct = mysql_query($strSQLproduct);
		$row = mysql_fetch_array($objQueryproduct);
		
		?>	
			  
			   <tr>
						 
			  <td align="center"><input type='hidden' name ='Product_Id<?=$i?>' value="<?=$row["Product_Id"]?>"><?=$row["Product_Code"]?></td>
			  <td align="center"><?=$row["Product_Name"]?></td>
			  <td align="center"><?=$row["Product_Price"]?></td>
			  <td align="center"><?=$row["Product_Stock"]?></td> 
			  
			  <td align="center"><input type='text' name ='order_amount<?=$i?>' value="1"></td> 



			 
			  <!--<td align="center"><a href="page_order.php?Product_Id=<?=$row["Product_Id"]?>"><img src="image/shopping" width="24" height="24" border="0" /></a></td>-->
			  <td align="center"><a href="page_order.php?Product_Id=<?=$row["Product_Id"]?>"><img src="image/can.png" width="24" height="24" border="0" /></a></td>
		<?php
	}
	?>
		</tr>
        </table>	
<tr>
				<th colspan="2" align="center">
				<input type='hidden' name ='num' value="<?=$i?>">
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
</body>
</html>