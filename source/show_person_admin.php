<?php
session_start ();
include ("layout.php");
include ("config.php");
?>
<div id="kk-content">
	<div class="w3-container">
<br />
<table style="12px" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
  


    <td width="100%" valign="top">	
		<table width="100%" height="260" border="2" align="center" cellpadding="0" cellspacing="0" bordercolor="#E57373">		
	<tr>
			  <td colspan="2" height = "40" bgcolor="#E57373"><div align="center"><strong><font size = "5">ข้อมูลส่วนตัว</font></strong></div></td>
        </tr> 
	<tr>
	

    <td width="100%" valign="top">
	<table width="100%" height="260" border="0" align="center" cellpadding="0" cellspacing="0" id="details1">
      <tr>
        <td>&nbsp;</td>
      </tr>	
			
	
      <tr>
<td>
	<?php
	
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
	
  if ($result->num_rows >0){
	while($row = $result->fetch_assoc()){
		header("main_admin.php");	
	}
 }else {
 
 }
$mysqli->close();
	?>
</td>
      </tr>	
      <br />
<?	  
		echo "ชื่อจริง: ".$Fname."<br /><br />";
		echo "นามสกุล: ".$Lname."<br /><br />";
		echo "วันเดือนปีเกิด: ".$Birthday."<br /><br />";
		echo "อีเมล์: ".$Email."<br /><br />";
		echo "เบอร์โทร: ".$Phone."<br /><br />";
		echo "ชื่อผู้ใช้งาน: ".$Username."<br /><br />";
		echo "รหัสผู้ใช้งาน: ".$Password."<br /><br />";
		echo "รหัสประจำตัว: ".$UniCode."<br /><br />";
		echo "สถานะ: ".$Position."<br /><br />";
        echo "คณะ: ".$Faculty."<br /><br />";
        echo "สาขา: ".$Branch."<br /><br />";

		$sql_insert="INSERT INTO person (Person_Fname ,Person_Lname ,Person_Birthday ,Person_email ,Person_Phone ,Person_Username ,Person_Password ,Person_UniversityCode, Person_Position, Fac_Id, Branch_Id)
		VALUES('".$Fname."', '".$Lname."', '".$Birthday."', '".$Email."', ".$Phone.", '".$Username."',  '".$Password."', ".$UniCode.",'".$Position."',".$Faculty.",".$Branch.");";
?>




</tr>
	  
		  
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2"><label></label>
              <label>
	  
              
              &nbsp;&nbsp;<center><div align="center"></div> <a href="edit_person_admin.php?Person_Id=<?=$Person_Id;?>"><img src="image/editcus.png" width="120" height="33" border="0" /></a> </div></center>
             &nbsp;&nbsp;<center><div align="center"></div> <a href="edit_password_admin.php?Person_Id=<?=$Person_Id;?>"><img src="image/editpass.png" width="120" height="33" border="0" /></a> </div></center>
             &nbsp;&nbsp;<center><div align="center"></div> <a href="main_admin.php"><img src="image/cancel.png" width="120" height="33" border="0" /></a> </div></center>
			</label></td>
			
          </tr>
      </table>
	  </td>
	  
		</tr>
        </table>
		</td>	

	  
  </tr>
</table>
<br />
  </div></div>