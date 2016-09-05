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
<?php include"menu_person_3.php";?>
</td>
  <td width="75%" >
  
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr> 

    <td width="80%" valign="top">
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFCC66" id="details1">		
		<tr height="50">
<td colspan="8" height = "40" bgcolor="#FF6666"><div align="center"><strong><font size = "5">จัดการประเภทสินค้า</font></strong></div></td>			  
        </tr> 
		
		
<form method="post" action="" >
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0" >		
		<tr>
              <td>&nbsp;</td>
        </tr>
            <tr bgcolor="#FFB6C1">
				<td valign="top" bgcolor="#FFB6C1" align="">&nbsp;ค้นหาชื่อสินค้า(จากบางคำ):</td>
				<td align="center" width=""><input type="text" name="idper" id="idper" /></td>
				<td align="left">
					<button type="submit" name="search" id="button"><img src="image/search.png" title="ปุ่มค้นหา " /> </button>
				</td> 				
				
				<td valign="top" bgcolor="#FFB6C1" align="right">เพิ่มข้อมูล :&nbsp;</td>	
				<td align="left" valign="top" bgcolor="#FFB6C1">
					<a href="add_type_product.php"><button type="button" name="button" id="button"><img src="image/add.png" title="ปุ่มเพิ่มข้อมูล" /> </button> 
				</td>				
            </tr>
				
</table>
</form>	

 <form method="post" action="" >
<table width="900" border="1" bordercolor="#FF9999" align="center" cellpadding="0" cellspacing="0" >
        <tr>
          <td width="" bgcolor="#FF6666"><div align="center">id</div></td>
          <td width="" bgcolor="#FF6666"><div align="center">ชื่อประเภทสินค้า</div></td>  	  
          <!--<td width="" bgcolor="#FF6666"><div align="center">รหัสผ่าน</div></td>-->
          <!--<td width="" bgcolor="#FF6666"><div align="center">ชื่อ - นามสกุล</div></td> -->
		  <!--<td width="" bgcolor="#FF9900"><div align="center">วันเดือนปีเกิด</div></td>-->
         <!-- <td width="" bgcolor="#FF6666"><div align="center">เบอร์โทร</div></td>-->
          <!--<td width="" bgcolor="#FF9900"><div align="center">อีเมล์</div></td>--> 	
          <!--<td width="" bgcolor="#FF9900"><div align="center">สถานะ</div></td>-->
          <!--<td width="" bgcolor="#FF9900"><div align="center">รหัสประจำตัว</div></td>-->
          <!--<td width="" bgcolor="#FF6666"><div align="center">คณะ</div></td> -->	
          <!--<td width="" bgcolor="#FF6666"><div align="center">สาขา</div></td> 	-->
          <td width="" bgcolor="#FF6666"><div align="center">แก้ไข</div></td>	
          <!--<td width="" bgcolor="#FF6666"><div align="center">แก้ไขรหัสผ่าน</div></td>-->
          <td width="" bgcolor="#FF6666"><div align="center">ลบ</div></td>
        </tr>
	
