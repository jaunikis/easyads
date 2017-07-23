<?php
require_once ('server.php');
session_start();
$dataurl = $_POST['dataurl'];
$user = $_POST['user'];

//image1
$sql="UPDATE users SET photo_blob='$dataurl' WHERE email='$user'";
$result=sqlconnect($sql);
if($result==1){$_SESSION['photo_blob']=$dataurl;}

echo $result;
?>