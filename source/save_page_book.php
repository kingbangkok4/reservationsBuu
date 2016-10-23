<?php

include("config.php");
mysql_connect($dbhost,$dbuser,$dbpass) or die("MySQL connect failed");
mysql_select_db($dbname) or die("MySQL select database failed");
mysql_query("SET NAMES UTF8 ") or die (mysql_error());
?>




<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php

		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$NameBook = $_POST['txtNameBook'];
			$Author = $_POST['txtAuthor'];
			$Publisher = $_POST['txtPublisher'];
			$Year = $_POST['txtYear'];
			$ISBN = $_POST['txtISBN'];
			$Amount = $_POST['txtAmount'];
			$Price = $_POST['txtPrice'];
			

		echo "ชื่อหนังสือ: ".$NameBook."<br>";
		echo "ชื่อผู้แต่ง: ".$Author."<br>";
		echo "ชื่อสำนักพิมพ์: ".$Publisher."<br>";
		echo "ปีที่พิมพ์: ".$Year."<br>";
		echo "รหัสหนังสือ: ".$ISBN."<br>";
		echo "จำนวนที่สั่ง: ".$Amount."<br>";
		echo "ราคาหนังสือ: ".$Price."<br>";
		

		$sql_insert="INSERT INTO book_order_detail (BOrderdt_NameBook ,BOrderdt_Author ,BOrderdt_Publisher ,BOrderdt_Year ,BOrderdt_ISBN ,BOrderdt_Amount ,BOrderdt_Price )
		VALUES('".$NameBook."','".$Author."', '".$Publisher."', '".$Year."', '".$ISBN."', ".$Amount.", '".$Price."');";
		// $result = $mysqli->query($sql);

		if ($mysqli->query($sql_insert) == TRUE) {
		    echo "ส่งข้อมูลเรียบร้อย";
		} else {
		    echo "Error: " .$sql_insert. "<br>" . $mysqli->error;
		}
		
    
        $mysqli->close();
		
?>
<br><a href="login.php">BACK</a><p> 