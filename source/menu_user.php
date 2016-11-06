<a href="main_user.php">หน้าหลัก</a>
<?php
include ("config.php");
$sql = "SELECT * FROM type_product";
$result = $mysqli->query ( $sql );
if ($result->num_rows > 0) {
	echo "<div id=\"xxx\" class=\"w3-dropdown-hover\">";
	echo "<a class=\"w3-padding\" href=\"javascript:void(0)\">Dropdown 6 <i class=\"fa fa-caret-down\"></i></a>";
	echo "<div class=\"w3-dropdown-content w3-white w3-card-4\">";
	while ( $row = $result->fetch_assoc () ) {
		echo "<a href=\"product_template.php?TypeP_Id=" . $row [TypeP_Id] . "\">" . $row [TypeP_Nametype] . "</a>";
	}
	echo "</div></div>";
}
$mysqli->close ();
?>
<a href="history.php">ประวัติการสั่งซื้อ</a>
<a href="show_person_user.php">แก้ไขข้อมูลส่วนตัว</a>
<a href="login.php">ออกจากระบบ</a>