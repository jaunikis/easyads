<?php
session_start();
echo'test ok<br>';
if(isset($_GET['page_id'])){echo $_GET['page_id'];}

$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$url1=$_SERVER['HTTP_HOST'];
$url2=$_SERVER['REQUEST_URI'];
preg_match("/[^\/]+$/", $_SERVER['REQUEST_URI'], $matches);

echo '<hr>';
var_dump(parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH));
echo '<hr>';

echo 'url '.$url.'<br>';
echo 'url1 '.$url1.'<br>';
echo 'url2 '.$url2.'<br>';

echo basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

echo'<hr><hr>';
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$segments = explode('/', $path);

echo'<br>';

for($a=1;$a<count($segments);$a++){
	
	echo $segments[$a].'<br>';
}
$_SESSION['adresas']=$segments;


header('Location: /easyads/'); 
?>