<?php

include("config.php");
?>

<body bgcolor=#FFCC99>

<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">  
  <tr align="center"> 
  <td width="100%" colspan="2">
<?php include"header.php";?>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php


	if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$Fac_Id = $_POST['txtFac_Id'];
	$Type = $_POST['txtType'];
	$Amount = $_POST['txtAmount'];	
	$Height = $_POST['txtHeight'];
	$Weight = $_POST['txtWeight'];
	$Date = $_POST['txtDate'];
	$Remask = $_POST['txtRemask'];
   
		echo "คณะ: ".$Fac_Id."<br>";
		echo "ประเภทการสั่ง: ".$Type."<br>";
		echo "จำนวน: ".$Amount."<br>";
		echo "ส่วนสูง: ".$Height."<br>";
		echo "น้ำหนัก: ".$Weight."<br>";
		echo "วันที่สั่ง: ".$Date."<br>";
		echo "หมายเหตุ: ".$Remask."<br>";
		
		
	
		$strSQLfaculty = "SELECT * FROM faculty WHERE Fac_Id='".$_POST['Faculty'][Fac_Id]."'";
		$objQueryfaculty = $mysqli->query($strSQLfaculty);
		$objResultfaculty = $objQueryfaculty->fetch_assoc();
		$Faculty2=$objResultfaculty[Fac_Name];

		$sql_insert="INSERT INTO gownorder (Fac_Id ,GownOrder_Type ,GownOrder_Amount ,GownOrder_Height ,GownOrder_Weight ,GownOrder_Date ,GownOrder_Remask )
		VALUES('".$Fac_Id."','".$Type."', '".$Amount."', '".$Height."', '".$Weight."', ".$Date.", '".$Remask."');";
		// $result = $mysqli->query($sql);

		if ($mysqli->query($sql_insert) == TRUE) {
		    echo "ทำการสั่งเรียบร้อยแล้ว.";
		} else {
		    echo "Error: " .$sql_insert. "<br>" . $mysqli->error;
		}
	}
    
        $mysqli->close();

?>
<br><a href="login.php">BACK</a><p> 