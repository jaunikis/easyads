<?php

if(isset($_POST['email'])){$email=$_POST['email'];}
if(isset($_POST['password'])){$password=md5($_POST['password']);}

require_once ('incl/server.php');
$sql="SELECT email,password FROM users WHERE email='$email'";
$result=sqlconnect($sql);
if ($row = $result->fetch_assoc()) 
	{
	$email2=$row['email'];
	if($email==$email2){
		$password2=$row['password'];
		if($password==$password2){echo 'ok';}
	}
	
	} else {echo 'wrong';}
	

//echo $password2;
?>