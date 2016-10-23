<?
 session_start();
if($_SESSION["strUsername"] ==  null){
 //header("location: index.php");
 exit(); 
 }
 
	include "config.php";
	$strSQL = "SELECT * FROM product WHERE Product_Id='".$_GET[Product_Id]."'";
	$objQuery = $mysqli->query($strSQL);
	$objResult = $objQuery->fetch_assoc();
	$Product_Name=$objResult[Product_Name];
	
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

<form name="form4" id="myyes" action="save_edit_product.php" method="post" onsubmit="return checkform(this);">
	  
		<table width="750" height="260" bgcolor="#FFFACD" border="0" align="center" cellpadding="0" cellspacing="0" id="details1">	

          <tr>
            <td colspan="2" height = "40" bgcolor="#FA8072"><div align="center"><strong><font size = "5">แบบฟอร์มแก้ไขประเภทสินค้า</font></strong></div></td>
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
echo "<input type='hidden' name ='Product_Id' value='".$_GET[Product_Id]."'>";
echo "<input type='hidden' name ='status' value='person'>";
echo "id  : <input type='text' name ='Product_Id' value='$objResult[Product_Id]'><br>";
echo "รหัสสินค้า  : <input type='text' name ='Product_Code' value='$objResult[Product_Code]'><br>";
echo "ชื่อสินค้า  : <input type='text' name ='Product_Name' value='$objResult[Product_Name]'><br>";
echo "ราคา  : <input type='text' name ='Product_Price' value='$objResult[Product_Price]'><br>";
echo "จำนวนสินค้าคงเหลือ  : <input type='text' name ='Product_Stock' value='$objResult[Product_Stock]'><br>";
echo "รูปภาพ  : <input type='file' name ='Product_picture' value='$objResult[Product_picture]'>$objResult[Product_picture]<br>";

?>

<?php
//echo "อีเมล  : <input type='text' name ='txtemail'  value='".$Email."'><br>";
//echo "เบอร์โทร : <input type='tel' name ='txtPhone'   value='".$Phone."' id ='Phone' minlength = '9' maxlength = '10'><br>";
//echo "ชื่อผู้ใช้งาน  : <input type='text' name ='txtUsername'   value='".$Username."'><br>";
//echo "รหัสผ่าน  : <input type='password' name ='txtPassword'   value='".$Password."'><br>";
//echo "รหัสประจำตัว  : <input type='int' name ='txtUniversityCode'   value='".$UniCode."' id ='Unicode'><br>";
//echo "สถานะ  : ";?>
   <!-- <select name = 'txtPosition' id="Position">
            <option value=''>สถานะ</option>
			<option value='student'>นักศึกษา</option>
			<option value='teacher'>อาจารย์</option>
    </select><br>
	
    <a id="showFac">คณะ : </a>
    <select name = 'Faculty' id="Faculty">-->
		<!--<?
			//if($objResult[Fac_Id]!=null){
			//	echo "<option value='$objResult[Fac_Id]'>$Faculty</option>";	
			//}else{
			//	echo "<option value=''>เลือกคณะ</option>";
		//	}
		//?>
		<option value='1'>คณะวิทยาศาสตร์และสังคมศาสตร์</option>
		<option value='2'>คณะเทคโนโลยีการเกษตร</option>
		<option value='3'>พาณิชยศาสตร์และบริหารธุรกิจ</option>
    </select><br>
    
    <a id="showBranch">สาขา : </a>
    <select name = 'Branch' id="Branch">
		<?
			//if($objResult[Branch_Id]!=null){
				//echo "<option value='$objResult[Branch_Id]'>$Branch</option>";	
			//}else{
			//	echo "<option value=''>เลือกสาขา</option>";
			//}
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
</tr>-->
		  
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