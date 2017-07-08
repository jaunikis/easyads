<?php
require_once ('incl/server.php');
session_start();

$images1file=[];
$images2file=[];

$date = new DateTime();$timestamp2=$date->getTimestamp();
$tdate=date("d/m/Y");
$time=date("H:i:sa");
$ip=$_SERVER['REMOTE_ADDR'];
$user='test user';
$cat1='cat1';$cat2='cat2';
$make='';$model='';$year=0;$fuel='';$condition='';
$price='';$location='All';
$images=[''];$cover=0;
$name='';$email='';$phone='';
$transmission='';$bodyType='';$color='';
$description='';

if(isset($_SESSION['user'])){$user=$_SESSION['user'];}

$cover=$_POST['cover'];
$title=$_POST['title'];
$cat1=$_POST['cat1'];
$cat2=$_POST['cat2'];
$make=$_POST['cat3'];
$model=$_POST['cat4'];
$year=$_POST['year'];if($year==''){$year=0;}
$fuel=$_POST['fuel'];
$transmission=$_POST['transmission'];
$bodyType=$_POST['bodyType'];
$color=$_POST['color'];
$price=$_POST['price'];
$location=$_POST['location'];
$description=$_POST['description'];
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$images1 = $_POST['images1'];
$images2 = $_POST['images2'];

//save images to files
	define('UPLOAD_DIR', 'ads_images/');
	for($i=0;$i<count($images1);$i++){
		$date = new DateTime();$timestamp2=$date->getTimestamp();
		$img=$images1[$i];
		list($type, $img) = explode(';', $img);
		list(, $img)      = explode(',', $img);
		$data = base64_decode($img);
		$file = $timestamp2.'-'. uniqid() . '-'.$i.'-small.jpg';
		$success = file_put_contents(UPLOAD_DIR.$file, $data);
		$images1file[]=$file;
	}
	for($i=0;$i<count($images2);$i++){
		$date = new DateTime();$timestamp2=$date->getTimestamp();
		$img=$images2[$i];
		list($type, $img) = explode(';', $img);
		list(, $img)      = explode(',', $img);
		$data = base64_decode($img);
		$file = $timestamp2.'-'. uniqid() . '-'.$i.'-large.jpg';
		$success = file_put_contents(UPLOAD_DIR.$file, $data);
		$images2file[]=$file;
	}

//$sql = "INSERT INTO skelbimai (cover,cover1file,ip,user,title,cat1,cat2,make,model,year,fuel,transmission,bodyType,color,price,location,condition2,description,name,email,phone,active,timestamp2) VALUES ('$images1[$cover]','$images1file[$cover]','$ip','$user','$title','$cat1','$cat2','$make','$model','$year','$fuel','$transmission','$bodyType','$color','$price','$location','$condition','$description','$name','$email','$phone','Active',$timestamp2)";
$sql = "INSERT INTO skelbimai (cover1file,ip,user,title,cat1,cat2,make,model,year,fuel,transmission,bodyType,color,price,location,condition2,description,name,email,phone,active,timestamp2) VALUES ('$images1file[$cover]','$ip','$user','$title','$cat1','$cat2','$make','$model','$year','$fuel','$transmission','$bodyType','$color','$price','$location','$condition','$description','$name','$email','$phone','Active',$timestamp2)";
$ad_id=sqlconnect($sql);
//echo '<h3>'.$ad_id.'</h3>';

	//save image to db
	//echo count($images1).'   ';
	for($i=0;$i<count($images1);$i++){
		$x='';
		if($i==$cover){$x='cover';}
		//$img1=$images1[$i];
		//$img2=$images2[$i];
		$file1=$images1file[$i];
		$file2=$images2file[$i];
		//$sql = "INSERT INTO images (images1,images2,ad_id,cover,images1file,images2file) VALUES ('$img1','$img2','$ad_id','$x','$file1','$file2')";
		$sql = "INSERT INTO images (ad_id,cover,images1file,images2file) VALUES ('$ad_id','$x','$file1','$file2')";
		$result=sqlconnect($sql);
		//echo $result.'   ';
		$_SESSION['last_id']=$result;
		$_SESSION['ad_id']=$ad_id;
		
		
	}
	
	
	
	
	print $success ? $file : 'Unable to save the file.';
	//echo $ad_id;
	
?>