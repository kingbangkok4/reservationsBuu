<?php
session_start ();
include ("layout.php");
include ("config.php");
 
	$strSQL = "SELECT * FROM person WHERE Person_Username='".$_SESSION[strUsername]."'";
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
<br />
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td  valign="top">	
		<table width="100%" height="260" border="2" align="center" cellpadding="0" cellspacing="0" bordercolor="#E57373">		
	<tr>
	
    <td  valign="top">
	<table width="100%" height="260" border="0" align="center" cellpadding="0" cellspacing="0" id="details1">		
		<tr>
<td colspan="2" height = "40" bgcolor="#E57373"><div align="center"><strong><font size = "5">แบบฟอร์มแก้ไขข้อมูลส่วนตัว</font></strong></div></td>			  
        </tr> 	
      <tr>
        <td>	

<form name="frm" action="save_person.php" method="post" onSubmit="return chkForm();">
	  
 <br />
	<?php
	
	//$result = $mysqli->query($sql);

  if ($result->num_rows >0){
	while($row = $result->fetch_assoc()){
		header("location: main_admin.php");	
	}
 }else {
 
 }
$mysqli->close();
echo "ชื่อจริง  : <input type='text' name ='txtFname' value='".$Fname."'><br /><br />";
echo "นามสกุล  : <input type='text' name ='txtLname' value='".$Lname."'><br /><br />";
echo "วันเดือนปีเกิด : ";
?>
<input type='date' name ='birthday' value='<?=$Birthday?>'>

<br /><br />

<?php
echo "อีเมล  : <input type='text' name ='txtemail'  value='".$Email."'><br /><br />";
echo "เบอร์โทร : <input type='tel' name ='txtPhone'   value='".$Phone."' id ='Phone' minlength = '9' maxlength = '10'><br /><br />";
echo "รหัสประจำตัว  : <input type='int' name ='txtUniversityCode'   value='".$UniCode."' id ='Unicode'><br /><br />";
echo "สถานะ  : ";?>
    <select name = 'txtPosition' id="Position">
	<?
		if($Position!=null){
			echo "<option value='$Position'>$Position</option>";	
		}else{
			echo "<option value=''>เลือกสถานะ</option>";
		}
	?>
			<option value='นักศึกษา'>นักศึกษา</option>
			<option value='อาจารย์'>อาจารย์</option>
    </select><br /><br />
	
    <a id="showFac">คณะ : </a>
    <select name = 'Faculty' id="Faculty">
		<?
			if($objResult[Fac_Id]!=null){
				echo "<option value='$objResult[Fac_Id]'>$Faculty</option>";	
			}else{
				echo "<option value=''>เลือกคณะ</option>";
			}
		?>
		<option value='1'>คณะวิทยาศาสตร์และสังคมศาสตร์</option>
		<option value='2'>คณะเทคโนโลยีการเกษตร</option>
		<option value='3'>พาณิชยศาสตร์และบริหารธุรกิจ</option>
    </select><br /><br />
    
    <a id="showBranch">สาขา : </a>
    <select name = 'Branch' id="Branch">
		<?
			if($objResult[Branch_Id]!=null){
				echo "<option value='$objResult[Branch_Id]'>$Branch</option>";	
			}else{
				echo "<option value=''>เลือกสาขา</option>";
			}
		?>
		<option value='1'>สาขาเทคโนโลยีสารสนเทศ</option>
		<option value='2'>สาขาคอมพิวเตอร์</option>
		<option value='3'>สาขาบริหารทั่วไป</option>
		<option value='4'>สาขาการจัดการโลจิสติกส์และการค้าชายแดน</option>
		<option value='5'>สาขาทรัพยากรธรรมชาติและสิ่งแวดล้อม</option>
		<option value='6'>สาขาการจัดการทรัพยากรมนุษย์</option>
		<option value='7'>สาขาเกษตรศาสตร์</option>
		<option value='8'>สาขาเทคโนโลยีผลิตภัณฑ์ธรรมชาติ</option>
		<option value='9'>สาขาวิชาการจัดการ</option>
	
    </select>
<br /><br />
<input type="submit" name="button" id="button" value="บันทึกข้อมูล" id = "submit">&nbsp; &nbsp; &nbsp; 
<input name="" id="" type="button" onClick="Javascript:history.back();" value="ยกเลิก" />

<p id="showfac"></p>
<p id="showbra"></p>

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