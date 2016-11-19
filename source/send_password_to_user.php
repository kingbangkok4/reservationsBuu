<?
 include("config.php");
 require("PHPMailer_5.2.4/class.phpmailer.php");
 ?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ระบบสั่งจองสินค้าในมหาวิทยาลัยบูรพา วิทยาเขตสระแก้ว</title>
</head>
<body>

<div align="center">
  <?
  //mysql_connect($dbhost,$dbuser,$dbpass) or die("MySQL connect failed");
  //mysql_select_db($dbname) or die("MySQL select database failed");
  //mysql_query("SET NAMES UTF8 ") or die (mysql_error());
  
  $strUsername = $_POST['txtUsername'];
  $sql = "SELECT * FROM person WHERE Person_Username='".$strUsername."'";
  $result = $mysqli->query($sql);
  
  echo "<script> alert('".$strUsername.",".$result->num_rows."')</script>";
  
  if ($result->num_rows >0){
  	while($row = $result->fetch_assoc()){
  		
  		$mail = new PHPMailer();
  		$mail->IsHTML(true);
  		$mail->IsSMTP();  // telling the class to use SMTP
  		$mail->SMTPAuth   = true; // SMTP authentication
  		$mail->Host       = "smtp.gmail.com"; // SMTP server
  		$mail->Port       = 465; // SMTP Port
  		$mail->Username   = "manuwin99@gmail.com"; // SMTP account username
  		$mail->Password   = "0884854100";        // SMTP account password
  		
  		//$mail->SetFrom('anuchat.buntherng@gmail.com', 'John Doe'); // FROM
  		//$mail->AddReplyTo('john.doe@gmail.com', 'John Doe'); // Reply TO
  		$mail->From = 'manuwin99@gmail.com';
  		$mail->FromName = 'Manchester United';
  		$mail->AddAddress('anuchat.buntherng@gmail.com', 'reserve buu'); // recipient email
  		
  		$mail->Subject    = "รหัสผ่านเข้าระบบสั่งจองสินค้าในมหาวิทยาลัยบูรพา วิทยาเขตสระแก้ว"; // email subject
  		$mail->Body       = "สวัสดี ".$row[Person_Fname]." ".$row[Person_Lname]."<br /><br /> รหัสผ่านของคุณ คือ ".$row[Person_Password];
  		$mail->set('X-Priority', '1');
  		
  		if($mail->Send()) {
  			echo "<script> alert('ส่งรหัสผ่านไปที่ email ของผู้ใช้เรียบร้อย')</script>";
  			echo "<meta http-equiv='refresh' content='2;url=login.php'/>";
  		} else {
  			echo "<script> alert('!!!เกิดข้อผิดพลาด!!!ไม่สามารถส่ง email ได้!!!".$mail->ErrorInfo."')</script>";
  			echo "<meta http-equiv='refresh' content='2;url=login.php'/>";
  		}
  	}
  }else {
  	echo "<script> alert('!!!เกิดข้อผิดพลาด!!!ไม่พบข้อมูลผู้ใช้')</script>";
  	echo "<meta http-equiv='refresh' content='2;url=login.php'/>";
  }
  
  
  
?>
  <img src="image/loading.png" width="250" height="250" />
</div>
</body>
</html>