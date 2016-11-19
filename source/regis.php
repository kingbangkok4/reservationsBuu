<?php
//session_start ();
include ("layout.php");
?>
<div id="kk-content">
	<div class="w3-container">
	<script type="text/javascript">
$(document).ready(function(){
                  $("#Phone").numeric();
                  $("#Unicode").numeric();
                 
                  var maxDay = 0;
                  var conditionalSelect = $("#Day"),
                  // Save possible options
                  options = conditionalSelect.children(".conditional").clone();
                  
                  $("#Year").change(function(){
                                        $("#Month").val("");                                         });//change
                  
                  $("#Month").change(function(){
                                      var curDate = $("#Year").val();
                                           if($("#Month").val() == "02" && curDate%4 == 0 && curDate%100 == 0 && curDate%400 == 0){
                                           maxDay = 30; //feb is 29 day
                                     }else if($("#Month").val() == "02" && curDate%4 == 0 && curDate%100 != 0){
                                              maxDay = 30; //feb is 29 day
                                     }else if($("#Month").val() == "01" || $("#Month").val() == "03" || $("#Month").val() == "05" || $("#Month").val() == "07" || $("#Month").val() == "08" || $("#Month").val() == "10" || $("#Month").val() == "12"){
                                           maxDay = 32;
                                           }else{
                                           maxDay = 29; //feb is 28 day
                                           }
                                     
                                           conditionalSelect.children(".conditional").remove();
                                           for(var i=1;i<maxDay;i++){
                                           options.clone().filter(".value"+i).appendTo(conditionalSelect);
                                           
                                           }
                                      //document.getElementById("showfac").innerHTML = "Fac_Id is = "+maxDay;
                                           }).trigger("change");
                  
                  $("#Position").change(function(){
                                           if($(this).val() == "teacher"){
                                           $("#showBranch").hide();
                                           $("#Branch").hide();
                                           $("#Branch").val("0");
                                           }else{
                                           $("#showBranch").show();
                                           $("#Branch").show();
                                           }// if
                                           
                                        
                                           });//change
                  
                  $("#Faculty").change(function(){
                                       var detailBranch = $.ajax({
                                                                 url: "data_of_branch.php",
                                                                 type: "POST",
                                                                 data: {fac_id : $(this).val()},
                                                                 async: false
                                                                 }).responseText;
                                       $("#Branch").html(detailBranch);
                                       
                                       });
                  
                  });

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

<br />
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td  valign="top">	
		<table width="100%" height="260" border="2" align="center" cellpadding="0" cellspacing="0" bordercolor="#4DB6AC">		
	<tr>
	
    <td  valign="top">
	<table width="100%" height="260" border="0" align="center" cellpadding="0" cellspacing="0" id="details1">		
		<tr>
<td colspan="2" height = "40" bgcolor="#4DB6AC"><div align="center"><strong><font size = "5">แบบฟอร์มสมัครสมาชิก</font></strong></div></td>			  
        </tr> 	
      <tr>
        <td>

<form name="frm" action="save.php" method="post" onSubmit="return chkForm();">
<br />
<a id="showtitle">เลือกคำนำหน้าช่ื่อ : </a>
    <select name = "Title_Id" id="Title_Id">
    <option value="">เลือกคำนำหน้าชื่อ</option>
	<option value="นาย">นาย</option>
	<option value="นางสาว">นางสาว</option>
	<option value="อาจารย์">อาจารย์</option>
	<option value="ว่าที่ร้อยตรี">ว่าที่ร้อยตรี</option>
	<option value="ดร.">ดร.</option>
	
    </select>
<br /><br />
<?php

echo "ชื่อจริง  : <input type='text' name ='txtFname'><br /><br />";
echo "นามสกุล  : <input type='text' name ='txtLname'><br /><br />";
echo "วันเดือนปีเกิด : ";
?>
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
<br /><br />

<?php
echo "อีเมล  : <input type='text' name ='txtemail'><br /><br />";
echo "เบอร์โทร : <input type='tel' name ='txtPhone' id ='Phone' minlength = '9' maxlength = '10'><br /><br />";
echo "ชื่อผู้ใช้งาน  : <input type='text' name ='txtUsername'><br /><br />";
echo "รหัสผ่าน  : <input type='password' name ='txtPassword'><br /><br />";
echo "รหัสประจำตัว  : <input type='int' name ='txtUniversityCode' id ='Unicode'><br /><br />";
echo "สถานะ  : ";?>
    <select name = 'txtPosition' id="Position">
            <option value=''>เลือกสถานะ</option>
			<option value='student'>นักศึกษา</option>
			<option value='teacher'>อาจารย์</option>
    </select><br /><br />
	
    <a id="showFac">คณะ : </a>
    <select name = 'Faculty' id="Faculty">
    <option value=''>เลือกคณะ</option>
    <option value='1'>คณะวิทยาศาสตร์และสังคมศาสตร์</option>
    <option value='2'>คณะเทคโนโลยีการเกษตร</option>
    <option value='3'>พาณิชยศาสตร์และบริหารธุรกิจ</option>
    </select><br /><br />
    
    <a id="showBranch">สาขา : </a>
    <select name = 'Branch' id="Branch">
    <option value='0'>เลือกสาขา</option>
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
    <br/><br/>
<input type="submit" name="subRegis" value="สมัครสมาชิก"/>&nbsp; &nbsp;
<input type="button" value="กลับ" onclick="javascript:window.location.href='login.php'"/>

<p id="showfac"></p>
<p id="showbra"></p>

</form>
</td>
          </tr>	 	  
		  
        </table>
		</td>
		</tr>

        </table><br />
		</td>	
		</tr>

</table>
</div>
</div>