<?php
session_start ();
include ("layout.php");
include ("config.php");

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$Title_Id = $_POST['Title_Id'];
	$Fname = $_POST['txtFname'];
	$Lname = $_POST['txtLname'];
	$Birthday = $_POST['txtBirthday'];
    $Year = $_POST['Year'];
    $Month = $_POST['Month'];
    $Day = $_POST['Day'];
	$Email = $_POST['txtemail'];
	$Phone = $_POST['txtPhone'];
	$Username = $_POST['txtUsername'];	
	$Password = $_POST['txtPassword'];
	$UniCode = $_POST['txtUniversityCode'];
    $Position = $_POST['txtPosition'];
    $Birthday = $Year."-".$Month."-".$Day;
	$Faculty = $_POST['Faculty'];
    if(isset($_POST['Branch']) && $_POST['Branch'] != ""){
	$Branch = $_POST['Branch'];
    }else{
        $Branch = "0";
    }
	
	
	$strSQLfaculty = "SELECT * FROM faculty WHERE Fac_Id='".$_POST['Faculty'][Fac_Id]."'";
	$objQueryfaculty = $mysqli->query($strSQLfaculty);
	$objResultfaculty = $objQueryfaculty->fetch_assoc();
	$Faculty2=$objResultfaculty[Fac_Name];
	
	$strSQLbranch = "SELECT * FROM branch WHERE Branch_Id='".$_POST['Branch'][Branch_Id]."'";
	$objQuerybranch = $mysqli->query($strSQLbranch);
	$objResultbranch = $objQuerybranch->fetch_assoc();
	$Branch2=$objResultbranch[Branch_Name];
	
	?>
	<div id="kk-content">
	<div class="w3-container">
	
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td  valign="top">	
		<table width="100%" height="260" border="2" align="center" cellpadding="0" cellspacing="0" bordercolor="#E57373">		
	<tr>
	
    <td  valign="top">
	<table width="100%" height="260" border="0" align="center" cellpadding="0" cellspacing="0" id="details1">		
		<tr>
<td colspan="2" height = "40" bgcolor="#E57373"><div align="center"><strong><font size = "5">บันทึกข้อมูลเจ้าหน้าที่</font></strong></div></td>			  
        </tr> 	
      <tr>
        <td>	 
 
 <br />
	<?php

		echo "คำนำหน้าชื่อ: ".$Title_Id."<br /><br />";
		echo "ชื่อจริง: ".$Fname."<br /><br />";
		echo "นามสกุล: ".$Lname."<br /><br />";
		echo "วันเดือนปีเกิด: ".$Year."-".$Month."-".$Day."<br /><br />";
		echo "อีเมล์: ".$Email."<br /><br />";
		echo "เบอร์โทร: ".$Phone."<br /><br />";
		echo "ชื่อผู้ใช้งาน: ".$Username."<br /><br />";
		echo "รหัสผู้ใช้งาน: ".$Password."<br /><br />";
		echo "รหัสประจำตัว: ".$UniCode."<br /><br />";
		echo "สถานะ: ".$Position."<br /><br />";
        echo "คณะ: ".$Faculty2."<br /><br />";
        echo "สาขา: ".$Branch2."<br /><br />";

		$sql_insert="INSERT INTO person (Title_Id ,Person_Fname ,Person_Lname ,Person_Birthday ,Person_email ,Person_Phone ,Person_Username ,Person_Password ,Person_UniversityCode, Person_Position, Fac_Id, Branch_Id)
		VALUES('".$Title_Id."','".$Fname."', '".$Lname."', '".$Birthday."', '".$Email."', ".$Phone.", '".$Username."',  '".$Password."', ".$UniCode.",'".$Position."',".$Faculty.",".$Branch.");";
		// $result = $mysqli->query($sql);

		if ($mysqli->query($sql_insert) == TRUE) {
		    echo "สมัครสมาชิกเรียบร้อย<br /><br />";
		} else {
		    echo "Error: " .$sql_insert. "<br /><br />" . $mysqli->error;
		}
	}
    
        $mysqli->close();

?>
<input type="button" value="กลับ" onclick="javascript:window.location.href='mrg_user.php'"/>
<br /><br />

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