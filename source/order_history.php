<?
 session_start();
if($_SESSION["strUsername"] ==  null){
 //header("location: index.php");
 exit(); 
 }
 include("config.php");
 ?>
  
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
<?php include"menu_staff.php";?>
</td>
  <td width="75%" >
  
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr> 

    
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FF3333" id="details1">		
		
<td colspan="8" height = "40" bgcolor="#FF99CC"><div align="center"><strong><font size = "5">จัดการประวัติสั่งซื้อ</font></strong></div></td>			  
       
	

 <form method="post" action="" >
<table width="900" border="1" bordercolor="#000000" align="center" cellpadding="0" cellspacing="0" >
        <tr>
          
          <td width="" bgcolor="#FF9999"><div align="center">ชื่อ-นามสกุลผู้สั่ง</div></td>  	  
          <td width="" bgcolor="#FF9999"><div align="center">รายการที่สั่ง</div></td>
          <td width="" bgcolor="#FF9999"><div align="center">จำนวน</div></td> 
          <td width="" bgcolor="#FF9999"><div align="center">ราคา</div></td> 	
          <td width="" bgcolor="#FF9999"><div align="center">วันเดือนปีที่สั่ง</div></td> 	
         
        </tr>
       
	<?php
	mysql_connect($dbhost,$dbuser,$dbpass) or die("MySQL connect failed");
	mysql_select_db($dbname) or die("MySQL select database failed");
	mysql_query("SET NAMES UTF8 ") or die (mysql_error());
	?>	
	<tr>
          <td align="center"><?=$row["per_id"]?></td>		  
          <td align="center"><?=$row["per_username"]?></td>
          <td align="center"><?=$row["per_password"]?></td>
          <td align="center"><?=$row["per_name"]?></td>
          <td align="center"><?=$row["per_tel"]?></td>
          


		  
          




</table>
</head>
</html>