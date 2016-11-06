<?php
session_start ();
session_destroy ();
include ("layout.php");
?>
<div id="kk-content">
	<img src="image/pitt.jpg"
		alt="ระบบสั่งจองสินค้าในมหาวิทยาลัยบุรพา วิทยาเขตสระแก้ว"
		style="width: 100%">
	<div class="w3-container">
		<br /> <br />
		<div class="w3-center">Click Here!!!</div>
		<div class="w3-center">
			<a href="regis.php"> <img src="./image/pic_1.jpg" /></a>
		</div>
		<br /> <br />
		<div class="w3-center">-------------------------------------------------</div>
		<br /> <br />
		<div class="w3-center">เข้าสู่ระบบ</div>
		<br />
		<form name="form1" method="post" action="check_login.php"
			class="w3-center">
			Username : <input type="text" name='txtUsername'> <br> <br> Password
			: <input type="password" name='txtPassword'> 
<? echo $code_error;?>
<br> <br> <input type="submit" name="Submit" value="Login">
		</form>
		<br> <br>
	</div>
</div>