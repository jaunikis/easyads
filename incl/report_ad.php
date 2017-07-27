<?php
require_once ('server.php');
session_start();
$user='';
if(isset($_SESSION['user'])){$user=$_SESSION['user'];}

if(isset($_POST['id'])){$id=$_POST['id'];}
if(isset($_POST['reason'])){$reason=$_POST['reason'];}
if(isset($_POST['reason2'])){$reason2=$_POST['reason2'];}

$sql = "INSERT INTO reported_ads (ad_id,reason,reason2,user) VALUES ('$id','$reason','$reason2','$user')";
$result=sqlconnect($sql);

echo $id.' - '.$reason.' - '.$reason2;
?>