<?php
session_start ();
include ("layout.php");
include ("config.php");
?>
<div id="kk-content">
	<div class="w3-container">

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 

    <td width="100%" valign="top">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#E57373" id="details1">		
		<tr height="50">
<td colspan="8" height = "40" bgcolor="#E57373"><div align="center"><strong><font size = "5">จัดการเจ้าหน้าที่</font></strong></div></td>			  
        </tr> 
		
		
<form method="post" action="" >
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >		
		<tr>
              <td>&nbsp;</td>
        </tr>
            <tr bgcolor="#E57373">
				<td valign="top" bgcolor="#E57373" align="">&nbsp;ค้นหาชื่อ-สกุล (จากบางคำ):</td>
				<td align="center" width=""><input type="text" name="idper" id="idper" /></td>
				<td align="left">
					<button type="submit" name="search" id="button"><img src="image/5search.png" title="ปุ่มค้นหาชื่อลบุคลากร " /> </button>
				</td> 				
				
				<td valign="top" bgcolor="#E57373" align="right">เพิ่มเจ้าหน้าที่:&nbsp;</td>	
				<td align="left" valign="top" bgcolor="#E57373">
					<a href="add_mrg_staff.php"><button type="button" name="button" id="button"><img src="image/9add.png" title="ปุ่มเพิ่มข้อมูลบุคลากร" /> </button> 
				</td>				
            </tr>
				
</table>
</form>	

 <form method="post" action="" >
<table width="100%" border="1" bordercolor="#E57373" align="center" cellpadding="0" cellspacing="0" >
        <tr>
          <td width="" bgcolor="#EF9A9A"><div align="center">id</div></td>
          <td width="" bgcolor="#EF9A9A"><div align="center">ชื่อผู้ใช้งาน</div></td>  	  
          <td width="" bgcolor="#EF9A9A"><div align="center">รหัสผ่าน</div></td>
          <td width="" bgcolor="#EF9A9A"><div align="center">ชื่อ - นามสกุล</div></td> 
		  <!--<td width="" bgcolor="#FF9900"><div align="center">วันเดือนปีเกิด</div></td>-->
          <td width="" bgcolor="#EF9A9A"><div align="center">เบอร์โทร</div></td>
          <!--<td width="" bgcolor="#FF9900"><div align="center">อีเมล์</div></td>--> 	
          <!--<td width="" bgcolor="#FF9900"><div align="center">สถานะ</div></td>-->
          <!--<td width="" bgcolor="#FF9900"><div align="center">รหัสประจำตัว</div></td>-->
          <td width="" bgcolor="#EF9A9A"><div align="center">คณะ</div></td> 	
          <td width="" bgcolor="#EF9A9A"><div align="center">สาขา</div></td> 	
          <td width="" bgcolor="#EF9A9A"><div align="center">แก้ไข</div></td>	
          <td width="" bgcolor="#EF9A9A"><div align="center">แก้ไขรหัสผ่าน</div></td>
          <td width="" bgcolor="#EF9A9A"><div align="center">ลบ</div></td>
        </tr>
	
