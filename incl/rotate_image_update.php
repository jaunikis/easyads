<?php
if(isset($_POST['id'])){$id=$_POST['id'];}
if(isset($_POST['cov'])){$cov=$_POST['cov'];}
if(isset($_POST['images1'])){$images1=$_POST['images1'];}
if(isset($_POST['images2'])){$images2=$_POST['images2'];}
if(isset($_POST['fileName1'])){$fileName1=$_POST['fileName1'];}
if(isset($_POST['fileName2'])){$fileName2=$_POST['fileName2'];}

//$img1='..'.substr($img3src,16);
//$img2='..'.substr($img2src,16);
$img1='../ads_images/'.$fileName1;
$img2='../ads_images/'.$fileName2;

unlink($img1);
unlink($img2);

define('UPLOAD_DIR', '../ads_images/');
//upload file 1
$img=$images1;
list($type, $img) = explode(';', $img);
list(, $img)      = explode(',', $img);
$data = base64_decode($img);
$date = new DateTime();$timestamp2=$date->getTimestamp();
$rnd=$timestamp2.'-'. uniqid();
$file1 = $rnd . '-small.jpg';
$success = file_put_contents(UPLOAD_DIR.$file1, $data);

//upload file 2
$img=$images2;
list($type, $img) = explode(';', $img);
list(, $img)      = explode(',', $img);
$data = base64_decode($img);
$file2 = $rnd . '-large.jpg';
$success = file_put_contents(UPLOAD_DIR.$file2, $data);

require_once ('server.php');
//delete from db images
$sql="DELETE FROM images WHERE images1file='$fileName1'";
$result=sqlconnect($sql);

//add new image to db
$sql="INSERT INTO images (ad_id,cover,images1file,images2file) VALUES ('$id','$cov','$file1','$file2')";
$result=sqlconnect($sql);

//if cover update skelbimai
if($cov=='cover'){
$sql="UPDATE skelbimai SET cover1file='$file1' WHERE id='$id'";
$result=sqlconnect($sql);
}

echo $file1;
?>