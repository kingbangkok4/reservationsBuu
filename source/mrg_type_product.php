<?php
session_start ();
include ("layout.php");
include ("config.php");
?>
<div id="kk-content">
	<div class="w3-container">
<br />
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 

    <td width="100%" valign="top">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#64B5F6" id="details1">		
		<tr height="50">
<td colspan="8" height = "40" bgcolor="#64B5F6"><div align="center"><strong><font size = "5">จัดการประเภทสินค้า</font></strong></div></td>			  
        </tr> 
		
		
<form method="post" action="" >
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >		
		<tr>
              <td>&nbsp;</td>
        </tr>
            <tr bgcolor="#64B5F6">
				<td valign="top" bgcolor="#64B5F6" align="">&nbsp;ค้นหาชื่อสินค้า(จากบางคำ):</td>
				<td align="center" width=""><input type="text" name="idper" id="idper" /></td>
				<td align="left">
					<button type="submit" name="search" id="button"><img src="image/search.png" title="ปุ่มค้นหา " /> </button>
				</td> 				
				
				<td valign="top" bgcolor="#64B5F6" align="right">เพิ่มข้อมูล :&nbsp;</td>	
				<td align="left" valign="top" bgcolor="#64B5F6">
					<a href="add_type_product.php"><button type="button" name="button" id="button"><img src="image/add.png" title="ปุ่มเพิ่มข้อมูล" /> </button> 
				</td>				
            </tr>
				
</table>
</form>	

 <form method="post" action="" >
<table width="100%" border="1" bordercolor="#64B5F6" align="center" cellpadding="0" cellspacing="0" >
        <tr>
          <td width="" bgcolor="#90CAF9"><div align="center">id</div></td>
          <td width="" bgcolor="#90CAF9"><div align="center">ชื่อประเภทสินค้า</div></td>  	  
          <td width="" bgcolor="#90CAF9"><div align="center">แก้ไข</div></td>	
          <td width="" bgcolor="#90CAF9"><div align="center">ลบ</div></td>
        </tr>
	
<?php
$idper=$_POST[idper];	
if($idper == ""){

mysql_connect($dbhost,$dbuser,$dbpass) or die("MySQL connect failed");
mysql_select_db($dbname) or die("MySQL select database failed");
mysql_query("SET NAMES UTF8 ") or die (mysql_error());


		//$sql = "select * from person  where Person_Fname like '%$idper%' and Person_Position='staff'";
		//ของstaff จัดการข้อมูลนิสิต และอาจารย์ 
		$sql = "select * from type_product  where TypeP_Nametype Like '%$idper%' ";
		
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
					
				$sql .=" order  by TypeP_Id ASC LIMIT $Page_Start , $Per_Page";
				//echo $sql;
				$result  = mysql_query($sql);
?>
	<?
	while ($row = mysql_fetch_array($result)) {
		
		
	?>	
        <tr>
          <td align="center"><?=$row["TypeP_Id"]?></td>		  
          <td align="center"><?=$row["TypeP_Nametype"]?></td>



		  
          <td align="center"><a href="edit_mrg_type_product.php?TypeP_Id=<?=$row["TypeP_Id"]?>"><img src="image/ed.png" width="24" height="24" border="0" /></a></td>
          <td align="center"><a href="delete_type_product.php?TypeP_Id=<?=$row["TypeP_Id"]?>" onclick="return confirm ('ยืนยันการลบข้อมูลบุคลากร') "><img src="image/Delete_Icon.png" width="24" height="24" border="0" /></a></td>
        </tr>
	<?php
	}?>
				<tr><td colspan="8" align = "right">
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
		$sql = "select * from type_product  where TypeP_Nametype Like '%$idper%' ";
		$result = mysql_query($sql) or die (mysql_error());
		$num=mysql_num_rows($result);
	
if(mysql_num_rows($result)==0) {
echo "<script>alert('ไม่พบข้อมูลที่ต้องการค้นหา')</script>";
}		
		
	while ($row = mysql_fetch_array($result)) {
	?>	
        <tr>
          <td align="center"><?=$row["TypeP_Id"]?></td>		  
          <td align="center"><?=$row["TypeP_Nametype"]?></td>



		  
 		  
          <td align="center"><a href="edit_mrg_type_product.php?TypeP_Id=<?=$row["TypeP_Id"]?>"><img src="image/ed.png" width="24" height="24" border="0" /></a></td>
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
</table>
<br />

</div>
</div>

