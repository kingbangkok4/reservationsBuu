<?php
	ob_start();
	session_start();
	
	if(($_GET["Type"]) && isset($_GET["Line"]))
    if($_GET["Type"] == "Buy"){
	{
		$Line = $_GET["Line"];
		$_SESSION["strProductIDBuy"][$Line] = "";
		$_SESSION["strQty"][$Line] = "";
    }
    }else{
        $Line = $_GET["Line"];
        $_SESSION["strProductIDReserv"][$Line] = "";
        $_SESSION["strQtyReserv"][$Line] = "";
    }
	header("location:show_product.php");
?>

