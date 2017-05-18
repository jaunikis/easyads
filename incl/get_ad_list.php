<?php
require_once ('server.php');
if(isset($_POST['cat2'])){$cat2=$_POST['cat2'];}
$sql="SELECT * FROM skelbimai WHERE cat2='$cat2'";
$result=sqlconnect($sql);
$ar = array();
while ($row = $result->fetch_assoc()) {
	$ar[] = $row;
}
echo json_encode($ar);

//$result= '{ "name":"Johnas '.$_POST['name'].'", "age":31, "city":"New York" }';
//echo $result;
?>