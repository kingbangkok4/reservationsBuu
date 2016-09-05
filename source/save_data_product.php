<?php

include("config.php");
?>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$Product_Code = $_POST['Product_Code'];
	$Product_Name = $_POST['Product_Name'];
	$Product_Price = $_POST['Product_Price'];
	$Product_Stock = $_POST['Product_Stock'];
	

	
	
	$sur = strrchr($_FILES['Product_picture']['name'], "."); 
$Product_picture = (Date("dmy_His").$sur); 

move_uploaded_file($_FILES['Product_picture']['tmp_name'],'image/'.$Product_picture);	
	


		echo "รหัสสินค้า: ".$Product_Code."<br>";
		echo "ชื่อข้อมูลสินค้า: ".$Product_Name."<br>";
		echo "ราคา: ".$Product_Price."<br>";
		echo "จำนวนสินค้าคงเหลือ: ".$Product_Stock."<br>";
		
		
		

		$sql_insert="INSERT INTO product (Product_Code ,Product_Name ,Product_Price ,Product_Stock,Product_picture) 
		VALUES('".$Product_Code."','".$Product_Name."','".$Product_Price."','".$Product_Stock."','".$Product_picture."');";
		// $result = $mysqli->query($sql);

		if ($mysqli->query($sql_insert) == TRUE) {
		    echo "เพิ่มข้อมูลสินค้าเรียบร้อย";
		} else {
		    echo "Error: " .$sql_insert. "<br>" . $mysqli->error;
		}
	}
    
        $mysqli->close();

?>
<br><a href="add_data_product.php">BACK</a><p> 