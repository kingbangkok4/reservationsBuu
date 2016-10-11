<?
session_start ();
session_unset ();
session_destroy ();
?>
<!DOCTYPE html>
<html>
<head>
<title>ระบบสั่งจองสินค้าในมหาวิทยาลัยบุรพา วิทยาเขตสระแก้ว</title>
<meta charset="UTF-8">
<script type="text/javascript">
$( document ).ready(function() {
    $("#register-img").on("click", function() {
    	$("#login-form").attr("action", "regis.php").attr("method", "get").submit();
    }).hover(
    	function () {
        	$(this).css({"cursor":"pointer"});
        },
        function () {
            $(this).css({"cursor":"auto"});
        }
    );
});
</script>
</head>
<body style="background-color: #FFCC99; text-align: center;">
	<form id="login-form" action="check_login.php" method="post">
		<table style="border-collapse: collapse; width: 100%;">
			<tr>
				<td style="padding: 0px 0px 60px 0px; text-align: center;">&nbsp;</td>
			</tr>
			<tr>
				<td
					style="font-weight: bold; padding: 0px 0px 20px 0px; text-align: center;">Click
					Here!!!</td>
			</tr>
			<tr>
				<td style="padding: 0px 0px 40px 0px; text-align: center;"><img
					id="register-img" src="./image/pic_1.jpg" alt="สมัครสมาชิก"
					style="display: block; margin: auto;"> <!-- 
				<a
					href="regis.php"><img src="./image/pic_1.jpg" alt="สมัครสมาชิก"
						style="display: block; margin: auto;"></a>
			 --></td>
			</tr>
			<tr>
				<td style="padding: 0px 0px 40px 0px; text-align: center;">-------------------------------------------------</td>
			</tr>
			<tr>
				<td style="padding: 0px 0px 20px 0px; text-align: center;">เข้าสู่ระบบ</td>
			</tr>
			<tr>
				<td style="padding: 0px 0px 20px 0px; text-align: center;">Username
					: <input type="text" name='txtUsername'>
				</td>
			</tr>
			<tr>
				<td style="padding: 0px 0px 20px 0px; text-align: center;">Password
					: <input type="password" name='txtPassword'>
				</td>
			</tr>
			<tr>
				<td style="padding: 0px 0px 20px 0px; text-align: center;"><input
					type="submit" value="Login"></td>
			</tr>
			<tr>
				<td style="padding: 0px 0px 60px 0px; text-align: center;">&nbsp;</td>
			</tr>
		</table>
	</form>
</body>
</html>