<?php
// get the q parameter from URL
$q=$_GET["q"];
$title = ' '.$_GET["q"];
$hint = "";
$string = file_get_contents("../categories-list.txt");
$json = json_decode($string, true);
$test='Audi';
for($i=0;$i<count($json['Cars']);$i++){
	if (strripos($title, $json['Cars'][$i]) == true) {$hint='Cars & Motor/Cars/'.$json['Cars'][$i];
		for($mo=0;$mo<count($json[$json['Cars'][$i]]);$mo++){
			if (strripos($title, $json[$json['Cars'][$i]][$mo]) == true) {$hint.='/'.$json[$json['Cars'][$i]][$mo];}
		}
		//$hint.='/'.$json[$json['Cars'][$i]][1];
	}
	
	
}


// Output "no suggestion" if no hint was found or output correct values 


echo $hint === "" ? "nera" : $hint;
//echo $json['cat1'][1];
//echo '-'.$title;
?>
