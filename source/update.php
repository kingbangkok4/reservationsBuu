<?php
ob_start();
session_start();
    
    
  for($i=0;$i<=(int)$_SESSION["intLineBuy"];$i++)
  {
	  if($_SESSION["strProductIDBuy"][$i] != "")
	  {
			$_SESSION["strQty"][$i] = $_POST["txtQty".$i];
	  }
  }
	
   
        for($i=0;$i<=(int)$_SESSION["intLineReserv"];$i++)
        {
            if($_SESSION["strProductIDReserv"][$i] != "")
            {
                $_SESSION["strQtyReserv"][$i] = $_POST["txtQtyReserv".$i];
            }
        }
    
 header("location:show_product.php");
?>
