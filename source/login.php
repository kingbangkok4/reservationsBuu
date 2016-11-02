<?php
session_start();
session_destroy();
include("layout_header.php");
?>
  <p>In this example, the sidenav is hidden (style="display:none") and is only shown when you click on the menu icon in the top left corner. When it is opened, it shifts the page content to the right (we use JavaScript to add a 25% left margin to the div element with id="main" when this happens. The value "25%" matches the value used to set the width of the sidenav. Tip: If you change the left margin to 40%, you should change the width of the sidenav to 40% as well.</p>













<?php
include("layout_footer.php");
?>




























<!--
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>ระบบสั่งจองสินค้าในมหาลัยบูรพา วิทยาเขตสระแก้ว</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
</head>

<body bgcolor=#FFCC99>

<table width="100%" border="1">
  <tr>
  
    <td colspan="2"><div align="center">
	<php include("header.php"); ?>
	</div></td>
  </tr>
  <tr>
    <td width="24%"><div align="center">
	<php include("menu.php"); ?>
	</div></td>
    <td width="76%">
	<php 
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
		include("page_button_register.php");
	}
	?>
</tr>
	</td>
  </tr>
  <tr>
    <td colspan=2"><div align="center">
	<php include("footer.php"); ?>
	</div></td>
  </tr>
</table>
</body>
</html>
-->