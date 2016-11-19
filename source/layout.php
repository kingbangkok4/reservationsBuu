<!DOCTYPE html>
<html>
<head>
<title>ระบบสั่งจองสินค้าในมหาวิทยาลัยบุรพา วิทยาเขตสระแก้ว</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/jquery.alphanumeric.js"></script>
<script type="text/javascript">
$( document ).ready(function() {
	// Handler for .ready() called.
	//w3_open();
	$("#kk-content").appendTo("#kk-container");
});
function w3_open() {
  document.getElementById("main").style.marginLeft = "25%";
  document.getElementById("mySidenav").style.width = "25%";
  document.getElementById("mySidenav").style.display = "block";
  document.getElementById("openNav").style.display = 'none';
}
function w3_close() {
  document.getElementById("main").style.marginLeft = "0%";
  document.getElementById("mySidenav").style.display = "none";
  document.getElementById("openNav").style.display = "inline-block";
}
</script>
</head>
<body>

<nav class="w3-sidenav w3-white w3-card-2" style="display:none" id="mySidenav">
  <a href="javascript:void(0)"
  onclick="w3_close()"
  class="w3-closenav w3-large">ปิด &times;</a>
  <?php
  	include ("menu.php");
  ?>
</nav>

<div id="main">

<header class="w3-container w3-teal">
  <span class="w3-opennav w3-xlarge" onclick="w3_open()" id="openNav">&#9776;</span>
  <?php if (isset ( $_SESSION["strUsername"])) {
  ?>
  <span class="w3-right">ผู้ใช้ : <span style="font-weight: bold;"><?=$_SESSION["strUsername"]?></span></span>
  <?php }
  ?>
  <h1 class="w3-center">ระบบสั่งจองสินค้าในมหาวิทยาลัยบุรพา วิทยาเขตสระแก้ว</h1>
</header>

<div id="kk-container"></div>

<footer class="w3-container w3-teal">
  <h5 class="w3-center">มหาวิทยาลัยบูรพา วิทยาเขตสระแก้ว</h5>
  <p class="w3-center">Copyright 2016 by Kookkik. All Rights Reserved.</p>
</footer>

</div>

</body>
</html>
