<?php
session_start ();
include ("layout.php");
include ("config.php");
?>
<div id="kk-content">
	<div class="w3-container">

<script type="text/javascript">
function chkNull(){
    
    if(document.frm.idper.value == ""){
        alert('กรุณากรอกข้อมูลที่ต้องการค้นหา');
        frm.idper.focus();
        return false;
    }else{
       var text = $("#idper").val();
    }
}
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

<br />
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 

    <td width="100%" valign="top">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#64B5F6" id="details1">		
		<tr height="50">
<td colspan="8" height = "40" bgcolor="#64B5F6"><div align="center"><strong><font size = "5">สินค้า</font></strong></div></td>			  
        </tr> 
		
		
<form name ="frm" method="post" action="" >
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >		
		<tr>
              <td>&nbsp;</td>
        </tr>
            <tr bgcolor="#64B5F6">
				<td valign="top" bgcolor="#64B5F6" align="">&nbsp;ค้นหาชื่อสินค้า(จากบางคำ):</td>
				<td align="center" width=""><input type="text" name="idper" id="idper" value="<?=$_POST[idper]?>" /></td>
				<td align="left">
					<button type="submit" name="search" id="button" onclick = "return chkNull();"><img src="image/search.png" title="ปุ่มค้นหา "/> </button>
                    <input type ="submit" name="allsearch" value ="แสดงสินค้าทั้งหมด">
                </td>
				
            </tr>
				
</table>
</form>	


<table width="100%" border="1" bordercolor="#64B5F6" align="center" cellpadding="0" cellspacing="0" >
        <tr>
          <!--<td width="" bgcolor="#90CAF9"><div align="center">id</div></td>-->
          <td width="" bgcolor="#90CAF9"><div align="center">รหัสสินค้า</div></td>  	  
          <td width="" bgcolor="#90CAF9"><div align="center">ชื่อสินค้า</div></td>
          <td width="" bgcolor="#90CAF9"><div align="center">ราคา</div></td> 
		 <!-- <td width="" bgcolor="#90CAF9"><div align="center">จำนวนสินค้าคงเหลือ</div></td>-->
		  <td width="" bgcolor="#90CAF9"><div align="center">รูปภาพ</div></td>
          <td width="" bgcolor="#90CAF9"><div align="center">สั่งซื้อ</div></td>
          <!-- <td width="" bgcolor="#90CAF9"><div align="center">สั่งจอง</div></td> -->
          <!--<td width="" bgcolor="#90CAF9"><div align="center">แก้ไขรหัสผ่าน</div></td>-->
          
        </tr>
	
<?php
$idper=$_POST[idper];

if(isset($_POST['allsearch']) || !isset($_POST['search'])){

mysql_connect($dbhost,$dbuser,$dbpass) or die("MySQL connect failed");
mysql_select_db($dbname) or die("MySQL select database failed");
mysql_query("SET NAMES UTF8 ") or die (mysql_error());


		//$sql = "select * from person  where Person_Fname like '%$idper%' and Person_Position='staff'";
		//ของstaff จัดการข้อมูลนิสิต และอาจารย์ 
		$sql = "select * from product  where Product_Name Like '%$idper%'";
		
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
          <!--<td align="center"><=$row["Product_Id"]?></td>-->		  
          <td align="center"><?=$row["Product_Code"]?></td>
		  <td align="center"><?=$row["Product_Name"]?></td>
          <td align="center"><?=$row["Product_Price"]?></td>
         <!-- <td align="center"><?=$row["Product_Stock"]?></td> -->
          <td align="center"><img src="image/<?=$row["Product_picture"]?>" width="140" height="100" border="0" /></td>
        
        <td align="center"><input type="hidden" name="txtProductID" id="txtProductID" value="<?php echo $row["Product_Code"];?>">
        <select name="txtQty">
        <?php for($qty=1;$qty<$row["Product_Stock"]+1;$qty++)
        {
            ?>
            <option value="<?php echo $qty;?>"><?php echo $qty;?></option>
            <?php
        }
        ?>
        </select>
        
        <?php
        if($row["Product_Stock"] < 1){
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
        
        
        <!-- 
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
        </td> -->
        </form>
        </tr>
	<?php
	}



?>

<!--แสดงหน้า-->
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
//$dbhost="localhost";
//$dbuser="root";  
//$dbpass="aimax0824978018";
//$dbname="project2";
mysql_connect($dbhost,$dbuser,$dbpass) or die("MySQL connect failed");
mysql_select_db($dbname) or die("MySQL select database failed");
mysql_query("SET NAMES UTF8 ") or die (mysql_error());

		$idper=$_POST['idper'];
		$sql = "select * from product  where Product_Name Like '%$idper%'";
		$result = mysql_query($sql) or die (mysql_error());
		$num_rows = mysql_num_rows($result);
	
if(mysql_num_rows($result)==0) {
echo "<script>alert('ไม่พบข้อมูลที่ต้องการค้นหา')</script>";
    
}		
		
	while ($row = mysql_fetch_array($result)) {
		

	?>	
        <tr>
        <form name ="addproduct" method="post">
          <!--<td align="center"><=$row["Product_Id"]?></td>-->	  
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
        
        
        <!-- 
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
         </td> -->
         </form>
         </tr>
        
	<?php
	}
	
	?>
		<tr><td colspan=7" align = "right"><br>
		<? echo	"Search &nbsp; ชื่อสินค้า  &nbsp; '$idper' &nbsp; Show &nbsp;  $num_rows  &nbsp;Record	&nbsp;"; ?>	
		</td></tr>
<?

}
?>  


</table>
</form>		  
	  
	  


	  
      </table>
	  </td>

  </tr>
</table>
<br />

<input name="" id="" type="button" onClick="javascript:window.location.href='show_product_staff.php';" value="ดูสินค้าในตะกร้า" />  <input name="" id="" type="button" onClick="javascript:window.location.href='clear.php';" value="ลบสินค้าในตะกร้าทั้งหมด" />
<br /><br />

</div>
</div>