<?php
ob_start ();
session_start ();

if (! isset ( $_SESSION ["intLineBuy"] )) {
	if (isset ( $_POST ["txtProductID"] )) {
		$_SESSION ["intLineBuy"] = 0;
		$_SESSION ["strProductIDBuy"] [0] = $_POST ["txtProductID"];
		$_SESSION ["strQty"] [0] = $_POST ["txtQty"];
		
		header ( "location:show_product.php" );
	}
} else {
	
	$key = array_search ( $_POST ["txtProductID"], $_SESSION ["strProductIDBuy"] );
	if (( string ) $key != "") {
		$_SESSION ["strQty"] [$key] = $_SESSION ["strQty"] [$key] + $_POST ["txtQty"];
	} else {
		
		$_SESSION ["intLineBuy"] = $_SESSION ["intLineBuy"] + 1;
		$intNewLineBuy = $_SESSION ["intLineBuy"];
		$_SESSION ["strProductIDBuy"] [$intNewLineBuy] = $_POST ["txtProductID"];
		$_SESSION ["strQty"] [$intNewLineBuy] = $_POST ["txtQty"];
	}
	
	header ( "location:show_product.php" );
}
?>

