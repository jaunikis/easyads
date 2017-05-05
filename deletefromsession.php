<?php
session_start();
$x=$_GET["x"]-1;
//istrina image name is array
if(isset($_SESSION['images'])){$images=$_SESSION['images'];
//delete image file
unlink('tempimages/'.$images[$x]);

array_splice($images, $x, 1);
$_SESSION['images']=$images;
}




$response = $x;


echo json_encode($response);
?>