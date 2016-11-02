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
		<?php
		include ("page_button_register.php");
		?>
	</div>
</div>