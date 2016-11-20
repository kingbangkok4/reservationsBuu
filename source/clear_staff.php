<?php
	ob_start();
	session_start();
    unset($_SESSION["intLineBuy"]);
    unset($_SESSION["intLineReserv"]);
    unset($_SESSION["strProductIDBuy"]);
    unset($_SESSION["strProductIDReserv"]);
    unset($_SESSION["strQty"]);
    unset($_SESSION["strQtyReserv"]);

	header("location:show_product_staff.php");
?>

