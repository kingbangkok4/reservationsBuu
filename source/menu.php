<!DOCTYPE html>
<html>
<head>
<title>ระบบสั่งจองสินค้าในมหาวิทยาลัยบุรพา วิทยาเขตสระแก้ว</title>
<meta charset="UTF-8">
<script>
$(document).ready(function() {
	$("#product_menu, .product-menu-item").hover(
	  function() {
	    $(".product-menu-item").show();
	  }, function() {
	    $(".product-menu-item").hide();
	  }
	).trigger("mouseout");
});
</script>
</head>
<body style="background-color: #FFCC99; text-align: center;">
	<table
		style="border-collapse: collapse; font-weight: bold; width: 100%;">
		<tr>
			<td style="padding: 0; text-align: center;">MENU</td>
		</tr>
		<tr>
			<td style="padding: 0; text-align: center;"><a href="index.php">Home</a></td>
		</tr>
		<tr>
			<td style="padding: 0; text-align: center;"><a id="product_menu"
				href="product.php?page=product">Product</a></td>
		</tr>
		<tr class="product-menu-item">
			<td style="padding: 0; text-align: center;"><a
				href="product1-test.php">อุปกรณ์</a></td>
		</tr>
		<tr class="product-menu-item">
			<td style="padding: 0; text-align: center;"><a href="page_book.php">หนังสือ
			</a></td>
		</tr>
		<tr class="product-menu-item">
			<td style="padding: 0; text-align: center;"><a href="page_gown.php">ชุดครุย</a>
			</td>
		</tr>
	</table>
</body>
</html>