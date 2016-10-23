<?php

include("config.php");
?>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$Title_Id = $_POST['Title_Id'];
	$Fname = $_POST['txtFname'];
	$Lname = $_POST['txtLname'];
	$Birthday = $_POST['txtBirthday'];
    $Year = $_POST['Year'];
    $Month = $_POST['Month'];
    $Day = $_POST['Day'];
	$Email = $_POST['txtemail'];
	$Phone = $_POST['txtPhone'];
	$Username = $_POST['txtUsername'];	
	$Password = $_POST['txtPassword'];
	$UniCode = $_POST['txtUniversityCode'];
    $Position = $_POST['txtPosition'];
    $Birthday = $Year."-".$Month."-".$Day;
	$Faculty = $_POST['Faculty'];
    if(isset($_POST['Branch']) && $_POST['Branch'] != ""){
	$Branch = $_POST['Branch'];
    }else{
        $Branch = "0";
    }
	
	
	$strSQLfaculty = "SELECT * FROM faculty WHERE Fac_Id='".$_POST['Faculty'][Fac_Id]."'";
	$objQueryfaculty = $mysqli->query($strSQLfaculty);
	$objResultfaculty = $objQueryfaculty->fetch_assoc();
	$Faculty2=$objResultfaculty[Fac_Name];
	
	$strSQLbranch = "SELECT * FROM branch WHERE Branch_Id='".$_POST['Branch'][Branch_Id]."'";
	$objQuerybranch = $mysqli->query($strSQLbranch);
	$objResultbranch = $objQuerybranch->fetch_assoc();
	$Branch2=$objResultbranch[Branch_Name];

		echo "คำนำหน้าชื่อ: ".$Title_Id."<br>";
		echo "ชื่อจริง: ".$Fname."<br>";
		echo "นามสกุล: ".$Lname."<br>";
		echo "วันเดือนปีเกิด: ".$Year."-".$Month."-".$Day."<br>";
		echo "อีเมล์: ".$Email."<br>";
		echo "เบอร์โทร: ".$Phone."<br>";
		echo "ชื่อผู้ใช้งาน: ".$Username."<br>";
		echo "รหัสผู้ใช้งาน: ".$Password."<br>";
		echo "รหัสประจำตัว: ".$UniCode."<br>";
		echo "สถานะ: ".$Position."<br>";
        echo "คณะ: ".$Faculty2."<br>";
        echo "สาขา: ".$Branch2."<br>";

		$sql_insert="INSERT INTO person (Title_Id ,Person_Fname ,Person_Lname ,Person_Birthday ,Person_email ,Person_Phone ,Person_Username ,Person_Password ,Person_UniversityCode, Person_Position, Fac_Id, Branch_Id)
		VALUES('".$Title_Id."','".$Fname."', '".$Lname."', '".$Birthday."', '".$Email."', ".$Phone.", '".$Username."',  '".$Password."', ".$UniCode.",'".$Position."',".$Faculty.",".$Branch.");";
		// $result = $mysqli->query($sql);

		if ($mysqli->query($sql_insert) == TRUE) {
		    echo "สมัครสมาชิกเรียบร้อย";
		} else {
		    echo "Error: " .$sql_insert. "<br>" . $mysqli->error;
		}
	}
    
        $mysqli->close();

?>
<br><a href="login.php">BACK</a><p> 