<? 
$Connect = mysql_connect("localhost","root","1234") or die("Error Connect to DB");
$DB = mysql_select_db("project");
$SQL = "SELECT * FROM  product  WHERE Product_Id = '$Product_Id' ";
$Query = mysql_query($SQL) or die ("Error Query [".$SQL."]");
$Result = mysql_fetch_array($Query);
header('Content-Type: image/jpeg');
echo $Result["type_product"];
?>