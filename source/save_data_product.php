<?php
session_start ();
include ("layout.php");
include ("config.php");

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$Product_Code = $_POST['Product_Code'];
	$Product_Name = $_POST['Product_Name'];
	$Product_Price = $_POST['Product_Price'];
	$Product_Stock = $_POST['Product_Stock'];
	

	
	
	$sur = strrchr($_FILES['Product_picture']['name'], "."); 
$Product_picture = (Date("dmy_His").$sur); 

move_uploaded_file($_FILES['Product_picture']['tmp_name'],'image/'.$Product_picture);	
	?>
	<div id="kk-content">
	<div class="w3-container">
	
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td  valign="top">	
		<table width="100%" height="260" border="2" align="center" cellpadding="0" cellspacing="0" bordercolor="#E57373">		
	<tr>
	
    <td  valign="top">
	<table width="100%" height="260" border="0" align="center" cellpadding="0" cellspacing="0" id="details1">		
		<tr>
<td colspan="2" height = "40" bgcolor="#E57373"><div align="center"><strong><font size = "5">บันทึกข้อมูลสินค้า</font></strong></div></td>			  
        </tr> 	
      <tr>
        <td>	 
 
 
<?php 

		echo "รหัสสินค้า: ".$Product_Code."<br /><br />";
		echo "ชื่อข้อมูลสินค้า: ".$Product_Name."<br /><br />";
		echo "ราคา: ".$Product_Price."<br /><br />";
		echo "จำนวนสินค้าคงเหลือ: ".$Product_Stock."<br /><br />";
		
		
		

		$sql_insert="INSERT INTO product (Product_Code ,Product_Name ,Product_Price ,Product_Stock,Product_picture) 
		VALUES('".$Product_Code."','".$Product_Name."','".$Product_Price."','".$Product_Stock."','".$Product_picture."');";
		// $result = $mysqli->query($sql);

		if ($mysqli->query($sql_insert) == TRUE) {
		    echo "เพิ่มข้อมูลสินค้าเรียบร้อย<br /><br />";
		} else {
		    echo "Error: " .$sql_insert. "<br /><br />" . $mysqli->error;
		}
	}
    
        $mysqli->close();

?>
<input type="button" value="กลับ" onclick="javascript:window.location.href='add_data_product.php'"/>
<br /><br />

</td>
          </tr>
        </table>
		</td>
		</tr>
        </table>
		</td>	
		</tr>
</table>
		</div>
</div>