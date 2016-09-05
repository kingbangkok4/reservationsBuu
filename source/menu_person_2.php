<?php
include "./lib/std.php";
include "./lib/helper.php";
include "./lib/dbConnector.php";
?>

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
    <td><div align="center">สวัสดีคุณ <b><?=$_SESSION["strUsername"]?></b></a></div></td>
  </tr>
  <tr>
    <td><div align="center"><a href="index.php?page=home"><b>Home</b></a></div></td>
  </tr>
  <tr >
  
   <!-- <td ><div align="center"><a href="product.php?page=product"><b>Product</b></a></div></td> -->
  </tr>
 
</table>
 <div id="ooo"> <a href="product.php?page=product"><b>Product</b></a>
  <div id="xxx" style="display: none">
	<a href="product1-test.php?page=product1-test&idper=">อุปกรณ์</a><br>
	<a href="page_book.php?page=page_book">หนังสือ </a><br>
	<a href="page_gown.php?page=page_gown">ชุดครุย</a><br>
	
  </div>
  <div><a href="history.php?page=history"><b>ประวัติการสั่งซื้อ</b></div>
  </div>
 <!--<div> <a href="mrg_staff.php"><b>จัดการเจ้าหน้าที่</b></a></div>-->
 <div> <a href="show_person.php?page=show_person"><b>แก้ไขข้อมูลส่วนตัว</b></a></div>
 <div> <a href="page1.php?page=page1"><b>ออกจากระบบ</b></a></div>
 
  