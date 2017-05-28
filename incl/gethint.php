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
if (strripos($title, 'site') == true){$hint='Real Estate/Land & Estates';}
if (strripos($title, 'detached house') == true){$hint='Real Estate/For Sale';}
if (strripos($title, 'terraced house') == true){$hint='Real Estate/For Sale';}
if (strripos($title, 'bungalow') == true){$hint='Real Estate/For Sale';}

if (strripos($title, 'game') == true){$hint='Electronics/Games & Consoles';}
if (strripos($title, 'wii') == true){$hint='Electronics/Games & Consoles';}
if (strripos($title, 'ps2') == true){$hint='Electronics/Games & Consoles';}
if (strripos($title, 'ps3') == true){$hint='Electronics/Games & Consoles';}
if (strripos($title, 'ps4') == true){$hint='Electronics/Games & Consoles';}
if (strripos($title, 'kinect') == true){$hint='Electronics/Games & Consoles';}
if (strripos($title, 'console') == true){$hint='Electronics/Games & Consoles';}
if (strripos($title, 'gaming') == true){$hint='Electronics/Games & Consoles';}
if (strripos($title, 'psp') == true){$hint='Electronics/Games & Consoles';}

if (strripos($title, 'mobile phone') == true){$hint='Electronics/Mobile phones';
	if (strripos($title, 'apple') == true){$hint='Electronics/Mobile phones/Apple';}
	if (strripos($title, 'samsung') == true){$hint='Electronics/Mobile phones/Samsung';}
	}
if (strripos($title, 'iphone') == true){$hint='Electronics/Mobile phones/Apple';}
if (strripos($title, 'galaxy') == true){$hint='Electronics/Mobile phones/Samsung';}
if (strripos($title, 'xperia') == true){$hint='Electronics/Mobile phones/Sony';}
if (strripos($title, 'htc') == true){$hint='Electronics/Mobile phones/HTC';}

if (strripos($title, 'laptop') == true){$hint='Electronics/Laptops';
	if (strripos($title, 'apple') == true){$hint='Electronics/Laptops/Apple';}
	if (strripos($title, 'samsung') == true){$hint='Electronics/Laptops/Samsung';}
	}
if (strripos($title, 'macbook') == true){$hint='Electronics/Laptops/Apple';}
if (strripos($title, 'dell') == true){$hint='Electronics/Laptops/Dell';}
if (strripos($title, 'latitude') == true){$hint='Electronics/Laptops/Dell';}
if (strripos($title, 'acer') == true){$hint='Electronics/Laptops/Acer';}
if (strripos($title, 'asus') == true){$hint='Electronics/Laptops/Acer';}
if (strripos($title, 'envy') == true){$hint='Electronics/Laptops/HP';}
if (strripos($title, 'lenovo') == true){$hint='Electronics/Laptops/Lenovo';}
if (strripos($title, 'toshiba') == true){$hint='Electronics/Laptops/Toshiba';}
if (strripos($title, 'probook') == true){$hint='Electronics/Laptops/Apple';}

if (strripos($title, 'bed') == true){$hint='House & DIY/Furniture/Bedroom';}

if (strripos($title, 'table') == true){$hint='House & DIY/Furniture';}
if (strripos($title, 'cabinet') == true){$hint='House & DIY/Furniture';}
if (strripos($title, 'mexican pine') == true){$hint='House & DIY/Furniture';}
if (strripos($title, 'mahogany') == true){$hint='House & DIY/Furniture';}
if (strripos($title, 'chair') == true){$hint='House & DIY/Furniture';}
if (strripos($title, 'stool') == true){$hint='House & DIY/Furniture';}
if (strripos($title, 'kallax') == true){$hint='House & DIY/Furniture';}
if (strripos($title, 'kellax') == true){$hint='House & DIY/Furniture';}
if (strripos($title, 'bookcase') == true){$hint='House & DIY/Furniture';}
if (strripos($title, 'furniture') == true){$hint='House & DIY/Furniture';}
if (strripos($title, 'armchair') == true){$hint='House & DIY/Furniture';}

if (strripos($title, 'sofa') == true){$hint='House & DIY/Furniture/Living Room';}
if (strripos($title, 'coffe table') == true){$hint='House & DIY/Furniture/Living Room';}
if (strripos($title, 'fabric suite') == true){$hint='House & DIY/Furniture/Living Room';}
if (strripos($title, 'sitting room') == true){$hint='House & DIY/Furniture/Living Room';}
if (strripos($title, 'living room') == true){$hint='House & DIY/Furniture/Living Room';}
if (strripos($title, 'leather suite') == true){$hint='House & DIY/Furniture/Living Room';}
if (strripos($title, 'leather corner') == true){$hint='House & DIY/Furniture/Living Room';}
if (strripos($title, 'couch') == true){$hint='House & DIY/Furniture/Living Room';}

if (strripos($title, 'garden') == true){$hint='House & DIY/Garden';}

if (strripos($title, 'garden furniture') == true){$hint='House & DIY/Furniture/Garden';}
if (strripos($title, 'husqvarna') == true){$hint='House & DIY/Garden';}
if (strripos($title, 'castelgarden') == true){$hint='House & DIY/Garden';}
if (strripos($title, 'greenhouse') == true){$hint='House & DIY/Garden';}
if (strripos($title, 'lawnmower') == true){$hint='House & DIY/Garden';}
if (strripos($title, 'gazebo') == true){$hint='House & DIY/Garden';}

if (strripos($title, 'bike') == true){$hint='Sports/Cycling';}
if (strripos($title, 'bicycle') == true){$hint='Sports/Cycling';}

if (strripos($title, 'alloys') == true){$hint='Cars & Motor/Car Parts';}
if (strripos($title, 'tyres') == true){$hint='Cars & Motor/Car Parts';}

if (strripos($title, 'tractor') == true){$hint='Cars & Motor/Farming';}

if (strripos($title, 'nintendo') == true){$hint='Electronics/Games & Consoles';}
if (strripos($title, 'xbox') == true){$hint='Electronics/Games & Consoles';}
if (strripos($title, 'playstation') == true){$hint='Electronics/Games & Consoles';}
if (strripos($title, 'game') == true){$hint='Electronics/Games & Consoles';}
if (strripos($title, 'sega') == true){$hint='Electronics/Games & Consoles';}



// Output "no suggestion" if no hint was found or output correct values 


echo $hint === "" ? "nera" : $hint;
//echo $json['cat1'][1];
//echo '-'.$title;
?>
