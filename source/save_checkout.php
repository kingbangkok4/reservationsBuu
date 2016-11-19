<?php
session_start();
//include("include/date.php");
include("config.php");
$objCon = $mysqli;
if (!$objCon) {
	echo $objCon->connect_error;
	exit();
}
mysqli_set_charset($objCon, "utf8");
    
    if($_SESSION["strPerson_Id"] == ""){
        header("location: login.php");
        exit();
    }else{

  $Total = 0;
  $SumTotal = 0;

  $strSQL = "
	INSERT INTO orders (Order_Date,Person_Id)
	VALUES
	('".date("Y-m-d H:i:s")."','".$_SESSION["strPerson_Id"]."')
  ";
  $objQuery = mysqli_query($objCon,$strSQL);
  if(!$objQuery)
  {
	echo $objCon->error;
	exit();
  }

  $strOrderID = mysqli_insert_id($objCon);

  for($i=0;$i<=(int)$_SESSION["intLineBuy"];$i++)
  {
	  if($_SESSION["strProductIDBuy"][$i] != "")
	  {
          $Type = "Buy";
          $Status = "สินค้าพร้อมแล้ว";
          $Approval_Status = "อนุมัติ";
			  $strSQL = "
				INSERT INTO orders_detail (Order_Id,Product_Code,Qty,Type,Approval_Status,Status)
				VALUES
				('".$strOrderID."','".$_SESSION["strProductIDBuy"][$i]."','".$_SESSION["strQty"][$i]."','".$Type."','".$Approval_Status."','".$Status."')
			  ";
			  mysqli_query($objCon,$strSQL);
			  
			  $updateQtyStrSQL = 
				"UPDATE product
				SET Product_Stock=Product_Stock-".$_SESSION["strQty"][$i]."
				WHERE Product_Code='".$_SESSION["strProductIDBuy"][$i]."'";
			  mysqli_query($objCon,$updateQtyStrSQL);
	  }
  }
        
        for($i=0;$i<=(int)$_SESSION["intLineReserv"];$i++)
        {
            if($_SESSION["strProductIDReserv"][$i] != "")
            {
                $Type = "Reserv";
                $Status = "รออนุมัติ";
                $Approval_Status = "รออนุมัติ";
                $strSQL = "
                INSERT INTO orders_detail (Order_Id,Product_Code,Qty,Type,Approval_Status,Status)
                VALUES
                ('".$strOrderID."','".$_SESSION["strProductIDReserv"][$i]."','".$_SESSION["strQtyReserv"][$i]."','".$Type."','".$Approval_Status."','".$Status."')
                ";
                mysqli_query($objCon,$strSQL);
            }
        }

mysqli_close($objCon);
        
unset($_SESSION["intLineBuy"]);
unset($_SESSION["intLineReserv"]);
unset($_SESSION["strProductIDBuy"]);
unset($_SESSION["strProductIDReserv"]);
unset($_SESSION["strQty"]);
unset($_SESSION["strQtyReserv"]);


//header("location:finish_order.php?OrderID=".$strOrderID);
        header("location: product.php");
    }
?>