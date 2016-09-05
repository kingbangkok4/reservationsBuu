
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
	<?php include("header.php"); ?>

	</div></td>
  </tr>
  <tr>
  
    <td width="24%"><div align="center">

	<!-- Menu -->
	<?php include("menu.php"); ?>

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
		
		
	}
	?>
<center>
	<br><b>ชุดครุย</b><br><br>
<img src="./image/gown.jpg" /><center>ชุดครุยมหาวิทยาลัยบูรพา</center> <center>$</center></TD>     
   
 </center>  


</tr>
	</td>
  </tr>
  <tr>
    <td colspan=2"><div align="center">

	<!-- Footer -->
	<?php include("footer.php"); ?>

	</div></td>
  </tr>
 
</td>
</tr>
</table>
</body>
</html>