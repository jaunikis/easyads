<?php
session_start();
//require_once ('server.php');

$id=$_GET['id'];
$servername = "localhost";
$username = "adsuietm_ds4u";
$password = "Joklmnas2";
$dbname = "adsuietm_ds4u";

$sql="SELECT saved FROM skelbimai WHERE id='$id'";
$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn->connect_errno) {echo "Sorry, this website is experiencing problems.";exit;}
if (!$result = $conn->query($sql)) {echo "Sorry, the website is experiencing problems.";}
$row = $result->fetch_assoc();
$perziureta=$row['saved'];
	
//save to user
$email=$_SESSION['email'];	
$sql="SELECT saved FROM users WHERE email='$email'";
//$conn = new mysqli($servername, $username, $password,$dbname);
//if ($conn->connect_errno) {echo "Sorry, this website is experiencing problems.";exit;}
if (!$result = $conn->query($sql)) {echo "Sorry, the website is experiencing problems.";}
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
if (!$result = $conn->query($sql)) {echo "Sorry, the website is experiencing problems.";}else{$_SESSION['saved']=$saved_ads;}

//$perziureta++;
//update skelbimai
$sql="UPDATE skelbimai SET saved='$perziureta' WHERE id='$id'";
if (!$result = $conn->query($sql)) {echo "Sorry, the website is experiencing problems.";}	
	echo $perziureta;
?>