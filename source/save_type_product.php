<?php

include("config.php");
?>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
	//$TypeP_Id = $_POST['TypeP_Id'];
	$TypeP_Nametype = $_POST['TypeP_Nametype'];
	//$Lname = $_POST['txtLname'];
	//$Birthday = $_POST['txtBirthday'];
   // $Year = $_POST['Year'];
  //  $Month = $_POST['Month'];
   // $Day = $_POST['Day'];
	//$Email = $_POST['txtemail'];
	//$Phone = $_POST['txtPhone'];
	//$Username = $_POST['txtUsername'];	
	//$Password = $_POST['txtPassword'];
	//$UniCode = $_POST['txtUniversityCode'];
    //$Position = $_POST['txtPosition'];
   // $Birthday = $Year."-".$Month."-".$Day;
	//$Faculty = $_POST['Faculty'];
   // if(isset($_POST['Branch']) && $_POST['Branch'] != ""){
	//$Branch = $_POST['Branch'];
    //}else{
   //     $Branch = "0";
    //}
	
	
	//$strSQLfaculty = "SELECT * FROM faculty WHERE Fac_Id='".$_POST['Faculty'][Fac_Id]."'";
	//$objQueryfaculty = $mysqli->query($strSQLfaculty);
	//$objResultfaculty = $objQueryfaculty->fetch_assoc();
	//$Faculty2=$objResultfaculty[Fac_Name];
	
	//$strSQLbranch = "SELECT * FROM branch WHERE Branch_Id='".$_POST['Branch'][Branch_Id]."'";
	//$objQuerybranch = $mysqli->query($strSQLbranch);
	//$objResultbranch = $objQuerybranch->fetch_assoc();
	//$Branch2=$objResultbranch[Branch_Name];

		echo "ชื่อประเภทสินค้า: ".$TypeP_Nametype."<br>";
		//echo "ชื่อจริง: ".$Fname."<br>";
		//echo "นามสกุล: ".$Lname."<br>";
		//echo "วันเดือนปีเกิด: ".$Year."-".$Month."-".$Day."<br>";
		//echo "อีเมล์: ".$Email."<br>";
		//echo "เบอร์โทร: ".$Phone."<br>";
		//echo "ชื่อผู้ใช้งาน: ".$Username."<br>";
		//echo "รหัสผู้ใช้งาน: ".$Password."<br>";
		//echo "รหัสประจำตัว: ".$UniCode."<br>";
		//echo "สถานะ: ".$Position."<br>";
       // echo "คณะ: ".$Faculty2."<br>";
        //echo "สาขา: ".$Branch2."<br>";

		$sql_insert="INSERT INTO type_product (TypeP_Nametype)
		VALUES('".$TypeP_Nametype."');";
		// $result = $mysqli->query($sql);

		if ($mysqli->query($sql_insert) == TRUE) {
		    echo "เพิ่มประเภทสินค้าเรียบร้อย";
		} else {
		    echo "Error: " .$sql_insert. "<br>" . $mysqli->error;
		}
	}
    
        $mysqli->close();

?>
<br><a href="mrg_type_product.php">BACK</a><p> 