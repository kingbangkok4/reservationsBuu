<?
 session_start();
if($_SESSION["strUsername"] ==  null){
 //header("location: index.php");
 exit(); 
 }

 ?>
 <body bgcolor=#FFCC99>
<?php include"header.php";?>
<table style="12px" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
  


    <td width="80%" valign="top">	
		<table width="750" height="260" border="2" align="center" cellpadding="0" cellspacing="0" bordercolor="#FF6666">		
	<tr>
			  <td colspan="2" height = "40" bgcolor="#FF6666"><div align="center"><strong><font size = "5">ข้อมูลส่วนตัว</font></strong></div></td>
        </tr> 
	<tr>
	

    <td width="80%" valign="top">
	<table width="750" height="260" border="0" align="center" cellpadding="0" cellspacing="0" id="details1">
      <tr>
        <td>&nbsp;</td>
      </tr>	
			
	
      <tr>
<td>
	<?php
	include "config.php";
	
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
		header("page2.php");	
	}
 }else {
 
 }
$mysqli->close();
	?>
</td>
      </tr>	
<?	  
		echo "ชื่อจริง: ".$Fname."<br>";
		echo "นามสกุล: ".$Lname."<br>";
		echo "วันเดือนปีเกิด: ".$Birthday."<br>";
		echo "อีเมล์: ".$Email."<br>";
		echo "เบอร์โทร: ".$Phone."<br>";
		echo "ชื่อผู้ใช้งาน: ".$Username."<br>";
		echo "รหัสผู้ใช้งาน: ".$Password."<br>";
		echo "รหัสประจำตัว: ".$UniCode."<br>";
		echo "สถานะ: ".$Position."<br>";
        echo "คณะ: ".$Faculty."<br>";
        echo "สาขา: ".$Branch."<br>";

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
	  
              
              &nbsp;&nbsp;<center><div align="center"></div> <a href="edit_Person.php?Person_Id=<?=$Person_Id;?>"><img src="image/editcus.png" width="120" height="33" border="0" /></a> </div></center>
             &nbsp;&nbsp;<center><div align="center"></div> <a href="edit_Password.php?Person_Id=<?=$Person_Id;?>"><img src="image/editpass.png" width="120" height="33" border="0" /></a> </div></center>
			 <!--&nbsp;&nbsp;<center><div align="center"></div> <a href="page2.php?Person_Id=<?=$Person_Id;?>"><img src="image/cancel.png" width="120" height="33" border="0" /></a> </div></center>-->
            <center><a href="page2.php"><img src="image/cancel.png" width="120" height="33" border="0" /></a> </div></center></a></p><p>
			</label></td>
			
          </tr>
<tr>
              <td bgcolor="#FF6666" colspan = "8" height = "40"><div align="center"><strong>มหาวิทยาลัยบูรพา  วิทยาเขตสระแก้ว 2016</strong></div></td>
        </tr>
      </table>
	  </td>
	  
		</tr>
        </table>
		</td>	

	  
  </tr>
</table>

  