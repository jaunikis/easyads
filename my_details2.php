<?php
session_start();
require_once ('incl/server.php');
//if(isset($_POST['email'])){$email=$_POST['email'];echo $email.'<br>';}
$email=$_SESSION['email'];
if(isset($_POST['name'])){$name=$_POST['name'];}
if(isset($_POST['phone'])){$phone=$_POST['phone'];}
if(isset($_POST['location'])){$location=$_POST['location'];}
if(isset($_POST['old_password'])){$old_password=md5($_POST['old_password']);}
if(isset($_POST['password1'])){
	$password1=$_POST['password1'];
	if(isset($_POST['password2'])){$password2=$_POST['password2'];}
		if($password1==$password2){$password=md5($password1);
			if($_SESSION['password']==$old_password){
				$sql="UPDATE users SET password='$password' WHERE email='$email'";
				$result=sqlconnect($sql);
			}
		}
}



$sql="UPDATE users SET name='$name', phone='$phone', location='$location' WHERE email='$email'";
	$result=sqlconnect($sql);


	$_SESSION['user']=$name;
	$_SESSION['phone']=$phone;
	$_SESSION['location']=$location;
header('Location: /easyads/my_details');
?>