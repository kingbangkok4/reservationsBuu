<?php
if ($_SESSION ["Login_Position"] == "admin") {
	?>
<a href="main_admin.php">หน้าหลัก</a>
<a href="mrg_staff.php">จัดการเจ้าหน้าที่</a>
<a href="show_person_admin.php">แก้ไขข้อมูลส่วนตัว</a>
<a href="login.php">ออกจากระบบ</a>
<?php
} elseif ($_SESSION ["Login_Position"] == "staff") {
	?>
<a href="main_staff.php">หน้าหลัก</a>
<a href="mrg_product.php">จัดการข้อมูลสินค้า</a>
<a href="mrg_user.php">จัดการข้อมูลผู้ใช้</a>
<a href="mrg_approve.php">การอนุมัติสินค้า</a>
<a href="show_person_staff.php">แก้ไขข้อมูลส่วนตัว</a>
<a href="login.php">ออกจากระบบ</a>
<?php
} elseif ($_SESSION ["Login_Position"] == "student" || $_SESSION ["Login_Position"] == "teacher") {
	?>
<a href="main_user.php">หน้าหลัก</a>
<a href="product.php">สินค้า</a>
<!--
<div class="w3-dropdown-hover">
	<a class="w3-padding" href="javascript:void(0)">สินค้า <i
		class="fa fa-caret-down"></i></a>
	<div class="w3-dropdown-content w3-white w3-card-4">
		<a href="product_template.php">สินค้าทั่วไป</a>
	</div>
</div>
-->
<a href="history.php">ประวัติการสั่งซื้อ</a>
<a href="show_person_user.php">แก้ไขข้อมูลส่วนตัว</a>
<a href="login.php">ออกจากระบบ</a>
<?php
} else {
}
?>