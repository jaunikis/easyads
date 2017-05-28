<?php
require_once ('incl/server.php');
if(isset($_POST['email'])){$email=$_POST['email'];}
if(isset($_POST['password1'])){$password1=$_POST['password1'];}
if(isset($_POST['password2'])){$password2=$_POST['password2'];}
if(isset($_POST['name'])){$name=$_POST['name'];}
if(isset($_POST['terms'])){$terms=$_POST['terms'];}
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

$browser=$_SERVER['HTTP_USER_AGENT'];

/*
echo 'email: '.$email.'<br>';
echo 'password1: '.$password1.'<br>';
echo 'password2: '.$password2.'<br>';
echo 'terms: '.$terms.'<br>';
echo 'ip: '.$ip.'<br>';
echo $browser.'<br>';
*/

$password=md5($password1);


//$email=mysql_real_escape_string($email);
//$name=mysql_real_escape_string($name);

$sql="INSERT INTO users (email,password,name,active,ip,browser) VALUES ('$email','$password','$name','yes','$ip','$browser')";

//if (!$result = $conn->query($sql)) {echo "Sorry, the website is experiencing problems.";exit;}
sqlconnect($sql);
//echo $name;
session_start();
$_SESSION['user']=$name;
$_SESSION['email']=$email;
$_SESSION['location']='All Locations';
header('Location: /easyads/');

?>