
<script>
	$(document).ready(function() {
		$('#ooo').hover(function() {
		$('#xxx').show();
	},
	function() {
		$('#xxx').hide();
	});
	})
</script>

<table width="150"  border="0">
  <tr>
  <center><b>MENU</b></center>
  </tr>
  <tr>
    <td><div align="center">สวัสดี <b><?=$_SESSION["strUsername"]?></b></a></div></td>
  </tr>
  <tr>
    <td><div align="center"><a href="index.php?page=home"><b>Home</b></a></div></td>
  </tr>
  <tr >
  
   <!-- <td ><div align="center"><a href="product.php?page=product"><b>Product</b></a></div></td> -->
  </tr>
 
</table>
	<div> <a href="mrg_type_product.php"><b>จัดการประเภทสินค้า</b></a></div>
	<div> <a href="mrg_product.php"><b>จัดการข้อมูลสินค้า</b></a></div>
	<!--<div id="ooo"> <a href="product.php?page=product"><b>Product</b></a>-->
	<!--<div id="xxx" style="display: none">-->
	<!--<a href="product.php">อุปกรณ์</a><br>-->
	<!--<a href="page_book.php">หนังสือ </a><br>-->
	<!--<a href="page_gown.php">ชุดครุย</a><br>-->
	
  </div>
  </div>
  <center>
 <div> <a href="mrg_person.php"><b>จัดการข้อมูลใช้งาน</b></a></div>
 <div> <a href="show_person.php"><b>แก้ไขข้อมูลส่วนตัว</b></a></div>
 <div> <a href="report.php"><b>รายงานสินค้าคงเหลือ</b></a></div>
 
 <div> <a href="login.php"><b>ออกจากระบบ</b></a></div>
 
 </center>
  
  
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
			<td style="padding: 0; text-align: center;"><a
				href="index.php?page=home">Home</a></td>
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