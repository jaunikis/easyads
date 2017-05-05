<?php
session_start();

$filename = md5(mt_rand()).'.jpg';
$status = (boolean) move_uploaded_file($_FILES['photo1']['tmp_name'], 'ads_images/small_'.$filename);
$status = (boolean) move_uploaded_file($_FILES['photo2']['tmp_name'], 'ads_images/big_'.$filename);


//perkelia faila
//rename('tempimages/'.$filename, 'images/'.$filename);

//test
//$_SESSION['test']=$_FILES['photo'];

//isssaugo image name i array
if(isset($_SESSION['images'])){$images=$_SESSION['images'];}
$images[]=$filename;
$_SESSION['images']=$images;

//issaugo files i array
//if(isset($_SESSION['files'])){$files=$_SESSION['files'];}
//$files[]=$_FILES['photo'];
//$_SESSION['files']=$files;

//$response = (object) [
//	'status' => $status
//];

//if ($status) {
//$response->url = '/easyads/tempimages/'.$filename;
$response='testas';
//}

echo json_encode($response);

?>
