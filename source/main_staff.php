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
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
</head>

<body bgcolor=#33FF99	>

<table width="100%" border="1">
  <tr>
  
    <td colspan="2"><div align="center">

	<!-- Header -->
	<?php include("header.php"); ?>

	</div></td>
  </tr>
  <tr>
  
    <td width="24%"><div align="center">

	<!-- Menu -->
	<?php include("menu_staff.php"); ?>

	</div></td>
    <td width="76%">

	<!-- Container -->
	<?php 
	switch ($_GET["page"]) {
	case "home":
		echo "Home";
		include("5.php");
		break;
	
	case "product":
		echo "Home -> Product";
		include("product.php");
		break;
		
	
	default:
		
		include("page_pic_welcome.php");
	}
	?>
</tr>
	</td>
  </tr>
  <tr>
    <td colspan=2"><div align="center">

	<!-- Footer -->
	<?php include("footer.php"); ?>

	</div></td>
  </tr>
</table>
</body>
</html>