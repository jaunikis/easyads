<?php
session_start();
if(isset($_POST['x'])){$x=$_POST['x']-1;}
if(isset($_SESSION['images'])){$images=$_SESSION['images'];


$rotateFilename = 'tempimages/'.$images[$x]; // PATH

$degrees = 270;
$fileType = strtolower(substr('your_image.image_type', strrpos('your_image.image_type', '.') + 1));


//echo '<script> alert("namas"); <script>';
   header('Content-type: image/jpeg');
   $source = imagecreatefromjpeg($rotateFilename);
   // Rotate
   $rotate = imagerotate($source, $degrees, 0);
   imagejpeg($rotate,$rotateFilename);


// Free the memory
imagedestroy($source);
imagedestroy($rotate);

echo $rotateFilename;
}
?>