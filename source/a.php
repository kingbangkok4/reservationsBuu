<?
 session_start();
if($_SESSION["strUsername"] ==  null){
 //header("location: index.php");
 exit(); 
 }
 ?>

<body bgcolor=#FFCC99>

<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">  
  <tr align="center"> 
  <td width="100%" colspan="2">
<?php include"header.php";?>
</td>
  </tr > 
  <tr align="center"> 
  <td width="15%" >
<?php include"menu_person_3.php";?>
</td>


<td width="75%" >
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr> 
  

 <td width="80%" valign="top">
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFCC66" id="details1">		
		<tr height="50">
<td colspan="8" height = "40" bgcolor="#FF6666"><div align="center"><strong><font size = "5">จัดการข้อมูลสินค้า</font></strong></div></td>		  
        </tr> 
	
		<form method="post" action="" >

		<tr>
              <td>&nbsp;</td>
        </tr>
	
            <tr bgcolor="#FFB6C1">
				<td align="right">เพิ่มข้อมูล :&nbsp;</td>	
				<td>
					<a href="add_data_product.php"><button type="button" name="button" id="button"><img src="image/add.png" title="ปุ่มเพิ่มข้อมูล" /> </button> 
				</td>				
            </tr>
		</form>		

		
		<form method="post" action="" >
		<table width="1000" border="1" bordercolor="#FF9999" align="center" cellpadding="0" cellspacing="0" >
        <tr>
          <td width="" bgcolor="#FF6666"><div align="center">id</div></td>
          <td width="" bgcolor="#FF6666"><div align="center">Code</div></td>  	  
          <td width="" bgcolor="#FF6666"><div align="center">ชื่อสินค้า</div></td>
          <td width="" bgcolor="#FF6666"><div align="center">ราคา</div></td> 
		  <td width="" bgcolor="#FF6666"><div align="center">สินค้าคงเหลือ</div></td>
		  <td width="" bgcolor="#FF6666"><div align="center">รูปภาพ</div></td>
		  <td width="" bgcolor="#FF6666"><div align="center"></div></td>	
          <td width="" bgcolor="#FF6666"><div align="center">แก้ไข</div></td>
		  <td width="" bgcolor="#FF6666"><div align="center">ลบ</div></td>
		</tr>
	
	<?php
					
$dbhost="localhost"; 
$dbuser="root";  
$dbpass="1234";
$dbname="project";
mysql_connect($dbhost,$dbuser,$dbpass) or die("MySQL connect failed");
mysql_select_db($dbname) or die("MySQL select database failed");
mysql_query("SET NAMES UTF8 ") or die (mysql_error());
		$sql = "select * from product where Product_Id ";
		$result = mysql_query($sql) or die (mysql_error());	
		while ($row = mysql_fetch_array($result)) {
	?>	
	
			</td>
		</tr>		
        		 
		<tr>
			<td>&nbsp;</td>
		</tr>
<tr>
          <td align="center"><?=$row["Product_Id"]?></td>		  
          <td align="center"><?=$row["Product_Code"]?></td>
		  <td align="center"><?=$row["Product_Name"]?></td>
          <td align="center"><?=$row["Product_Price"]?></td>
          <td align="center"><?=$row["Product_Stock"]?></td> 
		  <td colspan ="2" align="center"><img src="image/<?=$row["Product_Picture"]?>" width="65" height="80"></td>	
          	
		<td align="center"><a href="edit_product.php?Product_Id=<?=$row["Product_Id"]?>"><img src="image/ed.png" width="24" height="24" border="0" /></a></td>
        <td align="center"><a href="delete_product.php?Product_Id=<?=$row["Product_Id"]?>" onclick="return confirm ('ยืนยันการลบข้อมูล') "><img src="image/Delete_Icon.png" width="24" height="24" border="0" /></a></td>
</tr>			

	        
<?
}
?>	

		

</table>
</form>	
 		
	</table>
	  </td>
  </tr>	
  

<tr>
              <td bgcolor="#FFDAB9" colspan = "8" height = "40"><div align="center"><strong>มหาวิทยาลัยบูรพา  วิทยาเขตสระแก้ว </strong></div></td>
        </tr>
      </table>
	  </td>
	</td>
  </tr>
  </body>
</table>
	
