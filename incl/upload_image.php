<?php
session_start();
$dataurl = $_POST['dataurl'];
$dataurl2 = $_POST['dataurl2'];
define('UPLOAD_DIR', '../ads_temp_images/');

//if(isset($_SESSION['images1'])){$images1file=$_SESSION['images1'];}
$images2file=[];

//image1
$date = new DateTime();$timestamp2=$date->getTimestamp();
		$img=$dataurl;
		list($type, $img) = explode(';', $img);
		list(, $img)      = explode(',', $img);
		$data = base64_decode($img);
		$rnd=$timestamp2.'-'. uniqid();
		$file = $rnd . '-small.jpg';
		$success = file_put_contents(UPLOAD_DIR.$file, $data);
		if($success){$_SESSION['images1'][]=$file;}
		

//image2
$date = new DateTime();$timestamp2=$date->getTimestamp();
		$img=$dataurl2;
		list($type, $img) = explode(';', $img);
		list(, $img)      = explode(',', $img);
		$data = base64_decode($img);
		$file = $rnd . '-large.jpg';
		$success = file_put_contents(UPLOAD_DIR.$file, $data);
		if($success){$_SESSION['images2'][]=$file;}	


//$_SESSION['images1']=$images1file;	
echo $_SESSION['images2'][0].' - '.$success;
?>