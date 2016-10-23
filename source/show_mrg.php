<?
 session_start();
if($_SESSION["strUsername"] ==  null){
 //header("location: index.php");
 exit(); 
 }
 include("config.php");
 ?>
  


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
  
  
  
    <td width="80%" valign="top">
<table width="750" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFCC66" id="details1">		
		<tr height="50">
<td colspan="8" height = "40" bgcolor="#FF9900"><div align="center"><strong><font size = "5">จัดการข้อมูลบุคลากร</font></strong></div></td>			  
        </tr> 
		
		
<form method="post" action="" >
<table width="750" border="0" align="center" cellpadding="0" cellspacing="0" >		
		<tr>
              <td>&nbsp;</td>
        </tr>
            <tr bgcolor="#00ff66">
				<td valign="top" bgcolor="#00ff66" align="">&nbsp;ค้นหาชื่อ-สกุล (จากบางคำ):</td>
				<td align="center" width=""><input type="text" name="idper" id="idper" /></td>
				<td align="left">
					<button type="submit" name="search" id="button"><img src="img/5search.png" title="ปุ่มค้นหาชื่อลบุคลากร " /> </button>
				</td> 				
				
				<td valign="top" bgcolor="#00ff66" align="right">เพิ่มข้อมูลบุคลากร :&nbsp;</td>	
				<td align="left" valign="top" bgcolor="#00ff66">
					<a href="per_add_form.php"><button type="button" name="button" id="button"><img src="img/9add.png" title="ปุ่มเพิ่มข้อมูลบุคลากร" /> </button> 
				</td>				
            </tr>
				
</table>
</form>	

 <form method="post" action="" >
<table width="750" border="1" bordercolor="#FFCC66" align="center" cellpadding="0" cellspacing="0" >
        <tr>
          <td width="6%" bgcolor="#FF9900"><div align="center">id</div></td>
          <td width="13%" bgcolor="#FF9900"><div align="center">ชื่อผู้ใช้งาน</div></td>  	  
          <td width="13%" bgcolor="#FF9900"><div align="center">รหัสผ่าน</div></td>
          <td width="27%" bgcolor="#FF9900"><div align="center">ชื่อ - นามสกุล</div></td> 
          <td width="13%" bgcolor="#FF9900"><div align="center">เบอร์โทร</div></td>
          <td width="27%" bgcolor="#FF9900"><div align="center">ระดับผู้ใช้งาน</div></td> 		  
          <td width="7%" bgcolor="#FF9900"><div align="center">แก้ไข</div></td>
          <td width="7%" bgcolor="#FF9900"><div align="center">ลบ</div></td>
        </tr>
	
<?php
$idper=$_POST[idper];	
if($idper == ""){

mysql_connect($dbhost,$dbuser,$dbpass) or die("MySQL connect failed");
mysql_select_db($dbname) or die("MySQL select database failed");
mysql_query("SET NAMES UTF8 ") or die (mysql_error());
		
		$sql = "select * from person  where Person_Fname like '%$idper%'";
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
					
				$sql .=" order  by per_id ASC LIMIT $Page_Start , $Per_Page";
				$result  = mysql_query($sql);
?>
	<?
	while ($row = mysql_fetch_array($result)) {
	?>	
        <tr>
          <td align="center"><?=$row["per_id"]?></td>		  
          <td align="center"><?=$row["per_username"]?></td>
          <td align="center"><?=$row["per_password"]?></td>
          <td align="center"><?=$row["per_name"]?></td>
          <td align="center"><?=$row["per_tel"]?></td>
          <td align="center"><?=$row["level_name"]?></td>		  



		  
          <td align="center"><a href="per_edit_form.php?per_id=<?=$row["per_id"]?>"><img src="img/3edit.png" width="24" height="24" border="0" /></a></td>
          <td align="center"><a href="per_delete.php?per_id=<?=$row["per_id"]?>" onclick="return confirm ('ยืนยันการลบข้อมูลบุคลากร') "><img src="img/4del.png" width="24" height="24" border="0" /></a></td>
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
				
	include "include/connect.php";
		$idper=$_POST['idper'];
		$result = mysql_query("select * from personal per,level lev where per.per_level=lev.per_level and per_name like '%$idper%' and per.per_id != '$sess_id' order by per_id ASC ");
		$num=mysql_num_rows($result);
	
if(mysql_num_rows($result)==0) {
echo "<script>alert('ไม่พบข้อมูลที่ต้องการค้นหา')</script>";
}		
		
	while ($row = mysql_fetch_array($result)) {
	?>	
        <tr>
          <td align="center"><?=$row["per_id"]?></td>		  
          <td align="center"><?=$row["per_username"]?></td>
          <td align="center"><?=$row["per_password"]?></td>
          <td align="center"><?=$row["per_name"]?></td>
          <td align="center"><?=$row["per_tel"]?></td>
          <td align="center"><?=$row["level_name"]?></td>		  



		  
 		  
          <td align="center"><a href="per_edit_form.php?per_id=<?=$row["per_id"]?>"><img src="img/3edit.png" width="24" height="24" border="0" /></a></td>
          <td align="center"><a href="per_delete.php?per_id=<?=$row["per_id"]?>" onclick="return confirm ('ยืนยันการลบข้อมูลบุคลากร') "><img src="img/4del.png" width="24" height="24" border="0" /></a></td>
         </tr>
	<?php
	}
	
	?>
		<tr><td colspan="8" align = "right"><br>
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
  		<tr>
              <td bgcolor="#FFDAB9" colspan = "8" height = "40"><div align="center"><strong><<มหาวิทยาลัยบูรพา  วิทยาเขตสระแก้ว>> </strong></div></td>
        </tr>
</table>
   