<?
session_start ();
session_destroy ();
?>
<!DOCTYPE html>
<html>
<head>
<title>ระบบสั่งจองสินค้าในมหาวิทยาลัยบุรพา วิทยาเขตสระแก้ว</title>
<meta charset="UTF-8">
<script>
$(document).ready(function() {
	$("#Phone").numeric();
    $("#Unicode").numeric();
   
    var maxDay = 0;
    var conditionalSelect = $("#Day");
    options = conditionalSelect.children(".conditional").clone();
    
    $("#Year").change(function() {
    	$("#Month").val("");
	});
    
    $("#Month").change(function(){
    	var curDate = $("#Year").val();
   		if ($("#Month").val() == "02" && curDate%4 == 0 && curDate%100 == 0 && curDate%400 == 0) {
        	maxDay = 30; //feb is 29 day
        } else if($("#Month").val() == "02" && curDate%4 == 0 && curDate%100 != 0) {
        	maxDay = 30; //feb is 29 day
        } else if($("#Month").val() == "01" || $("#Month").val() == "03" || $("#Month").val() == "05" || $("#Month").val() == "07" || $("#Month").val() == "08" || $("#Month").val() == "10" || $("#Month").val() == "12") {
        	maxDay = 32;
        } else {
        	maxDay = 29; //feb is 28 day
        }
        conditionalSelect.children(".conditional").remove();
        for (var i = 1; i < maxDay; i++){
        	options.clone().filter(".value" + i).appendTo(conditionalSelect);
        }
    	document.getElementById("showfac").innerHTML = "Fac_Id is = " + maxDay;
    }).trigger("change");
    
    $("#Position").change(function(){
    	if ($(this).val() == "teacher") {
        	$("#showBranch").hide();
            $("#Branch").hide();
            $("#Branch").val("0");
        } else {
        	$("#showBranch").show();
            $("#Branch").show();
        }
    });
    
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
    if(document.frm.txtFname.value == ''){
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
</head>
<body style="background-color: #FFCC99; text-align: center;">
	<table
		style="border: 1px solid black; border-collapse: collapse; width: 100%;">
		<tr>
			<td colspan="2"
				style="border: 1px solid black; padding: 0; text-align: center;">
				<?php
				include "header.php";
				?>
			</td>
		</tr>
		<tr>
			<td colspan="2"
				style="border: 1px solid black; padding: 0; text-align: center;">
				<!-- begin content -->
				<table style="width: 100%; border-collapse: collapse;">
					<tr>
						<td style="padding: 0px 0px 60px 0px; text-align: center;">&nbsp;</td>
					</tr>
					<tr>
						<td style="padding: 0px 0px 5px 0px; text-align: center;">เลือกคำนำหน้าช่ื่อ
							: <select name="Title_Id" id="Title_Id">
								<option value="">เลือกคำนำหน้าชื่อ</option>
								<option value="นาย">นาย</option>
								<option value="นางสาว">นางสาว</option>
								<option value="อาจารย์">อาจารย์</option>
								<option value="ว่าที่ร้อยตรี">ว่าที่ร้อยตรี</option>
								<option value="ดร.">ดร.</option>
						</select>
						</td>
					</tr>
					<tr>
						<td style="padding: 0px 0px 5px 0px; text-align: center;">
							ชื่อจริง : <input type='text' name='txtFname'>
						</td>
					</tr>
					<tr>
						<td style="padding: 0px 0px 5px 0px; text-align: center;">นามสกุล
							: <input type='text' name='txtLname'>
						</td>
					</tr>
					<tr>
						<td style="padding: 0px 0px 5px 0px; text-align: center;">
							วันเดือนปีเกิด : <select name="Day" id="Day">
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
						</select> <select name="Month" id="Month">
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
						</select> <select name="Year" id="Year">
							<?php
							$mYear = date ( 'Y' );
							echo "<option value = '" . $mYear . "'>$mYear</option>";
							for($i = 0; $i < 100; $i ++) {
								$lYear = $mYear - ($i + 1);
								echo "<option value ='" . $lYear . "'>$lYear</option>";
							}
							?>
						</select>
						</td>
					</tr>
					<tr>
						<td style="padding: 0px 0px 5px 0px; text-align: center;">อีเมล :
							<input type='text' name='txtemail'>
						</td>
					</tr>
					<tr>
						<td style="padding: 0px 0px 5px 0px; text-align: center;">
							เบอร์โทร : <input type='tel' name='txtPhone' id='Phone'
							maxlength='10'>
						</td>
					</tr>
					<tr>
						<td style="padding: 0px 0px 5px 0px; text-align: center;">
							ชื่อผู้ใช้งาน : <input type='text' name='txtUsername'>
						</td>
					</tr>
					<tr>
						<td style="padding: 0px 0px 5px 0px; text-align: center;">
							รหัสผ่าน : <input type='password' name='txtPassword'>
						</td>
					</tr>
					<tr>
						<td style="padding: 0px 0px 5px 0px; text-align: center;">
							รหัสประจำตัว : <input type='text' name='txtUniversityCode'
							id='Unicode'>
						</td>
					</tr>
					<tr>
						<td style="padding: 0px 0px 5px 0px; text-align: center;">สถานะ :
							<select name='txtPosition' id="Position">
								<option value=''>เลือกสถานะ</option>
								<option value='student'>นักศึกษา</option>
								<option value='teacher'>อาจารย์</option>
						</select>
						</td>
					</tr>
					<tr>
						<td style="padding: 0px 0px 5px 0px; text-align: center;">คณะ : <select
							name='Faculty' id="Faculty">
								<option value=''>เลือกคณะ</option>
								<option value='1'>คณะวิทยาศาสตร์และสังคมศาสตร์</option>
								<option value='2'>คณะเทคโนโลยีการเกษตร</option>
								<option value='3'>พาณิชยศาสตร์และบริหารธุรกิจ</option>
						</select>
						</td>
					</tr>
					<tr>
						<td style="padding: 0px 0px 5px 0px; text-align: center;">สาขา : <select
							name='Branch' id="Branch">
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
						</td>
					</tr>
					<tr>
						<td style="padding: 0px 0px 5px 0px; text-align: center;"><input
							type="submit" name="subRegis" value="สมัครสมาชิก" /> <input
							type="button" onclick="window.location='login.php'"
							value="ยกเลิก" /></td>
					</tr>
					<tr>
						<td style="padding: 0px 0px 60px 0px; text-align: center;">&nbsp;</td>
					</tr>
				</table> <!-- end content -->
			</td>
		</tr>
		<tr>
			<td colspan="2"
				style="border: 1px solid black; padding: 0; text-align: center;">
				<?php
				include "footer.php";
				?>
			</td>
		</tr>
	</table>
</body>
</html>