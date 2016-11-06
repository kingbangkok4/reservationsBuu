<?php
session_start ();
include ("layout.php");
include ("config.php");

$strSQL = "SELECT * FROM person WHERE Person_Id='".$_GET[Person_Id]."'";
$objQuery = $mysqli->query($strSQL);
$objResult = $objQuery->fetch_assoc();
$Fname=$objResult[Person_Fname];
$Lname=$objResult[Person_Lname];
$Birthday=$objResult[Person_Birthday];
$Email=$objResult[Person_email];
$Phone=$objResult[Person_Phone];
$Username=$objResult[Person_Username];
$Password=$objResult[Person_Password];
$UniCode=$objResult[Person_UniversityCode];
$Position=$objResult[Person_Position];

$strSQLfaculty = "SELECT * FROM faculty WHERE Fac_Id='".$objResult[Fac_Id]."'";
$objQueryfaculty = $mysqli->query($strSQLfaculty);
$objResultfaculty = $objQueryfaculty->fetch_assoc();
$Faculty=$objResultfaculty[Fac_Name];

$strSQLbranch = "SELECT * FROM branch WHERE Branch_Id='".$objResult[Branch_Id]."'";
$objQuerybranch = $mysqli->query($strSQLbranch);
$objResultbranch = $objQuerybranch->fetch_assoc();
$Branch=$objResultbranch[Branch_Name];
?>
<div id="kk-content">
	<div class="w3-container">
      	

<script type="text/javascript">
function checkform()
{
  
if(document.form4.Person_Password.value == ""){
		alert('กรุณากรอกรหัสผ่านเดิม');
		document.form4.Person_Password.focus();		
		return false;
	}	

if(document.form4.Person_new.value == ""){
		alert('กรุณากรอกรหัสผ่านอีกครั้ง');
		document.form4.Person_new.focus();		
		return false;
	}	

if(document.form4.Person_confirm.value == ""){
		alert('กรุณากรอกรหัสผ่านอีกครั้ง');
		document.form4.Person_confirm.focus();		
		return false;
	}		
	
	if(document.form4.Person_new.value != document.form4.Person_confirm.value)
	{
		alert('รหัสผ่านไม่ตรงกัน');
		document.form4.Person_confirm.focus();		
		return false;
	}	  

	document.form4.checkform();
}

</script>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td  valign="top">	
		<table width="100%" height="260" border="2" align="center" cellpadding="0" cellspacing="0" bordercolor="#64B5F6">		
	<tr>
	
    <td  valign="top">
	<table width="100%" height="260" border="0" align="center" cellpadding="0" cellspacing="0" id="details1">		
		<tr>
<td colspan="2" height = "40" bgcolor="#64B5F6"><div align="center"><strong><font size = "5">แบบฟอร์มเปลี่ยนรหัสผ่าน</font></strong></div></td>			  
        </tr> 	
      <tr>
        <td>

<form name="form4" id="myyes" action="save_password.php" method="post" onsubmit="return checkform(this);">
<br />
		<?php
	include "config.php";
	if ($result->num_rows >0){
	while($row = $result->fetch_assoc()){
		header("main_admin.php");	
	}
 }else {
 
 }

	$strSQL = "SELECT * FROM person WHERE Person_Id='".$_GET[Person_Id]."'";
	$objQuery = $mysqli->query($strSQL);
	$objResult = $objQuery->fetch_assoc();
	
	?>
รหัสผ่านเดิม<span><font color = #FF0000 size="3">*</font></span> :&nbsp;
            <input type="password" name="Person_Password" id="Person_Password" MaxLength = 20>
			<input name="Person_Id" type="hidden" id="Person_Id" value="<?=$objResult["Person_Id"]?>" />
			<input name="mg" type="hidden" id="Person_Id" value="<?=$objResult["Person_Id"]?>" />
			<input name="Person_Username" type="hidden" id="Person_Username" value="<?=$objResult["Person_Username"]?>" />
              <br /><br />
            รหัสผ่านใหม่<span><font color = #FF0000 size="3">*</font></span> :&nbsp;
              <input type="password" name="Person_new" id="Person_new" MaxLength = 20>
              <br /><br />
ยืนยันรหัสผ่าน<span><font color = #FF0000 size="3">*</font></span> :&nbsp;
              <input type="password" name="Person_confirm" id="Person_confirm" />
                <br /><br />
		 	  
				<input type="submit" name="button" id="button" value="บันทึกข้อมูล" id = "submit">&nbsp; &nbsp; &nbsp; 
				<input name="" id="" type="button" onClick="Javascript:history.back();" value="ยกเลิก" />
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
		</div>
</div>