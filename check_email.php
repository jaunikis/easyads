<?php
if(isset($_POST['email'])){$email=$_POST['email'];}

require_once ('incl/server.php');
$sql="SELECT email FROM users WHERE email='$email'";
$result=sqlconnect($sql);
if ($row = $result->fetch_assoc()) 
	{
	$email2=$row['email'];
	if($email==$email2){echo 'uzimtas';}
	
	} else {echo 'ok';}
?>