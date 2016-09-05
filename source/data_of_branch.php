<?php

include("config.php");

?>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
    if(isset($_POST["fac_id"]) && $_POST["fac_id"]!=""){
  
    $strSQL = "SELECT * FROM branch WHERE Fac_Id = "."'".$_POST["fac_id"]."'";
    $result = $mysqli->query($strSQL);
    
        if ($result == TRUE) { ?>
            <option value="0">เลือกสาขา</option>
            <?php
            while($rs=$result->fetch_object()){
                ?>
<option value="<?=$rs->Branch_Id?>"> <?=$rs->Branch_Name?> </option>

<?php  }
    
    } else {
            echo "Error: " .$strSQL. "<br>" . $mysqli->error;
      
        }
          
    
    }else{
        ?>
<option value="0">เลือกสาขา</option>
<?php
    }
$mysqli->close();
?>
