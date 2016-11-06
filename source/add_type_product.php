<?php
session_start ();
include ("layout.php");
include ("config.php");
?>
<div id="kk-content">
	<div class="w3-container">

<script type="text/javascript">
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
        
    }else if(document.frm.txtUsername.value == ''){
        alert('กรุณากรอกชื่อผู้ใช้งาน');
        document.frm.txtUsername.focus();
        return false;
        
    }else if(document.frm.txtPassword.value == ''){
        alert('กรุณากรอกพาสเวิร์ด');
        document.frm.txtPassword.focus();
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

 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td  valign="top">	
		<table width="100%" height="260" border="2" align="center" cellpadding="0" cellspacing="0" bordercolor="#64B5F6">		
	<tr>
	
    <td  valign="top">
	<table width="100%" height="260" border="0" align="center" cellpadding="0" cellspacing="0" id="details1">		
		<tr>
<td colspan="2" height = "40" bgcolor="#64B5F6"><div align="center"><strong><font size = "5">แบบฟอร์มเพิ่มประเภทสินค้า</font></strong></div></td>			  
        </tr> 	
      <tr>
        <td>
	<?php

mysql_connect($dbhost,$dbuser,$dbpass) or die("MySQL connect failed");
mysql_select_db($dbname) or die("MySQL select database failed");
mysql_query("SET NAMES UTF8 ") or die (mysql_error());


	
	$sql = "select * from person  where Person_Fname like '%$idper%'";
		
	$result = mysql_query($sql) or die (mysql_error());
	$row = mysql_fetch_array($result);
	$per_level=$row['Person_Id'];
	?>	

<form name="frm" action="save_type_product.php" method="post" onSubmit="return chkForm();">

<br />
<?php

echo "ชื่อประเภทสินค้า  : <input type='text' name ='TypeP_Nametype'><br /><br />";




?>

	
<input type="submit" name="subRegis" value="เพิ่มข้อมูล"/>&nbsp; &nbsp;
<input type="button" name="submit" value="กลับ"onClick="jascript:history.go(-1)">

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