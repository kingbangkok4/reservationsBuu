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
	
	$strSQLINSERTorder = "INSERT INTO  `project`.`order_detail` (`orderDe_Id` ,`Person_Username` ,`orderDe_Date`)
	VALUES (NULL ,  '$_SESSION[strUsername]',  '');";
	if(mysql_query($strSQLINSERTorder)==TRUE){
		
		$strSQL_order_detail = "SELECT * FROM order_detail WHERE Person_Username='".$_SESSION[strUsername]."' ORDER BY  orderDe_Id DESC LIMIT 0 , 1";
		$objQuery_order_detail = mysql_query($strSQL_order_detail);
		$objResult_order_detail = mysql_fetch_array($objQuery_order_detail);
		$orderDe_Id=$objResult_order_detail['orderDe_Id'];
		for($i=1;$i<=$_POST[num];$i++){
			echo $strSQLINSERTorder = "INSERT INTO  `project`.`list_of_order` (`List_Id` ,`Product_Id` ,`List_Amount` ,`orderDe_Id`)
			VALUES (NULL ,  '".$_POST[Product_Id.$i]."',  '".$_POST[order_amount.$i]."' ,'$orderDe_Id');";
			if(mysql_query($strSQLINSERTorder)==TRUE){
				$strSQLDELETE_orderl = "DELETE FROM `orderlist` WHERE Product_Id = '".$_POST[Product_Id.$i]."' and Person_Username = '".$_SESSION[strUsername]."'";
				mysql_query($strSQLDELETE_orderl);
			}
		}
	}
		
		$strSQL_Loo = "SELECT * FROM list_of_order WHERE orderDe_Id='".$orderDe_Id."'";
		$objQuery_Loo = mysql_query($strSQL_Loo);
	
	
	//$strSQL = "SELECT * FROM orderlist WHERE Person_Username='".$_SESSION[strUsername]."' and Product_Id='".$_GET[Product_Id]."'";
	//$objQuery = mysql_query($strSQL);
	//$objResult = mysql_fetch_array($objQuery);
	//if($objResult[order_id]==null){
	//	$strSQLINSERTorder = "INSERT INTO  `project`.`orderlist` (`order_id` ,`Product_Id` ,`Person_Username`,`order_amount`)
	//	VALUES (NULL ,  '$_GET[Product_Id]',  '$_SESSION[strUsername]',  '');";
	//	mysql_query($strSQLINSERTorder);
	//}
	
	//$strSQL2 = "SELECT * FROM orderlist WHERE Person_Username='".$_SESSION[strUsername]."'";
	//$result = mysql_query($strSQL2);
	
	
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

<form name="form4" id="myyes" action="save_edit_type_product.php" method="post" onsubmit="return checkform(this);">
	  
		<table width="750" height="260" bgcolor="#FFFACD" border="0" align="center" cellpadding="0" cellspacing="0" id="details1">	

          <tr>
            <td colspan="2" height = "40" bgcolor="#FA8072"><div align="center"><strong><font size = "5">ใบรายการสินค้า</font></strong></div></td>
          </tr>
<tr><td>	 
 <form method="post" action="" >
<table width="900" border="1" bordercolor="#FF9999" align="center" cellpadding="0" cellspacing="0" >
        <tr>
          <!--<td width="" bgcolor="#FF6666"><div align="center">id</div></td>-->
          <td width="" bgcolor="#FF6666"><div align="center">รหัสสินค้า</div></td>  	  
          <td width="" bgcolor="#FF6666"><div align="center">ชื่อสินค้า</div></td>
          <td width="" bgcolor="#FF6666"><div align="center">ราคา</div></td> 
		  <!--<td width="" bgcolor="#FF6666"><div align="center">จำนวนสินค้าคงเหลือ</div></td>-->
		  <td width="" bgcolor="#FF6666"><div align="center">จำนวน</div></td>
		  <td width="" bgcolor="#FF6666"><div align="center">ราคารวม</div></td>
          <!--<td width="" bgcolor="#FF6666"><div align="center">ลบ</div></td>-->	
          
          
        </tr>
	<?php
	


	while ($roworder = mysql_fetch_array($objQuery_Loo)) 
	{
		$strSQLproduct = "SELECT * FROM product WHERE Product_Id='".$roworder[Product_Id]."'";
		$objQueryproduct = mysql_query($strSQLproduct);
		$row = mysql_fetch_array($objQueryproduct);
		$sum=$row["Product_Price"]*$roworder["List_Amount"];
		$sum_all=$sum_all+$sum;
		?>	
			  
			   <tr>
						 
			  <td align="center"><?=$row["Product_Code"]?></td>
			  <td align="center"><?=$row["Product_Name"]?></td>
			  <td align="center"><?=$row["Product_Price"]?></td>
			 <!-- <td align="center"><?=$row["Product_Stock"]?></td> -->
			  <td align="center"><?=$roworder["List_Amount"]?></td>
			  <td align="center"><?=$sum?></td>
			  <!--<td align="center"><input type='text' name ='order_amount' value="1"></td> -->



			 
			  <!--<td align="center"><a href="page_order.php?Product_Id=<?=$row["Product_Id"]?>"><img src="image/shopping" width="24" height="24" border="0" /></a></td>-->
			  <!--<td align="center"><a href="page_order.php?Product_Id=<?=$row["Product_Id"]?>"><img src="image/can.png" width="24" height="24" border="0" /></a></td>-->
		<?php
	}
	?>
		</tr>
		
		<tr>
						 
			  <td align="center" colspan="4">รวม</td>
			  <td align="center"><?=$sum_all?></td>
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
</body>
</html>