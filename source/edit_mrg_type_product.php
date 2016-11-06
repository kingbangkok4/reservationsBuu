<?php
session_start ();
include ("layout.php");
include ("config.php");

	$strSQL = "SELECT * FROM type_product WHERE TypeP_Id='".$_GET[TypeP_Id]."'";
	$objQuery = $mysqli->query($strSQL);
	$objResult = $objQuery->fetch_assoc();
	$TypeP_Nametype=$objResult[TypeP_Nametype];
	
 ?>
<div id="kk-content">
	<div class="w3-container">

<script type="text/javascript">
function chkform(){
    
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
<br />
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td  valign="top">	
		<table width="100%" height="260" border="2" align="center" cellpadding="0" cellspacing="0" bordercolor="#64B5F6">		
	<tr>
	
    <td  valign="top">
	<table width="100%" height="260" border="0" align="center" cellpadding="0" cellspacing="0" id="details1">		
		<tr>
<td colspan="2" height = "40" bgcolor="#64B5F6"><div align="center"><strong><font size = "5">แบบฟอร์มแก้ไขข้อมูลประเภทสินค้า</font></strong></div></td>			  
        </tr> 	
      <tr>
        <td>	 
 
 <form name="form4" id="myyes" action="save_edit_type_product.php" method="post" onsubmit="return chkform(this);">
 <br />
 
	<?php
	
  if ($result->num_rows >0){
	while($row = $result->fetch_assoc()){
		header("location: main_admin.php");	
	}
 }else {
 
 }
$mysqli->close();
	
echo "<input type='hidden' name ='TypeP_Id' value='".$_GET[TypeP_Id]."'>";
echo "<input type='hidden' name ='status' value='person'>";
echo "ชื่อประเภทสินค้า  : <input type='text' name ='TypeP_Nametype' value='".$TypeP_Nametype."'><br /><br />";
?>

		  
	
				<input type="submit" name="button" id="button" value="บันทึกข้อมูล" id = "submit">&nbsp; &nbsp; &nbsp; 
				<input name="" id="" type="button" onClick="javascript:window.location.href='mrg_type_product.php';" value="ยกเลิก" />
				

<br /><br />
			
			</form>
			</td>
          </tr>
        </table>
		</td>
		</tr>
        </table>
		</td>	
		</tr>
</table>
<br />

		</div>
</div>