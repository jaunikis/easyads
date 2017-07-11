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

if(isset($_POST['cover'])){$cover=$_POST['cover'];if($cover==''){$cover=0;}}
if(isset($_POST['title'])){$title=$_POST['title'];}
if(isset($_POST['cat1'])){$cat1=$_POST['cat1'];}
if(isset($_POST['cat2'])){$cat2=$_POST['cat2'];}
if(isset($_POST['make'])){$make=$_POST['make'];}
if(isset($_POST['model'])){$model=$_POST['model'];}
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
if(isset($_POST['ad_id'])){$ad_id=$_POST['ad_id'];}

if(isset($_SESSION['user'])){$user=$_SESSION['user'];}

if(isset($_SESSION['images_to_delete'])){$images_to_delete=$_SESSION['images_to_delete'];
	//db images result
	$sql="SELECT images1file,images2file FROM images WHERE id='$ad_id'";
	$result2=sqlconnect($sql);
	$row2 = $result2->fetch_assoc();
		$images1=$row2['images1file'];
		$images2=$row2['images2file'];
	unlink('ads_images/'.$images1); //delete image
	unlink('ads_images/'.$images2); //delete image


	$str='';
	for($a=0;$a<count($images_to_delete);$a++){
		$str.=$images_to_delete[$a].',';
	}
	$str=rtrim($str,',');
	$sql='DELETE FROM images WHERE id IN ('.$str.')';
	$result2=sqlconnect($sql);
	//echo $sql;
}


//echo $title;

$images1=[];
$images2=[];
$sql="SELECT images1file,images2file FROM images WHERE ad_id='$ad_id' ORDER BY cover DESC";
$result2=sqlconnect($sql);
$xx=-1;
while ($row2 = $result2->fetch_assoc()) {
		$images1[]=$row2['images1file'];
		$images2[]=$row2['images2file'];
		$xx++;
	}

//echo $images1[$cover];
//add new images
if(isset($_SESSION['images1'])){
	$images1file=$_SESSION['images1'];
	$images2file=$_SESSION['images2'];

//save image to db
	//echo count($images1).'   ';
	
//nutriname visus cover
if($cover>$xx){
$sql="UPDATE images SET cover='' WHERE ad_id='$ad_id'";
$res=sqlconnect($sql);
}
	
	for($i=0;$i<count($images1file);$i++){
		$x='';
		if($cover>$xx && $i+$xx+1==$cover){$x='cover';}
		//$img1=$images1[$i];
		//$img2=$images2[$i];
		$images1[]=$images1file[$i];
		$images2[]=$images2file[$i];
		$file1=$images1file[$i];
		$file2=$images2file[$i];
		rename('ads_temp_images/'.$file1,'ads_images/'.$file1);
		rename('ads_temp_images/'.$file2,'ads_images/'.$file2);
		//$sql = "INSERT INTO images (images1,images2,ad_id,cover,images1file,images2file) VALUES ('$img1','$img2','$ad_id','$x','$file1','$file2')";
		$sql = "INSERT INTO images (ad_id,cover,images1file,images2file) VALUES ('$ad_id','$x','$file1','$file2')";
		$result=sqlconnect($sql);
		//echo $result.'   ';
		//$_SESSION['last_id']=$result;
		//$_SESSION['ad_id']=$ad_id;
	}
}
$coveris=$images1[$cover];
//echo 'cover: '.$cover;

//nutrina cover
$sql="UPDATE images SET cover='' WHERE ad_id='$ad_id'";
$res=sqlconnect($sql);

//ideda cover
$sql="UPDATE images SET cover='cover' WHERE images1file='$coveris'";
$res=sqlconnect($sql);

	
$sql="UPDATE skelbimai SET cover1file='$coveris',title='$title',cat1='$cat1',cat2='$cat2',make='$make',model='$model',year='$year',fuel='$fuel',
transmission='$transmission',bodyType='$bodyType',color='$color',price='$price',location='$location',description='$description',
name='$name',email='$email',phone='$phone' WHERE id='$ad_id'";
$result=sqlconnect($sql);

header("Location: /easyads/my_ads");
?>