<?php
$idper=$_POST[idper];	
if($idper == ""){

$dbhost="localhost"; 
$dbuser="root";  
$dbpass="1234";
$dbname="project";
mysql_connect($dbhost,$dbuser,$dbpass) or die("MySQL connect failed");
mysql_select_db($dbname) or die("MySQL select database failed");
mysql_query("SET NAMES UTF8 ") or die (mysql_error());


		//$sql = "select * from person  where Person_Fname like '%$idper%' and Person_Position='staff'";
		//ของstaff จัดการข้อมูลนิสิต และอาจารย์ 
		$sql = "select * from type_product  where TypeP_Nametype Like '%$idper%' ";
		
		$result = mysql_query($sql) or die (mysql_error());
		
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
					
				$sql .=" order  by TypeP_Id ASC LIMIT $Page_Start , $Per_Page";
				//echo $sql;
				$result  = mysql_query($sql);
?>
	<?
	while ($row = mysql_fetch_array($result)) {
		
	//$strSQLtype_product = "SELECT * FROM type_product WHERE TypeP_Id='".$row[TypeP_Id]."'";
	//$objQuerytype_product = mysql_query($strSQLtype_product);
	//$objResulttype_product= mysql_fetch_array($objQuerytype_product);
	//$type_product=$objResulttype_product[TypeP_Nametype];
	
	//$strSQLbranch = "SELECT * FROM branch WHERE Branch_Id='".$row[Branch_Id]."'";
	//$objQuerybranch = mysql_query($strSQLbranch);
	//$objResultbranch = mysql_fetch_array($objQuerybranch);
	//$Branch=$objResultbranch[Branch_Name];
		
	?>	
        <tr>
          <td align="center"><?=$row["TypeP_Id"]?></td>		  
          <td align="center"><?=$row["TypeP_Nametype"]?></td>
         <!-- <td align="center"><?=$row["Person_Password"]?></td>-->
          <!--<td align="center"><?=$row["Title_Id"]?> <?=$row["Person_Fname"]?> <?=$row["Person_Lname"]?></td>-->
          <!--<td align="center"><?=$row["Person_Birthday"]?></td>-->
          <!--<td align="center"><?=$row["Person_Phone"]?></td>	-->	  
          <!--<td align="center"><?=$row["Person_email"]?></td>-->		
          <!--<td align="center"><?=$row["Person_Position"]?></td>-->		    
          <!--<td align="center"><?=$row["Person_UniversityCode"]?></td>-->		  	    
          <!--<td align="center"><?=$Faculty?></td>	-->	  
          <!--<td align="center"><?=$Branch?></td>	-->	  



		  
          <td align="center"><a href="edit_type_product.php?TypeP_Id=<?=$row["TypeP_Id"]?>"><img src="image/ed.png" width="24" height="24" border="0" /></a></td>
         <!-- <td align="center"><a href="edit_person_password.php?Person_Id=<?=$row["Person_Id"]?>"><img src="image/pass.png" width="24" height="24" border="0" /></a></td>-->
          <td align="center"><a href="delete_type_product.php?TypeP_Id=<?=$row["TypeP_Id"]?>" onclick="return confirm ('ยืนยันการลบข้อมูลบุคลากร') "><img src="image/Delete_Icon.png" width="24" height="24" border="0" /></a></td>
        </tr>
	<?php
	}?>
				<tr><td colspan="8" align = "right">
							<br>
							Total <?php echo $row;?> Record : <?php echo $Num_Pages;?> Page :
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
				
$dbhost="localhost"; 
$dbuser="root";  
$dbpass="1234";
$dbname="project";
mysql_connect($dbhost,$dbuser,$dbpass) or die("MySQL connect failed");
mysql_select_db($dbname) or die("MySQL select database failed");
mysql_query("SET NAMES UTF8 ") or die (mysql_error());

		$idper=$_POST['idper'];
		$sql = "select * from type_product  where TypeP_Nametype Like '%$idper%' ";
		$result = mysql_query($sql) or die (mysql_error());
		$num=mysql_num_rows($result);
	
if(mysql_num_rows($result)==0) {
echo "<script>alert('ไม่พบข้อมูลที่ต้องการค้นหา')</script>";
}		
		
	while ($row = mysql_fetch_array($result)) {
		
	//$strSQLfaculty = "SELECT * FROM faculty WHERE Fac_Id='".$row[Fac_Id]."'";
	//$objQueryfaculty = mysql_query($strSQLfaculty);
	//$objResultfaculty = mysql_fetch_array($objQueryfaculty);
	//$Faculty=$objResultfaculty[Fac_Name];
	
	//$strSQLbranch = "SELECT * FROM branch WHERE Branch_Id='".$row[Branch_Id]."'";
	//$objQuerybranch = mysql_query($strSQLbranch);
	//$objResultbranch = mysql_fetch_array($objQuerybranch);
	//$Branch=$objResultbranch[Branch_Name];
		
	?>	
        <tr>
          <td align="center"><?=$row["TypeP_Id"]?></td>		  
          <td align="center"><?=$row["TypeP_Nametype"]?></td>
          <!--<td align="center"><?=$row["Person_Password"]?></td>-->
          <!--<td align="center"><?=$row["Title_Id"]?> <?=$row["Person_Fname"]?> <?=$row["Person_Lname"]?></td>-->
          <!--<td align="center"><?=$row["Person_Birthday"]?></td>-->
          <!--<td align="center"><?=$row["Person_Phone"]?></td>	-->	  
          <!--<td align="center"><?=$row["Person_email"]?></td>-->		
          <!--<td align="center"><?=$row["Person_Position"]?></td>-->		    
          <!--<td align="center"><?=$row["Person_UniversityCode"]?></td>-->		  	    
         <!-- <td align="center"><?=$Faculty?></td>-->
          <!--<td align="center"><?=$Branch?></td>--> 



		  
 		  
          <td align="center"><a href="edit_type_product.php?TypeP_Id=<?=$row["TypeP_Id"]?>"><img src="image/ed.png" width="24" height="24" border="0" /></a></td>
         <!--<td align="center"><a href="edit_person_password.php?Person_Id=<?=$row["Person_Id"]?>"><img src="image/pass.png" width="24" height="24" border="0" /></a></td>-->
          <td align="center"><a href="delete_type_product.php?TypeP_Id=<?=$row["TypeP_Id"]?>" onclick="return confirm ('ยืนยันการลบข้อมูลบุคลากร') "><img src="image/Delete_Icon.png" width="24" height="24" border="0" /></a></td>
         </tr>
	<?php
	}
	
	?>
		<tr><td colspan="8" align = "right"><br>
		<? echo	"Search &nbsp; ชื่อสินค้า  &nbsp; '$idper' &nbsp; Show &nbsp;  $num  &nbsp;Record	&nbsp;"; ?>	
		</td></tr>
<?
		
}
?>  






	  
</table>
</form>		  
	  
	  


	  
      </table>
	  </td>

  </tr>
  		<tr>
              <td bgcolor="#FF9999" colspan = "8" height = "40"><div align="center"><strong>มหาวิทยาลัยบูรพา  วิทยาเขตสระแก้ว 2016</strong></div></td>
        </tr>
</table>

</td>
  </tr>  
</table>
   


</body>
</head>
</html>

</table>	
</body>