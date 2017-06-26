<?php
//echo'dfdf ';
$img=[];
$img=$_POST['img'];
//$images2=$_POST['images2'];

//for($i=0;$i<count($images1);$i++){
//	echo $images1[$i];
//}
$obj=json_decode($img,true);
for($i=0;$i<count($obj['images1']);$i++){
	//echo $obj['images1'][$i];
}

echo count($obj['images1']);
?>