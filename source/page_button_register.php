<!-- 
<table width="569" height="255"  border="0">
  <tr>
  <br><br><br><br>


<br><br><br><br>
<center><b>Click Here!!!</b></center>
<center><a href="regis.php"> <img src="./image/pic_1.jpg" /></a></center>
  <br><br>
  <center>-------------------------------------------------</center><br><br>
<center>เข้าสู่ระบบ</center><br>
  <center>

<form name="form1" method="post" action="check_login.php">
Username : 
<input type="text" name ='txtUsername'> 
<br><br>
Password : 
<input type="password" name ='txtPassword'> 
<? echo $code_error;?>
<br>
<br><input type="submit" name="Submit" value="Login">
</form>


</center>
  </tr>
</table>
 -->

<!DOCTYPE html>
<html>
<head>
<title>ระบบสั่งจองสินค้าในมหาวิทยาลัยบุรพา วิทยาเขตสระแก้ว</title>
<meta charset="UTF-8">
</head>
<body style="background-color: #FFCC99; text-align: center;">


	<form action="check_login.php">
		<table style="width: 100%; border-collapse: collapse;">
			<tr>
				<td style="font-weight: bold; padding-bottom: 20px; text-align: center;">Click
					Here!!!</td>
			</tr>
			<tr>
				<td style="padding: 0; text-align: center;"><a href="regis.php"><img
						src="./image/pic_1.jpg" alt="สมัครสมาชิก"
						style="display: block; margin: auto;"></a></td>
			</tr>
			<tr>
				<td style="padding: 0; text-align: center;">-------------------------------------------------</td>
			</tr>
			<tr>
				<td style="padding: 0; text-align: center;">เข้าสู่ระบบ</td>
			</tr>
			<tr>
				<td style="padding: 0; text-align: center;">Username : <input
					type="text" name='txtUsername'></td>
			</tr>
			<tr>
				<td style="padding: 0; text-align: center;">Password : <input
					type="password" name='txtPassword'></td>
			</tr>
			<tr>
				<td style="padding: 0; text-align: center;"><input type="submit"
					value="Login"></td>
			</tr>
		</table>
	</form>

</body>
</html>