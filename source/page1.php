<?
session_start ();
session_destroy ();
?>


<!DOCTYPE html>
<html>
<head>
<title>ระบบสั่งจองสินค้าในมหาวิทยาลัยบุรพา วิทยาเขตสระแก้ว</title>
<meta charset="UTF-8">
</head>
<body style="background-color: #FFCC99; text-align: center;">


	<table
		style="border: 1px solid black; border-collapse: collapse; width: 100%;">
		<tr>
			<td colspan="2"
				style="border: 1px solid black; padding: 0; text-align: center;">
				<?php
				include "header.php";
				?>
			</td>
		</tr>
		<tr>
			<td
				style="width: 25%; border: 1px solid black; padding: 0; text-align: center;">
				<?php
				include "menu.php";
				?>
			</td>
			<td
				style="width: 75%; border: 1px solid black; padding: 0; text-align: center;">
				<!-- content -->
				<?php
				switch ($_GET ["page"]) {
					case "home" :
						echo "Home";
						include "5.php";
						break;
					case "product" :
						echo "Home -> Product";
						include "product.php";
						break;
					default :
						include "page_button_register.php";
						break;
				}
				?>
			</td>
		</tr>
		<tr>
			<td colspan="2"
				style="border: 1px solid black; padding: 0; text-align: center;">
				<?php
				include "footer.php";
				?>
			</td>
		</tr>
	</table>


</body>
</html>