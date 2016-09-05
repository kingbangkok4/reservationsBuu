<?php
ob_start();
session_start();
	
if(!isset($_SESSION["intLineReserv"]))
{
	if(isset($_POST["txtProductID"]))
	{
		 $_SESSION["intLineReserv"] = 0;
		 $_SESSION["strProductIDReserv"][0] = $_POST["txtProductID"];
		 $_SESSION["strQtyReserv"][0] = $_POST["txtQtyReserv"];
        
//        $ProductID = $_POST["txtProductID"];
//        $QtyReserv = $_POST["txtQtyReserv"];
//        echo "<br> product code = ".$_POST["txtProductID"];
//        echo "<script language=\"JavaScript\">";
//        echo "alert('Product ID : $ProductID, Qty : $QtyReserv');";
//        echo "</script>";

		header("location:show_product.php");
	}
}
else
{
	
	$key = array_search($_POST["txtProductID"], $_SESSION["strProductIDReserv"]);
	if((string)$key != "")
	{
		 $_SESSION["strQtyReserv"][$key] = $_SESSION["strQtyReserv"][$key] + $_POST["txtQtyReserv"];
	}
	else
	{
		
		 $_SESSION["intLineReserv"] = $_SESSION["intLineReserv"] + 1;
		 $intNewLineReserv = $_SESSION["intLineReserv"];
		 $_SESSION["strProductIDReserv"][$intNewLineReserv] = $_POST["txtProductID"];
		 $_SESSION["strQtyReserv"][$intNewLineReserv] = $_POST["txtQtyReserv"];
	}
    
//    $ProductID = $_POST["txtProductID"];
//    $QtyReserv = $_POST["txtQtyReserv"];
//    echo "<br> product code = ".$_POST["txtProductID"];
//    echo "<script language=\"JavaScript\">";
//    echo "alert('Product ID : $ProductID, Qty : $QtyReserv');";
//    echo "</script>";
	
	 header("location:show_product.php");

}
?>