<?php
$idper=$_POST[idper];	
if($idper == ""){

mysql_connect($dbhost,$dbuser,$dbpass) or die("MySQL connect failed");
mysql_select_db($dbname) or die("MySQL select database failed");
mysql_query("SET NAMES UTF8 ") or die (mysql_error());

	
		$sql = "select * from person  where Person_Fname like '%$idper%' and Person_Position='staff'";
		//ของstaff จัดการข้อมูลนิสิต และอาจารย์ $sql = "select * from person  where Person_Fname like '%$idper%' and Person_Position='student' and Person_Position='teacher'";
		$result = mysql_query($sql) or die (mysql_error());
		$num_rows = mysql_num_rows($result);
		
		$row = mysql_num_rows($result);		
				$Per_Page = 10;   // Per Page
				$Page = $_GET["Page"];
				if(!$_GET["Page"])
					{$Page=1;}
				$Prev_Page = $Page-1;
				$Next_Page = $Page+1; 
				$Page_Start = (($Per_Page*$Page)-$Per_Page);
				if($row<=$Per_Page)
					{$Num_Pages =1;}
				else if(($row % $Per_Page)==0)
					{$Num_Pages =($row/$Per_Page) ;}
				else
					{$Num_Pages =($row/$Per_Page)+1;
					$Num_Pages = (int)$Num_Pages;}
					
				$sql .=" order  by Person_Id ASC LIMIT $Page_Start , $Per_Page";
				//echo $sql;
				$result  = mysql_query($sql);
?>
	<?
	while ($row = mysql_fetch_array($result)) {
		
	$strSQLfaculty = "SELECT * FROM faculty WHERE Fac_Id='".$row[Fac_Id]."'";
	$objQueryfaculty = mysql_query($strSQLfaculty);
	$objResultfaculty = mysql_fetch_array($objQueryfaculty);
	$Faculty=$objResultfaculty[Fac_Name];
	
	$strSQLbranch = "SELECT * FROM branch WHERE Branch_Id='".$row[Branch_Id]."'";
	$objQuerybranch = mysql_query($strSQLbranch);
	$objResultbranch = mysql_fetch_array($objQuerybranch);
	$Branch=$objResultbranch[Branch_Name];
		
	?>	
        <tr>
          <td align="center"><?=$row["Person_Id"]?></td>		  
          <td align="center"><?=$row["Person_Username"]?></td>
          <td align="center"><?=$row["Person_Password"]?></td>
          <td align="center"><?=$row["Title_Id"]?> <?=$row["Person_Fname"]?> <?=$row["Person_Lname"]?></td>
          <!--<td align="center"><?=$row["Person_Birthday"]?></td>-->
          <td align="center"><?=$row["Person_Phone"]?></td>		  
          <!--<td align="center"><?=$row["Person_email"]?></td>-->		
          <!--<td align="center"><?=$row["Person_Position"]?></td>-->		    
          <!--<td align="center"><?=$row["Person_UniversityCode"]?></td>-->		  	    
          <td align="center"><?=$Faculty?></td>		  
          <td align="center"><?=$Branch?></td>		  



		  
          <td align="center"><a href="edit_mrg_staff.php?Person_Id=<?=$row["Person_Id"]?>"><img src="image/3edit.png" width="24" height="24" border="0" /></a></td>
          <td align="center"><a href="edit_mrg_staff_password.php?Person_Id=<?=$row["Person_Id"]?>"><img src="image/3edit.png" width="24" height="24" border="0" /></a></td>
          <td align="center"><a href="delete_mrg.php?Person_Id=<?=$row["Person_Id"]?>" onclick="return confirm ('ยืนยันการลบข้อมูลบุคลากร') "><img src="image/4del.png" width="24" height="24" border="0" /></a></td>
        </tr>
	<?php
	}?>
				<tr><td colspan="10" align = "right">
							<br>
							Total <?php echo $num_rows;?> Record : <?php echo $Num_Pages;?> Page :
							<?php
							if($Prev_Page)
								{echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page'><< Back</a> ";}
							for($i=1; $i<=$Num_Pages; $i++){
								if($i != $Page)
									{echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i'>$i</a> ]";}
								else
									{echo "<b> $i </b>";}}
									if($Page!=$Num_Pages)
										{echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page'>Next>></a> ";}
							?>		
				</td></tr>	
<?	
}else{

mysql_connect($dbhost,$dbuser,$dbpass) or die("MySQL connect failed");
mysql_select_db($dbname) or die("MySQL select database failed");
mysql_query("SET NAMES UTF8 ") or die (mysql_error());

		$idper=$_POST['idper'];
		$result = mysql_query("select * from person  where Person_Fname like '%$idper%' order by Person_Id ASC ");
		$num=mysql_num_rows($result);
	
if(mysql_num_rows($result)==0) {
echo "<script>alert('ไม่พบข้อมูลที่ต้องการค้นหา')</script>";
}		
		
	while ($row = mysql_fetch_array($result)) {
		
	$strSQLfaculty = "SELECT * FROM faculty WHERE Fac_Id='".$row[Fac_Id]."'";
	$objQueryfaculty = mysql_query($strSQLfaculty);
	$objResultfaculty = mysql_fetch_array($objQueryfaculty);
	$Faculty=$objResultfaculty[Fac_Name];
	
	$strSQLbranch = "SELECT * FROM branch WHERE Branch_Id='".$row[Branch_Id]."'";
	$objQuerybranch = mysql_query($strSQLbranch);
	$objResultbranch = mysql_fetch_array($objQuerybranch);
	$Branch=$objResultbranch[Branch_Name];
		
	?>	
        <tr>
          <td align="center"><?=$row["Person_Id"]?></td>		  
          <td align="center"><?=$row["Person_Username"]?></td>
          <td align="center"><?=$row["Person_Password"]?></td>
          <td align="center"><?=$row["Title_Id"]?> <?=$row["Person_Fname"]?> <?=$row["Person_Lname"]?></td>
          <!--<td align="center"><?=$row["Person_Birthday"]?></td>-->
          <td align="center"><?=$row["Person_Phone"]?></td>		  
          <!--<td align="center"><?=$row["Person_email"]?></td>-->		
          <!--<td align="center"><?=$row["Person_Position"]?></td>-->		    
          <!--<td align="center"><?=$row["Person_UniversityCode"]?></td>-->		  	    
          <td align="center"><?=$Faculty?></td>		  
          <td align="center"><?=$Branch?></td>		  



		  
 		  
          <td align="center"><a href="edit_mrg_staff.php?Person_Id=<?=$row["Person_Id"]?>"><img src="image/3edit.png" width="24" height="24" border="0" /></a></td>
          <td align="center"><a href="edit_mrg_staff_password.php?Person_Id=<?=$row["Person_Id"]?>"><img src="image/3edit.png" width="24" height="24" border="0" /></a></td>
          <td align="center"><a href="delete_mrg.php?Person_Id=<?=$row["Person_Id"]?>" onclick="return confirm ('ยืนยันการลบข้อมูลบุคลากร') "><img src="image/4del.png" width="24" height="24" border="0" /></a></td>
         </tr>
	<?php
	}
	
	?>
		<tr><td colspan="10" align = "right"><br>
		<? echo	"Search &nbsp; ชื่อ-สกุล  &nbsp; '$idper' &nbsp; Show &nbsp;  $num  &nbsp;Record	&nbsp;"; ?>	
		</td></tr>
<?
		
}
?>  
</table>
</form>		  
	  
	  


	  
      </table>
	  </td>

  </tr>
</table>


</div>
</div>

