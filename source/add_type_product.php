<?
 session_start();
if($_SESSION["strUsername"] ==  null){
 //header("location: index.php");
 exit(); 
 }
 ?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<title>ระบบสั่งจองสินค้าในมหาลัยบูรพา วิทยาเขตสระแก้ว</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="jquery.alphanumeric.js"></script>
<head>

<body bgcolor=#FFCC99>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">  
  <tr align="center"> 
  <td width="100%" colspan="2">
<?php include"header.php";?>
</td>
  </tr > 
  <tr align="center"> 
  <td width="25%" >
<?php include"menu_admin.php";?>
</td>
  <td width="75%" >
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
  


<script language="JavaScript1" type="text/javascript">

<script>

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

    <td width="80%" valign="top">	
		<table width="750" height="260" border="2" align="center" cellpadding="0" cellspacing="0" bordercolor="#FF8C00">		
	<tr>
	
    <td width="80%" valign="top">
	<table width="750" height="260" border="0" align="center" cellpadding="0" cellspacing="0" id="details1">		
		<tr>
<td colspan="2" height = "40" bgcolor="#FF6666"><div align="center"><strong><font size = "5">แบบฟอร์มเพิ่มประเภทสินค้า</font></strong></div></td>			  
        </tr> 	
      <tr>
        <td>
	<?php
	
$dbhost="localhost"; 
$dbuser="root";  
$dbpass="1234";
$dbname="project";
mysql_connect($dbhost,$dbuser,$dbpass) or die("MySQL connect failed");
mysql_select_db($dbname) or die("MySQL select database failed");
mysql_query("SET NAMES UTF8 ") or die (mysql_error());


	
	$sql = "select * from person  where Person_Fname like '%$idper%'";
		
	$result = mysql_query($sql) or die (mysql_error());
	$row = mysql_fetch_array($result);
	$per_level=$row['Person_Id'];
	?>			
		<body>	

<form name="frm" action="save_type_product.php" method="post" onSubmit="return chkForm();">

<!--<a id="showtitle">เลือกคำนำหน้าช่ื่อ : </a>-->
    <!--<select name = "Title_Id" id="Title_Id">-->
    <!--<option value="">เลือกคำนำหน้าชื่อ</option>-->
	<!--<option value="นาย">นาย</option>-->
	<!--<option value="นางสาว">นางสาว</option>-->
	<!--<option value="อาจารย์">อาจารย์</option>-->
	<!--<option value="ว่าที่ร้อยตรี">ว่าที่ร้อยตรี</option>-->
	<!--<option value="ดร.">ดร.</option>-->
	
    <!--</select>-->
<br>
<?php

//echo "ID : <input type='text' name ='txtFname'><br>";
echo "ชื่อประเภทสินค้า  : <input type='text' name ='TypeP_Nametype'><br>";
//echo "วันเดือนปีเกิด : ";



?>
<!--
<select name = "Year" id= "Year">
	/<?php
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
//echo "อีเมล  : <input type='text' name ='txtemail'><br>";
//echo "เบอร์โทร : <input type='tel' name ='txtPhone' id ='Phone' minlength = '9' maxlength = '10'><br>";
//echo "ชื่อผู้ใช้งาน  : <input type='text' name ='txtUsername'><br>";
//echo "รหัสผ่าน  : <input type='password' name ='txtPassword'><br>";
//echo "รหัสประจำตัว  : <input type='int' name ='txtUniversityCode' id ='Unicode'><br>";
//echo "สถานะ  : ";?>
  <!--  <select name = 'txtPosition' id="Position">-->
            <!--<option value='staff'>Staff</option>-->
			<!--<option value='student'>นักศึกษา</option>-->
			<!--<option value='teacher'>อาจารย์</option>-->
	<!--		
    </select><br>
	
    <a id="showFac">คณะ : </a>
    <select name = 'Faculty' id="Faculty">
    <option value=''>เลือกคณะ</option>
    <option value='1'>คณะวิทยาศาสตร์และสังคมศาสตร์</option>
    <option value='2'>คณะเทคโนโลยีการเกษตร</option>
    <option value='3'>พาณิชยศาสตร์และบริหารธุรกิจ</option>
    </select><br>
    -->
	
	<!--
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
	
    </select>-->
	
<p><input type="submit" name="subRegis" value="เพิ่มข้อมูล"/>&nbsp; &nbsp;
<input type="submit" name="submit" value="< Back"onClick="jascript:history.go(-1)"></div>

<p id="showfac"></p>
<p id="showbra"></p>


            <td><label>
					 <script language="javascript">
function CheckNum(){
		if (event.keyCode < 48 || event.keyCode > 57){
		      event.returnValue = false;
	    	}
	}
            <td>
			        <select name="per_level" id="per_level" style="font-size:14px">
            <?
			include "include/connect.php";
			$sql1 = "select * from level";
			$result1 = mysql_query($sql1) or die (mysql_error());
			?>
				<?
				while ($row1 = mysql_fetch_array($result1)) {
				?>
					<? if ($per_level == $row1["per_level"] ){ ?>						
					<option value="<?=$row1["per_level"]?>"  selected="select"><?=$row1["level_name"]?></option>	
					<? }elseif ($per_level != $row1["per_level"] ){ ?>					
					<option value="<?=$row1["per_level"]?>"><?=$row1["level_name"]?></option>
					<?
					}}
					?>
              </select>
			
			
			
			</td>
          </tr>	 

<tr>
		  <td colspan="2"><hr width=80% size=2 ></td>
</tr> 			 
		 	<tr>
					<th align="center" colspan=2>
					<input type="submit" name="button2" id="button2" value="บันทึกข้อมูล" />&nbsp;&nbsp;
					<input type="button" onclick="window.location='per_show.php'" value="ยกเลิก">
				</th>
			</tr> 
	
<tr>
		  <td colspan="2"><hr width=100% size=25 color=FF8C00></td>
</tr>  			  
		  
        </table>
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
</body>