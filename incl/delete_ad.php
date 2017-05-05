<?php
session_start();
require_once ('server.php');
if(isset($_POST['ad_id'])){$id=$_POST['ad_id'];}

$sql="DELETE FROM skelbimai WHERE id='$id'";
$result=sqlconnect($sql);
echo $id;
?>