<?php
$dbhost="localhost"; 
$dbuser="root";  
$dbpass="aimax0824978018";
$dbname="project2";
mysql_connect($dbhost,$dbuser,$dbpass) or die("MySQL connect failed");
mysql_select_db($dbname) or die("MySQL select database failed");
mysql_query("SET NAMES UTF8 ") or die (mysql_error());

?>