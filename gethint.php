<?php
// get the q parameter from URL
$title = ' '.$_GET["q"];

$hint = "";

if (strripos($title, 'car') == true) {$hint='Cars';}
if (strripos($title, 'cars ') == true) {$hint='Cars';}
if (strripos($title, 'vehicle') == true) {$hint='Cars';}
if (strripos($title, 'acura') == true) {$hint='Cars/Acura';}
if (strripos($title, 'alfa romeo') == true) {$hint='Cars/Alfa Romeo';}
if (strripos($title, 'aston martin') == true) {$hint='Cars/Aston Martin';}
if (strripos($title, 'audi') == true) {$hint='Cars/Audi';
	if (strripos($title, 'a1') == true) {$hint='Cars/Audi/A1';}
	if (strripos($title, 'a2') == true) {$hint='Cars/Audi/A2';}
	if (strripos($title, 'a3') == true) {$hint='Cars/Audi/A3';}
	if (strripos($title, 'a4') == true) {$hint='Cars/Audi/A4';}
	if (strripos($title, 'a5') == true) {$hint='Cars/Audi/A5';}
	if (strripos($title, 'a6') == true) {$hint='Cars/Audi/A6';}
	if (strripos($title, 'a7') == true) {$hint='Cars/Audi/A7';}
	if (strripos($title, 'a8') == true) {$hint='Cars/Audi/A8';}
	}
if (strripos($title, 'bentley') == true) {$hint='Cars/Bentley';}
if (strripos($title, 'bmw') == true) {$hint='Cars/Bmw';}
if (strripos($title, 'citroen') == true) {$hint='Cars/Citroen';}
if (strripos($title, 'daewoo') == true) {$hint='Cars/Daewoo';}

// Output "no suggestion" if no hint was found or output correct values 
echo $hint === "" ? "no suggestion" : $hint;
//echo '-'.$title;
?>
