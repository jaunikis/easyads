<?php
session_start();
require_once ('server.php');
if(isset($_POST['ad_id'])){$id=$_POST['ad_id'];}
if(isset($_POST['ad_status'])){$status=$_POST['ad_status'];}
if(isset($_SESSION['email'])){$email=$_SESSION['email'];}

if($status=='label label-warning'){
	$sql="UPDATE skelbimai SET active='Active' WHERE id='$id'";
	$result=sqlconnect($sql);
}
if($status=='label label-success'){
	$sql="UPDATE skelbimai SET active='Not active' WHERE id='$id'";
	$result=sqlconnect($sql);
}

echo $status;
?>