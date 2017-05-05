<?php
require_once ('incl/server.php');


session_start();
$tdate=date("d/m/Y");
$time=date("H:i:sa");
$ip=$_SERVER['REMOTE_ADDR'];
$user='test user';
$cat1='cat1';$cat2='cat2';
$make='';$model='';$year=0;$condition='';
$price='';$location='All';
$images=[''];$cover=0;
$name='';$email='';$phone='';
if(isset($_SESSION['user'])){$user=$_SESSION['user'];}

if(isset($_POST['title'])){$title=$_POST['title'];}
if(isset($_POST['cat1'])){$cat1=$_POST['cat1'];}
if(isset($_POST['cat2'])){$cat2=$_POST['cat2'];}
if(isset($_POST['make'])){$make=$_POST['make'];}
if(isset($_POST['model'])){$model=$_POST['model'];}
if(isset($_POST['year'])){$year=$_POST['year'];}
if(isset($_POST['condition'])){$condition=$_POST['condition'];}
if(isset($_POST['price'])){$price=$_POST['price'];}
if(isset($_POST['location'])){$location=$_POST['location'];}
if(isset($_POST['description'])){$description=$_POST['description'];}
if(isset($_POST['name'])){$name=$_POST['name'];}
if(isset($_POST['email'])){$email=$_POST['email'];}
if(isset($_POST['phone'])){$phone=$_POST['phone'];}
if(isset($_POST['cover'])){$cover=$_POST['cover']-1;}

/*
echo 'form:<hr>';
if(isset($title)){echo 'title: '.$title.'<br>';}
if(isset($cat1)){echo 'cat1: '.$cat1.'<br>';}
if(isset($cat2)){echo 'cat2: '.$cat2.'<br>';}
if(isset($make)){echo 'make: '.$make.'<br>';}
if(isset($model)){echo 'model: '.$model.'<br>';}
if(isset($year)){echo 'year: '.$year.'<br>';}
if(isset($condition)){echo 'condition: '.$condition.'<br>';}
if(isset($price)){echo 'price: '.$price.'<br>';}
if(isset($location)){echo 'location: '.$location.'<br>';}
if(isset($description)){echo 'description: '.$description.'<br>';}
if(isset($name)){echo 'name: '.$name.'<br>';}
if(isset($email)){echo 'email: '.$email.'<br>';}
if(isset($phone)){echo 'phone: '.$phone.'<br>';}
if(isset($cover)){echo 'cover: '.$cover.'<br>';}
*/

if(isset($_SESSION['images'])){ $images=$_SESSION['images'];}

$date = new DateTime();$timestamp2=$date->getTimestamp();

//save to db
$sql = "INSERT INTO skelbimai (ip,user,title,cat1,cat2,cover,make,model,year,price,location,condition2,description,name,email,phone,active,timestamp2) VALUES ('$ip','$user','$title','$cat1','$cat2','$images[$cover]','$make','$model','$year','$price','$location','$condition','$description','$name','$email','$phone','no',$timestamp2)";

$result=sqlconnect($sql);

//echo '<hr>';
//echo $result;

$last_id=$result;

$_SESSION['last_id']=$last_id;
echo ($last_id);


//images..
if (isset($_SESSION['images'])){ 
echo '<br>';
//echo json_encode($images);
//echo '<br>';
$arrlength = count($images);

for($x = 0; $x < $arrlength; $x++) {
    $coverim='';
	if($x==$cover){$coverim='yes';echo '<b>';}
	if(isset($images[$x])){echo $x.' - '.$images[$x];
	if($x==$cover){echo '</b>';}
    echo "<br>";
	rename('tempimages/'.$images[$x], 'ads_images/'.$images[$x]);
	
//save images to db
$sql = "INSERT INTO images (user,src,addid,cover) VALUES ('$user','$images[$x]','$last_id','$coverim')";
sqlconnect($sql);
	}
}// for
}else{echo 'images not set';} //isset images

$link='Location: /easyads/items/'.$cat1.'/'.$cat2;
if($make!==''){$link.='/'.$make;}
if($model!==''){$link.='/'.$model;}
$link.='?item='.$last_id;
//echo 'link='.$link;

header($link);
?>
