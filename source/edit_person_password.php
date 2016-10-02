<?php
 session_start();
  header('Content-Type: text/html; charset=utf-8');
if($sess_id == ""){
// header("Location:../index.php"); exit(); 
 } 
 ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<title>ระบบสั่งจองสินค้าในมหาลัยบูรพา วิทยาเขตสระแก้ว</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<head>

<body bgcolor=#FFCC99>

<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">  
  <tr align="center"> 
  <td width="100%" colspan="2">
<?php include"header.php";?>
</td>
  </tr > 
  <tr align="center"> 
  <td width="100%" colspan="2">

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      	

<script language="JavaScript1" type="text/javascript">
<!--
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
<td width="800" valign="top">

<form name="form4" id="myyes" action="save_password.php" method="post" onsubmit="return checkform(this);">
	  
		<table width="750" height="260" bgcolor="#FFFACD" border="0" align="center" cellpadding="0" cellspacing="0" id="details1">	
          <tr>
            <td colspan="2" height = "40" bgcolor="#FA8072"><div align="center"><strong><font size = "5">แบบฟอร์มเปลี่ยนรหัสผ่าน</font></strong></div></td>
          </tr>
<tr><td>		  
		<?php
	include "config.php";
	if ($result->num_rows >0){
	while($row = $result->fetch_assoc()){
		header("page2.php");	
	}
 }else {
 
 }

	$strSQL = "SELECT * FROM person WHERE Person_Id='".$_GET[Person_Id]."'";
	$objQuery = $mysqli->query($strSQL);
	$objResult = $objQuery->fetch_assoc();
	
	?>
</td></tr>	

          <tr>
            <td><div align="right">รหัสผ่านเดิม :&nbsp;</div></td>
            <td>
			<label>
            <input type="password" name="Person_Password" id="Person_Password" MaxLength = 20>
			<input name="Person_Id" type="hidden" id="Person_Id" value="<?=$objResult["Person_Id"]?>" />
			<input type='hidden' name ='status' value='person'>
			<input name="mg" type="hidden" id="Person_Id" value="<?=$objResult["Person_Id"]?>" />
			<input name="Person_Username" type="hidden" id="Person_Username" value="<?=$objResult["Person_Username"]?>" />
              </label><span><font color = #FF0000 size="3">*บังคับ</font></span></td>
          </tr>
			  
		  <tr>
            <td><div align="right">รหัสผ่านใหม่ :&nbsp;</div></td>
            <td>
              <label>
              <input type="password" name="Person_new" id="Person_new" MaxLength = 20>
              </label><span><font color = #FF0000 size="3">*บังคับ</font></span></td>
          </tr>	
		   <tr>
            <td><div align="right">ยืนยันรหัสผ่าน :&nbsp;</div></td>
            <td>
              <label>
              <input type="password" name="Person_confirm" id="Person_confirm" />
              </label><span><font color = #FF0000 size="3">*บังคับ</font></span></td>
          </tr>	  
		  


		  
		  
		  
<tr>
		  <td colspan="2"><hr width=100% size=1 ></td>
</tr>		  
		<tr>
				<th colspan="2" align="center">
				<input type="submit" name="button" id="button" value="บันทึกข้อมูล" id = "submit">&nbsp; &nbsp; &nbsp; 
				<input name="" id="" type="button" onClick="Javascript:history.back();" value="ยกเลิก" />
				</th>
		</tr> 			
<tr>	
		  <td colspan="2"><hr width=100% size=30 color = "FA8072"></td>
</tr>  
		  
        </table>
		</form>		
		
		

		  
      </table>
	  </td>

  </tr>
  		<tr>
              <td bgcolor="#FF9999" colspan = "8" height = "40"><div align="center"><strong>มหาวิทยาลัยบูรพา  วิทยาเขตสระแก้ว 2016</strong></div></td>
        </tr>
</table>

</td>
  </tr>  
</table>
   


</body>
</head>
</html>