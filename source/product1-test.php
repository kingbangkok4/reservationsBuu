<?
 session_start();
if($_SESSION["strUsername"] ==  null){
 header("location: index.php");
 exit(); 
 }
 ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<title>ระบบสั่งจองสินค้าในมหาลัยบูรพา วิทยาเขตสระแก้ว</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<head>
<script>

function chkNull(){
    
    if(document.frm.idper.value == ""){
        alert('กรุณากรอกข้อมูลที่ต้องการค้นหา');
        frm.idper.focus();
        return false;
    }else{
       var text = $("#idper").val();
    }
}

</script>
<script language="javascript">
function Button(theButton){
    var theForm = theButton.form;
    if(theButton.name=="btn_reserv"){
        theForm.action="order_reserv.php";
       // theForm.target = "iframe1";
       
    }else{
        theForm.action="order_buy.php";
       // theForm.target = "iframe2";
        
    }
}
</script>
<body bgcolor=#FFCC99>

<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">  
  <tr align="center"> 
  <td width="100%" colspan="2">
<?php include"header.php";?>
</td>
  </tr > 
  <tr align="center"> 
  <td width="25%" >
<?php include"menu_person_2.php";?>
</td>
  <td width="75%" >
  
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 

    <td width="80%" valign="top">
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFCC66" id="details1">		
		<tr height="50">
<td colspan="8" height = "40" bgcolor="#FF6666"><div align="center"><strong><font size = "5">สินค้าทั่วไป</font></strong></div></td>			  
        </tr> 
		
		
<form name ="frm" method="post" action="" >
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0" >		
		<tr>
              <td>&nbsp;</td>
        </tr>
            <tr bgcolor="#FFB6C1">
				<td valign="top" bgcolor="#FFB6C1" align="">&nbsp;ค้นหาชื่อสินค้า(จากบางคำ):</td>
				<td align="center" width=""><input type="text" name="idper" id="idper" /></td>
				<td align="left">
					<button type="submit" name="search" id="button" onclick = "return chkNull();"><img src="image/search.png" title="ปุ่มค้นหา "/> </button>
                    <input type ="submit" name="allsearch" value ="แสดงสินค้าทั้งหมด">
                </td>
				
				<!--<td valign="top" bgcolor="#FFB6C1" align="right">เพิ่มข้อมูล :&nbsp;</td>	
				<td align="left" valign="top" bgcolor="#FFB6C1">
					<a href="add_data_product.php"><button type="button" name="button" id="button"><img src="image/add.png" title="ปุ่มเพิ่มข้อมูล" /> </button> 
				</td>-->				
            </tr>
				
</table>
</form>	


<table width="900" border="1" bordercolor="#FF9999" align="center" cellpadding="0" cellspacing="0" >
        <tr>
          <!--<td width="" bgcolor="#FF6666"><div align="center">id</div></td>-->
          <td width="" bgcolor="#FF6666"><div align="center">รหัสสินค้า</div></td>  	  
          <td width="" bgcolor="#FF6666"><div align="center">ชื่อสินค้า</div></td>
          <td width="" bgcolor="#FF6666"><div align="center">ราคา</div></td> 
		 <!-- <td width="" bgcolor="#FF6666"><div align="center">จำนวนสินค้าคงเหลือ</div></td>-->
		  <td width="" bgcolor="#FF6666"><div align="center">รูปภาพ</div></td>
          <td width="" bgcolor="#FF6666"><div align="center">สั่งซื้อ</div></td>
          <td width="" bgcolor="#FF6666"><div align="center">สั่งจอง</div></td>
          <!--<td width="" bgcolor="#FF6666"><div align="center">แก้ไขรหัสผ่าน</div></td>-->
          
        </tr>
	
<?php
$idper=$_POST[idper];

