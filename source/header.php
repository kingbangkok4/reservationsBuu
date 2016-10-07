<!DOCTYPE html>
<html>
<head>
<title>ระบบสั่งจองสินค้าในมหาวิทยาลัยบุรพา วิทยาเขตสระแก้ว</title>
<meta charset="UTF-8">
<script src="./js/jquery-3.1.1.js"></script>
</head>
<body style="background-color: #FFCC99; text-align: center;">
	<table style="border-collapse: collapse; width: 100%;">
		<tr>
			<td style="padding: 0; text-align: center;"><img
				src="./image/pitt.jpg"
				alt="ระบบสั่งจองสินค้าในมหาวิทยาลัยบุรพา วิทยาเขตสระแก้ว"
				style="display: block; width: 100%;"></td>
		</tr>
		<tr>
			<td style="padding: 0; text-align: center;"><marquee>ยินดีต้อนรับเข้าสู่เว็บไซต์สั่งจองสินค้าในมหาลัยบูรพา
					วิทยาเขตสระแก้ว จังหวัดสระแก้ว</marquee></td>
		</tr>
		<?php
		echo "<tr>";
		echo "	<td style=\"padding: 0; text-align: center;\">";
		echo "username=" . $_SESSION ['strUsername'] . "<br />";
		echo "	</td>";
		echo "</tr>";
		?>
	</table>
</body>
</html>