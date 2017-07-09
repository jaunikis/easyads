<?php
session_start();
if(isset($_POST['i'])){$i=$_POST['i'];}
if(isset($_POST['images1'])){$images1=$_POST['images1'];}
if(isset($_POST['images2'])){$images2=$_POST['images2'];}

$fileName1=$_SESSION['images1'][$i];
$fileName2=$_SESSION['images2'][$i];
unlink('../ads_temp_images/'.$fileName1); //delete image
unlink('../ads_temp_images/'.$fileName2); //delete image

//upload file 1
$img=$images1;
list($type, $img) = explode(';', $img);
list(, $img)      = explode(',', $img);
$data = base64_decode($img);
$success = file_put_contents('../ads_temp_images/'.$fileName1, $data);

//upload file 2
$img=$images2;
list($type, $img) = explode(';', $img);
list(, $img)      = explode(',', $img);
$data = base64_decode($img);
$success = file_put_contents('../ads_temp_images/'.$fileName2, $data);

echo $i;
?>