if(isset($_POST['allsearch']) || !isset($_POST['search'])){

$dbhost="localhost";
$dbuser="root";  
$dbpass="1234";
$dbname="Project";
mysql_connect($dbhost,$dbuser,$dbpass) or die("MySQL connect failed");
mysql_select_db($dbname) or die("MySQL select database failed");
mysql_query("SET NAMES UTF8 ") or die (mysql_error());


		//$sql = "select * from person  where Person_Fname like '%$idper%' and Person_Position='staff'";
		//ของstaff จัดการข้อมูลนิสิต และอาจารย์ 
		$sql = "select * from product  where Product_Name Like '%$idper%' ";
		
		$result = mysql_query($sql) or die (mysql_error());
        $num_rows = mysql_num_rows($result);

		$row = mysql_num_rows($result);		
				$Per_Page = 10;   // Per Page
				$Page = $_GET["Page"];
				if(!$_GET["Page"])
					{$Page=1;}
				$Prev_Page = $Page-1;
				$Next_Page = $Page+1; 
				$Page_Start = (($Per_Page*$Page)-$Per_Page);
				if($row<=$Per_Page)
					{$Num_Pages =1;}
				else if(($row % $Per_Page)==0)
					{$Num_Pages =($row/$Per_Page) ;}
				else
					{$Num_Pages =($row/$Per_Page)+1;
					$Num_Pages = (int)$Num_Pages;}
					
				$sql .=" order  by Product_Id ASC LIMIT $Page_Start , $Per_Page";
				//echo $sql;
				$result  = mysql_query($sql);
?>
	<?
	while ($row = mysql_fetch_array($result)) {
		
	?>	
        <tr>
        <form name ="addproduct" method="post" action="">
          <!--<td align="center"><?=$row["Product_Id"]?></td>-->		  
          <td align="center"><?=$row["Product_Code"]?></td>
		  <td align="center"><?=$row["Product_Name"]?></td>
          <td align="center"><?=$row["Product_Price"]?></td>
         <!-- <td align="center"><?=$row["Product_Stock"]?></td> -->
          <td align="center"><img src="image/<?=$row["Product_picture"]?>" width="140" height="100" border="0" /></td>
        
        <td align="center"><input type="hidden" name="txtProductID" id="txtProductID" value="<?php echo $row["Product_Code"];?>">
        <select name="txtQty">
        <?php for($qty=1;$qty<=$row["Product_Stock"];$qty++)
        {
            ?>
            <option value="<?php echo $qty;?>"><?php echo $qty;?></option>
            <?php
        }
        ?>
        </select>
        
        <?php
        if($row["Product_Stock"] <= 0){
            ?>
            <input type="submit" name="btn_add" value="Buy" disabled>
            <?php
        }else{
            ?>
            <input type="submit" name="btn_add" value="Buy" onClick="Button(this);">
            <?php
        }
        ?>
        </td>
        
        
        
        <td align="center"><input type="hidden" name="txtProductID" id="txtProductID" value="<?php echo $row["Product_Code"];?>">
        <select name="txtQtyReserv">
        <?php for($qty=1;$qty<=10;$qty++)
        {
            ?>
            <option value="<?php echo $qty;?>"><?php echo $qty;?></option>
            <?php
        }
        ?>
        </select>
        
        <?php
        if($row["Product_Stock"] > 0){
            ?>
        <input type="submit" name="btn_reserv" value="Reserv" disabled>
       <?php
        }else{
           ?>
        <input type="submit" name="btn_reserv" value="Reserv" onClick="Button(this);">
           <?php
        }
        ?>
        </td>
        </form>
        </tr>
	<?php
	}



?>

<!-แสดงหน้า->
				<tr><td colspan="8" align = "right">
							<br>
							Total <?php echo $num_rows;?> Record : <?php echo $Num_Pages;?> Page :
							<?php
							if($Prev_Page)
								{echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page'><< Back</a> ";}
							for($i=1; $i<=$Num_Pages; $i++){
								if($i != $Page)
									{echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i'>$i</a> ]";}
								else
									{echo "<b> $i </b>";}}
									if($Page!=$Num_Pages)
										{echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page'>Next>></a> ";}
							?>		
				</td>
</tr>
<?php
    
}else{
$dbhost="localhost";
$dbuser="root";  
$dbpass="aimax0824978018";
$dbname="project2";
mysql_connect($dbhost,$dbuser,$dbpass) or die("MySQL connect failed");
mysql_select_db($dbname) or die("MySQL select database failed");
mysql_query("SET NAMES UTF8 ") or die (mysql_error());

		$idper=$_POST['idper'];
		$sql = "select * from product  where Product_Name Like '%$idper%' ";
		$result = mysql_query($sql) or die (mysql_error());
		$num=mysql_num_rows($result);
	
if(mysql_num_rows($result)==0) {
echo "<script>alert('ไม่พบข้อมูลที่ต้องการค้นหา')</script>";
    
}		
		
	while ($row = mysql_fetch_array($result)) {
		

	?>	
        <tr>
        <form name ="addproduct" method="post">
          <td align="center"><?=$row["Product_Id"]?></td>		  
          <td align="center"><?=$row["Product_Code"]?></td>
		  <td align="center"><?=$row["Product_Name"]?></td>
          <td align="center"><?=$row["Product_Price"]?></td>
          <!--<td align="center"><?=$row["Product_Stock"]?></td> -->
          <td align="center"><img src="image/<?=$row["Product_picture"]?>" width="140" height="100" border="0" /></td>
 		  
        <td align="center"><input type="hidden" name="txtProductID" value="<?php echo $row["Product_Code"];?>" size="2">
        <select name="txtQty">
        <?php for($qty=1;$qty<=$row["Product_Stock"];$qty++)
        {
            ?>
            <option value="<?php echo $qty;?>"><?php echo $qty;?></option>
            <?php
        }
        ?>
        </select>
        
        <?php
        if($row["Product_Stock"] <= 0){
            ?>
            <input type="submit" name="btn_add" value="Buy" disabled>
            <?php
        }else{
            ?>
            <input type="submit" name="btn_add" value="Buy" onClick="Button(this);">
            <?php
        }
        ?>
        </td>
        
        
        
        <td align="center"><input type="hidden" name="txtProductIDReserv" value="<?php echo $row["Product_Code"];?>" size="2">
        <select name="txtQtyReserv">
        <?php for($qty=1;$qty<=10;$qty++)
        {
            ?>
            <option value="<?php echo $qty;?>"><?php echo $qty;?></option>
            <?php
        }
        ?>
        </select>
        
        <?php
        if($row["Product_Stock"] > 0){
            ?>
            <input type="submit" name="btn_reserv" value="Reserv" disabled>
            <?php
        }else{
            ?>
            <input type="submit" name="btn_reserv" value="Reserv" onClick="Button(this);">
            <?php
        }
        ?>
         </td>
         </form>
         </tr>
        
	<?php
	}
	
	?>
		<tr><td colspan="8" align = "right"><br>
		<? echo	"Search &nbsp; ชื่อสินค้า  &nbsp; '$idper' &nbsp; Show &nbsp;  $num  &nbsp;Record	&nbsp;"; ?>	
		</td></tr>
<?

}
?>  






	  
</table>

	  
	  

<br><p align="right"><a href="show_product.php">View Cart</a> | <a href="clear.php">Clear Cart</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<p>
      </table>

	  </td>

  </tr>
  		<tr>
              <td bgcolor="#FF9999" colspan = "8" height = "40"><div align="center"><strong>มหาวิทยาลัยบูรพา  วิทยาเขตสระแก้ว 2016</strong></div></td>
        </tr>
</table>

</td>
  </tr>  
</table>
   
<iframe NAME="iframe1" WIDTH="0" HEIGHT="0"></iframe>
<iframe NAME="iframe2" WIDTH="0" HEIGHT="0"></iframe>

</body>
</head>
</html>

</table>	
</body>