<?
session_start ();
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
		<?php
		echo "<tr>";
		echo "	<td colspan=\"2\" style=\"border: 1px solid black; padding: 0; text-align: center;\">";
		echo "strUsername=" . $_SESSION ['strUsername'] . "<br />";
		echo "strPerson_Id=" . $_SESSION ['strPerson_Id'] . "<br />";
		echo "Login_Position=" . $_SESSION ['Login_Position'] . "<br />";
		echo "	</td>";
		echo "</tr>";
		?>
		<tr>
			<td
				style="border: 1px solid black; padding: 0; text-align: center; width: 25%;">
				<?php
				switch ($_SESSION ["Login_Position"]) {
					case "admin" :
						include "menu_position_admin.php";
						break;
					case "staff" :
						include "menu_position_staff.php";
						break;
					default :
						include "menu.php";
						break;
				}
				?>
			</td>
			<td
				style="border: 1px solid black; padding: 0; text-align: center; width: 75%;">
				<!-- begin content -->
				<?php
				switch ($_GET ["page"]) {
					case "home" :
						include "5.php";
						break;
					case "product" :
						include "product.php";
						break;
					case "welcome" :
						include "welcome.php";
						break;
					default :
						include "login.php";
						break;
				}
				?>
				<!-- end content -->
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