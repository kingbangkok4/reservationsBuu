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
<head>
<title>ระบบสั่งจองสินค้าในมหาลัยบูรพา วิทยาเขตสระแก้ว</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
 
<table width="100%" border="1">
  <tr>
  
    <td colspan="2"><div align="center">

	<!-- Header -->
	<?php include("header.php"); ?><br> 
	<b>อุปกรณ์นิสิต</b>
<TABLE Border=1>  
<br>  <br> 
<TR> 
     
<TD> <img src="./image/กระดุม.jpg"  /><br><center>กระดุม  1 ชุด จำนวน 5 เม็ด</center> <center>25.00 บาท</center>
	<a class="btn btn-primary btn-lg" href="order.php?Product_Id=1" role="button">
	<span class="glyphicon glyphicon-shopping-cart"></span><div align="center"> หยิบใส่ตะกร้า</div></a>
</TD>   

<TD> <img src="./image/หัวเข็มขัด .jpg" /><center>หัวเข็มขัด (ตามชั้นปี)</center> <center>35.00 บาท</center>
	<a class="btn btn-primary btn-lg" href="order.php?Product_Id=1" role="button">
	<span class="glyphicon glyphicon-shopping-cart"></span><div align="center"> หยิบใส่ตะกร้า</div></a>
</TD>  
   	
<TD> <img src="./image/0.png" /> <center>หัวเข็มขัด (ตามชั้นปี)</center> <center>35.00 บาท</center> 
	<a class="btn btn-primary btn-lg" href="order.php?Product_Id=1" role="button">
	<span class="glyphicon glyphicon-shopping-cart"></span><div align="center"> หยิบใส่ตะกร้า</div></a>
</TD>  
  
<TD> <img src="./image/00.png" /> <center>หัวเข็มขัด (ตามชั้นปี)</center> <center>35.00 บาท</center> 
	<a class="btn btn-primary btn-lg" href="order.php?Product_Id=1" role="button">
	<span class="glyphicon glyphicon-shopping-cart"></span><div align="center"> หยิบใส่ตะกร้า</div></a>
</TD>    
</TR>      

<TR>      
<TD> Cell D </TD>      
<TD> Cell E </TD>      
<TD> Cell F </TD> 
<TD> Cell F </TD>      
</TR>      
</TABLE>     



 
</td>
</tr>
</table>
</body>
</html>