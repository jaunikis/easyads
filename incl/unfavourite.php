<?php
session_start();
require_once ('server.php');
if(isset($_POST['unfav'])){$unfav=$_POST['unfav'];}
if(isset($_SESSION['saved'])){$saved=$_SESSION['saved'];}
if(isset($_SESSION['email'])){$email=$_SESSION['email'];}
$arr=explode(',',$saved);
$x=array_search($unfav,$arr);
array_splice($arr,$x,1);
$saved=implode(',',$arr);
$_SESSION['saved']=$saved;
$sql="UPDATE users SET saved='$saved' WHERE email='$email'";
$result=sqlconnect($sql);
echo $saved;
?>