<html>
<head>
<title>ระบบสั่งจองสินค้าในมหาลัยบูรพา วิทยาเขตสระแก้ว</title>
</head>
<body>
<?php
include("config.php");
$strSQL = "SELECT * FROM person";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>
<table width="600" border="1">
  <tr>
    <th width="91"> <div align="center">Person_Id </div></th>
    <th width="98"> <div align="center">Person_Fname</div></th>
    <th width="198"> <div align="center">Person_Lname</div></th>
    <th width="97"> <div align="center">Person_Birthday</div></th>
    <th width="59"> <div align="center">Person_email</div></th>
    <th width="71"> <div align="center">Person_Phone</div></th>
    <th width="30"> <div align="center">Person_Username</div></th>
	 <th width="30"> <div align="center">Person_Password</div></th>
	  <th width="30"> <div align="center">Person_UniversityCode</div></th>
  </tr>
<?php
while($objResult = mysql_fetch_array($objQuery))
{
?>
  <tr>
    <td><div align="center"><?php echo $objResult["Person_Id"];?></div></td>
    <td><?php echo $objResult["Fname"];?></td>
    <td><?php echo $objResult["Lname"];?></td>
    <td><div align="center"><?php echo $objResult["Birthday"];?></div></td>
    <td align="right"><?php echo $objResult["email"];?></td>
    <td align="right"><?php echo $objResult["Phone"];?></td>
	 <td align="right"><?php echo $objResult["Username"];?></td>
	  <td align="right"><?php echo $objResult["Password"];?></td>
	   <td align="right"><?php echo $objResult["UniversityCode"];?></td>
    <td align="center"><a href="phpMySQLEditRecordForm.php?CusID=<?php echo $objResult["Person_Id"];?>">Edit</a></td>
  </tr>
<?php
}
?>
</table>
<?php
mysql_close($objConnect);
?>
</body>
</html>