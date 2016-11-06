<?php
session_start ();
session_unset();
session_destroy ();
include ("layout.php");
?>
<div id="kk-content">
	<img src="image/pitt.jpg"
		alt="ระบบสั่งจองสินค้าในมหาวิทยาลัยบุรพา วิทยาเขตสระแก้ว"
		style="width: 100%">
	<div class="w3-container">
		<br />
		<div class="w3-center">กดปุ่มเพื่อสมัครสมาชิก!!!</div>
		<br />
		<div class="w3-center">
			<a href="regis.php"> <img src="./image/pic_1.jpg" /></a>
		</div>
		<br />
		<div class="w3-center">-------------------------------------------------</div>
		<br />
		<form name="form1" method="post" action="check_login.php"
			class="w3-center">
			ชื่อผู้ใช้ : <input type="text" name='txtUsername'> <br> <br> รหัสผ่าน
			: <input type="password" name='txtPassword'> 
<? echo $code_error;?>
<br> <br> <input type="submit" name="Submit" value="เข้าสู่ระบบ">
		</form>
		<br />
	</div>
</div>