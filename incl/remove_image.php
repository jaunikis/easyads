<?php
session_start();
if(isset($_POST['i'])){$i=$_POST['i'];}

unlink('../ads_temp_images/'.$_SESSION['images1'][$i]); //delete image
array_splice($_SESSION['images1'],$i,1); //unset array

unlink('../ads_temp_images/'.$_SESSION['images2'][$i]); //delete image
array_splice($_SESSION['images2'],$i,1); //unset array

echo count($_SESSION['images1']);
?>