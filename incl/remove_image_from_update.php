<?php
session_start();
require_once ('server.php');
if(isset($_POST['i'])){$i=$_POST['i'];}

$_SESSION['images_to_delete'][]=$i;

/*
//db images result
$sql="SELECT images1file,images2file FROM images WHERE id='$i'";
$result2=sqlconnect($sql);
$row2 = $result2->fetch_assoc();
		$images1=$row2['images1file'];
		$images2=$row2['images2file'];


unlink('../ads_images/'.$images1); //delete image
unlink('../ads_images/'.$images2); //delete image

//delete from db
$sql="DELETE FROM images WHERE id='$i'";
$result2=sqlconnect($sql);
*/

//echo $result2;
?>