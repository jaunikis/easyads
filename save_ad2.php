<?php
require_once ('incl/server.php');
session_start();

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

if(isset($_POST['cover'])){$cover=$_POST['cover'];if($cover==''){$cover=0;}}
if(isset($_POST['title'])){$title=$_POST['title'];}
if(isset($_POST['cat1'])){$cat1=$_POST['cat1'];}
if(isset($_POST['cat2'])){$cat2=$_POST['cat2'];}
if(isset($_POST['cat3'])){$make=$_POST['cat3'];}
if(isset($_POST['cat4'])){$model=$_POST['cat4'];}
if(isset($_POST['year'])){$year=$_POST['year'];if($year==''){$year=0;}}
if(isset($_POST['fuel'])){$fuel=$_POST['fuel'];}
if(isset($_POST['transmission'])){$transmission=$_POST['transmission'];}
if(isset($_POST['bodyType'])){$bodyType=$_POST['bodyType'];}
if(isset($_POST['color'])){$color=$_POST['color'];}
if(isset($_POST['price'])){$price=$_POST['price'];}
if(isset($_POST['location'])){$location=$_POST['location'];}
if(isset($_POST['description'])){$description=$_POST['description'];}
if(isset($_POST['name'])){$name=$_POST['name'];}
if(isset($_POST['email'])){$email=$_POST['email'];}
if(isset($_POST['phone'])){$phone=$_POST['phone'];}

$cover=intval($cover);
$images1file=$_SESSION['images1'];
$images2file=$_SESSION['images2'];
//$sql = "INSERT INTO skelbimai (cover,cover1file,ip,user,title,cat1,cat2,make,model,year,fuel,transmission,bodyType,color,price,location,condition2,description,name,email,phone,active,timestamp2) VALUES ('$images1[$cover]','$images1file[$cover]','$ip','$user','$title','$cat1','$cat2','$make','$model','$year','$fuel','$transmission','$bodyType','$color','$price','$location','$condition','$description','$name','$email','$phone','Active',$timestamp2)";
$sql = "INSERT INTO skelbimai (cover1file,ip,user,title,cat1,cat2,make,model,year,fuel,transmission,bodyType,color,price,location,condition2,description,name,email,phone,active,timestamp2) VALUES ('$images1file[$cover]','$ip','$user','$title','$cat1','$cat2','$make','$model','$year','$fuel','$transmission','$bodyType','$color','$price','$location','$condition','$description','$name','$email','$phone','Active',$timestamp2)";
$ad_id=sqlconnect($sql);
//echo '<h3>'.$ad_id.'</h3>';

	//save image to db
	//echo count($images1).'   ';
	for($i=0;$i<count($images1file);$i++){
		$x='';
		if($i==$cover){$x='cover';}
		//$img1=$images1[$i];
		//$img2=$images2[$i];
		$file1=$images1file[$i];
		$file2=$images2file[$i];
		rename('ads_temp_images/'.$file1,'ads_images/'.$file1);
		rename('ads_temp_images/'.$file2,'ads_images/'.$file2);
		//$sql = "INSERT INTO images (images1,images2,ad_id,cover,images1file,images2file) VALUES ('$img1','$img2','$ad_id','$x','$file1','$file2')";
		$sql = "INSERT INTO images (ad_id,cover,images1file,images2file) VALUES ('$ad_id','$x','$file1','$file2')";
		$result=sqlconnect($sql);
		//echo $result.'   ';
		$_SESSION['last_id']=$result;
		$_SESSION['ad_id']=$ad_id;
		
		
	}

	echo 'id:'.$ad_id.' cover:'.$cover;
	echo '<p><a href="/easyads/items">easyads/items</a></p>';
	//header("Location: /easyads/items");
	
	
?>