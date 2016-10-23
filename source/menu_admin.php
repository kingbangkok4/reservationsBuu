
<script>
	$(document).ready(function() {
		$('#ooo').hover(function() {
		$('#xxx').show();
	},
	function() {
		$('#xxx').hide();
	});
	})
</script>

<table width="150"  border="0">
  <tr>
  <center><b>MENU</b></center>
  </tr>
  <tr>
    <td><div align="center">สวัสดี <b><?=$_SESSION["strUsername"]?></b></a></div></td>
  </tr>
  <tr>
    <td><div align="center"><a href="index.php?page=home"><b>Home</b></a></div></td>
  </tr>
  <tr >
  
   <!-- <td ><div align="center"><a href="product.php?page=product"><b>Product</b></a></div></td> -->
  </tr>
 
</table>
 <!--<div id="ooo"> <a href="product.php?page=product"><b>Product</b></a>
  <div id="xxx" style="display: none">
	<a href="product.php">อุปกรณ์</a><br>
	<a href="page_book.php">หนังสือ </a><br>
	<a href="page_gown.php">ชุดครุย</a><br>-->
	
  </div>
  </div>
  
 <center><div> <a href="mrg_staff.php"><b>จัดการเจ้าหน้าที่</b></a></div></center>
 <center><div> <a href="show_person_admin.php"><b>แก้ไขข้อมูลส่วนตัว</b></a></div></center>
 <center><div> <a href="login.php"><b>ออกจากระบบ</b></a></div></center>
 
  