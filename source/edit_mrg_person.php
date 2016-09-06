<?php
 session_start();
  header('Content-Type: text/html; charset=utf-8');
if($_SESSION["strUsername"] ==  null){
 //header("location: index.php");
 exit(); 
 }
 
	include "config.php";
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

<form name="form4" id="myyes" action="save_person.php" method="post" onsubmit="return checkform(this);">
	  
		<table width="750" height="260" bgcolor="#FFFACD" border="0" align="center" cellpadding="0" cellspacing="0" id="details1">	

          <tr>
            <td colspan="2" height = "40" bgcolor="#FA8072"><div align="center"><strong><font size = "5">แบบฟอร์มแก้ไขข้อมูลผู้ใช้งาน</font></strong></div></td>
          </tr>
<tr><td>	 
 
	<?php
	
	include "config.php";
	
	//$result = $mysqli->query($sql);

  if ($result->num_rows >0){
	while($row = $result->fetch_assoc()){
		header("location: page2.php");	
	}
 }else {
 
 }
$mysqli->close();
	?>	
</td></tr>
			<tr>
            <td>

<?php
echo "<input type='hidden' name ='Person_Id' value='".$_GET[Person_Id]."'>";
echo "<input type='hidden' name ='status' value='person'>";
echo "ชื่อจริง  : <input type='text' name ='txtFname' value='".$Fname."'><br>";
echo "นามสกุล  : <input type='text' name ='txtLname' value='".$Lname."'><br>";
echo "วันเดือนปีเกิด : ";
?>
<input type='date' name ='birthday' value='<?=$Birthday?>'>

<!--
<select name = "Year" id= "Year">
	<?php
	$mYear = date('Y');	
	
			      echo "<option value = '".$mYear."'>$mYear</option>";
 				for($i=1;$i<=100;$i++){
 					$lYear = $mYear-$i;
 					echo "<option value ='".$lYear."'>$lYear</option>";

 				}
 				?>

</select> &nbsp;&nbsp;

<select name = "Month" id="Month">
            <option value="">เลือกเดือน</option>
			<option value="01">มกราคม</option>
			<option value="02">กุมภาพันธ์</option>
			<option value="03">มีนาคม</option>
			<option value="04">เมษายน</option>
			<option value="05">พฤษภาคม</option>
			<option value="06">มิถุนายน</option>
			<option value="07">กรกฎาคม</option>
			<option value="08">สิงหาคม</option>
			<option value="09">กันยายน</option>
			<option value="10">ตุลาคม</option>
			<option value="11">พฤศจิกายน</option>
			<option value="12">ธันวาคม</option>
</select> &nbsp;&nbsp;
<select name="Day" id="Day">
                  <option value="" selected="selected">เลือกวันที่</option>
                  <option class="conditional value1" value="01">1</option>
                  <option class="conditional value2" value="02">2</option>
                  <option class="conditional value3" value="03">3</option>
                  <option class="conditional value4" value="04">4</option>
                  <option class="conditional value5" value="05">5</option>
                  <option class="conditional value6" value="06">6</option>
                  <option class="conditional value7" value="07">7</option>
                  <option class="conditional value8" value="08">8</option>
                  <option class="conditional value9" value="09">9</option>
                  <option class="conditional value10" value="10">10</option>
                  <option class="conditional value11" value="11">11</option>
                  <option class="conditional value12" value="12">12</option>
                  <option class="conditional value13" value="13">13</option>
                  <option class="conditional value14" value="14">14</option>
                  <option class="conditional value15" value="15">15</option>
                  <option class="conditional value16" value="16">16</option>
                  <option class="conditional value17" value="17">17</option>
                  <option class="conditional value18" value="18">18</option>
                  <option class="conditional value19" value="19">19</option>
                  <option class="conditional value20" value="20">20</option>
                  <option class="conditional value21" value="21">21</option>
                  <option class="conditional value22" value="22">22</option>
                  <option class="conditional value23" value="23">23</option>
                  <option class="conditional value24" value="24">24</option>
                  <option class="conditional value25" value="25">25</option>
                  <option class="conditional value26" value="26">26</option>
                  <option class="conditional value27" value="27">27</option>
                  <option class="conditional value28" value="28">28</option>
                  <option class="conditional value29" value="29">29</option>
                  <option class="conditional value30" value="30">30</option>
                  <option class="conditional value31" value="31">31</option>
</select>
-->
<br>

<?php
echo "อีเมล  : <input type='text' name ='txtemail'  value='".$Email."'><br>";
echo "เบอร์โทร : <input type='tel' name ='txtPhone'   value='".$Phone."' id ='Phone' minlength = '9' maxlength = '10'><br>";
//echo "ชื่อผู้ใช้งาน  : <input type='text' name ='txtUsername'   value='".$Username."'><br>";
//echo "รหัสผ่าน  : <input type='password' name ='txtPassword'   value='".$Password."'><br>";
echo "รหัสประจำตัว  : <input type='int' name ='txtUniversityCode'   value='".$UniCode."' id ='Unicode'><br>";
echo "สถานะ  : ";
?>
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
    </select><br>
	
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
    </select><br>
    
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


<p id="showfac"></p>
<p id="showbra"></p></td>
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








	  </td>


  		<tr>
              <td bgcolor="#FFDAB9" colspan = "8" height = "40"><div align="center"><strong>มหาวิทยาลัยบูรพา  วิทยาเขตสระแก้ว 2016</strong></div></td>
        </tr>
		</tr>
</table>
</body>
</html>