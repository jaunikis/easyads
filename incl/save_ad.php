<?php
require_once('server.php');
session_start();
//require_once ('server.php');

$id=$_GET['id'];

$sql="SELECT saved FROM skelbimai WHERE id='$id'";
$result=sqlconnect($sql);
//$conn = new mysqli($servername, $username, $password,$dbname);
//if ($conn->connect_errno) {echo "Sorry, this website is experiencing problems.";exit;}
//if (!$result = $conn->query($sql)) {echo "Sorry, the website is experiencing problems.";}
$perziureta=0;
$row = $result->fetch_assoc();
$perziureta=$row['saved'];
	
//save to user
$email=$_SESSION['email'];
$sql="SELECT saved FROM users WHERE email='$email'";
$result=sqlconnect($sql);
//$conn = new mysqli($servername, $username, $password,$dbname);
//if ($conn->connect_errno) {echo "Sorry, this website is experiencing problems.";exit;}
//if (!$result = $conn->query($sql)) {echo "Sorry, the website is experiencing problems.";}
$row = $result->fetch_assoc();
$saved_ads=$row['saved'];
if($saved_ads!==''){
	$arr=explode(',',$saved_ads);
	$sa=array_search($id,$arr);
	if($sa=='' && $sa!==0){$arr[]+=$id;$perziureta++;}
		
	}else{$arr=array($id);}

//$saved_ads=$sa;
if(count($arr)>1){$saved_ads=implode(',',$arr);}else{$saved_ads=$arr[0];}
$sql="UPDATE users SET saved='$saved_ads' WHERE email='$email'";
sqlconnect($sql);
//if (!$result = $conn->query($sql)) {echo "Sorry, the website is experiencing problems.";}else{$_SESSION['saved']=$saved_ads;}

//$perziureta++;
//update skelbimai
$sql="UPDATE skelbimai SET saved='$perziureta' WHERE id='$id'";
sqlconnect($sql);
//if (!$result = $conn->query($sql)) {echo "Sorry, the website is experiencing problems.";}	
	echo $perziureta;
?>