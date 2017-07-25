<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="Ireland Free classified adverts, free car ads">
      <meta name="author" content="Marius Vorosilovas">
      <title>Easyads classified free adverts</title>
      
	 <script src="/easyads/js/jquery-3.2.1.js"></script>
	  
	  <!-- Favicon Icon -->
      <link rel="apple-touch-icon" sizes="76x76" href="/easyads/images/apple-icon.png">
      <link rel="icon" type="image/png" href="/easyads/images/favicon.png">
      <!-- Bootstrap CSS -->    
	  <link href="/easyads/css/bootstrap.min.css" rel="stylesheet">
	  <!-- Google Font -->
      <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:regular,700,600&amp;latin" type="text/css" />
      <!-- Custom CSS -->
      <link href="/easyads/css/style.css" rel="stylesheet">
	  <link href="/easyads/css/style2.css" rel="stylesheet">
	  <!-- favourites, myads CSS -->
      <link href="/easyads/css/myfav.css" rel="stylesheet">
      <!-- Owl Carousel -->
      <link rel="stylesheet" href="/easyads/plugins/owl-carousel/owl.carousel.css">
      <link rel="stylesheet" href="/easyads/plugins/owl-carousel/owl.theme.css">
      <!-- Font Awesome   -->
      <link href="/easyads/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	  
   </head>
   
   <style>
.overlay {
    height: 0%;
    width: 100%;
    position: fixed;
    z-index: 5;
    top: 0;
    left: 0;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0, 0.9);
    overflow-y: hidden;
    transition: 0.5s;
}

.overlay-content {
    position: relative;
	top: 50%;
	transform: translateY(-50%);
    text-align: center;
    margin: 30px;
}

.overlay a {
    padding: 8px;
    text-decoration: none;
    font-size: 36px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.overlay a:hover, .overlay a:focus {
    color: #f1f1f1;
}

.overlay .closebtn {
    position: absolute;
    top: 20px;
    right: 45px;
    font-size: 60px;
	z-index: 10;
}

@media screen and (max-height: 450px) {
  .overlay {overflow-y: auto;}
  .overlay a {font-size: 20px}
  .overlay .closebtn {
    font-size: 40px;
    top: 15px;
    right: 35px;
  }
}
   
.img_divas {
	height:235px;
	width:235px;
	margin-bottom:15px;
	margin-right:10px;
	display:inline-block;
	border-radius: 5px;
	border-style:solid;
	border-width:1px;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}   
   
.thumbnail2 {
	margin: 15px;
	border-radius: 5px;
	
}
  
   .card .card-image{
	  
    overflow: hidden;
   
}

.card .card-image img{
	 opacity: 0.8;
	-webkit-transition: opacity 1s; /* For Safari 3.1 to 6.0 */
    transition: opacity 0.5s;
	filter: alpha(opacity=80); /* For IE8 and earlier */
   
}

.card .card-image:hover img{
	opacity: 1.0;
	filter: alpha(opacity=100); /* For IE8 and earlier */
   
}

.card{
    font-family: 'Roboto', sans-serif; 
    margin-top: 0px;
	margin-bottom: 18px;
    position: relative;
    -webkit-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
  -moz-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
  box-shadow: 4 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
}

.card .card-content {
    padding: 10px;    
}

.card .card-content .card-title, .card-reveal .card-title{
    font-size: 12px;
    font-weight: 200;    
}

.card .card-action{
    padding: 20px;
    border-top: 1px solid rgba(160, 160, 160, 0.2);
}
@media only screen and (max-width: 786px) { 
  #categories_left,#filter,#c_list,#c_grid,#b_search,#similar { 
    display: none; 
  } 
}
   </style>
   
   
   <body>
<?php
session_start();
if(isset($_COOKIE['user'])){$_SESSION['user']=$_COOKIE['user'];}
//require_once ('incl/defined_vars.php');

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$segments = explode('/', $path);
//echo($path);
//echo $segments[3];
//for($a=1;$a<count($segments);$a++){echo $a.'  -  '.$segments[$a].'<br>';}

switch($segments[2]){
case 'blog':
    require('top_nav.php');
	$_SESSION['heading']='Blog';
    require('breadcumb.php');
    if(isset($segments[3])){require('blog1.php');}else{require('blog.php');}
    require('footer_short.php');
    break;
case 'edit':
    require('top_nav.php');
    require('left_profile.php');
    require('edit.php');
    require('footer_short.php');
    break;
case 'favourite':
    require('top_nav.php');
    require('left_profile.php');
    require('favourite.php');
    require('footer_short.php');
    break;
case 'my_ads':
    require('top_nav.php');
    require('left_profile.php');
    require('my_ads.php');
    require('footer_short.php');
    break;
case 'my_details':
    require('top_nav.php');
    require('left_profile.php');
    require('my_details.php');
    require('footer_short.php');
    break;
  case '':
  case 'home':
    require('top_nav.php');
    require('home_search_box.php');
    require('categories_list2.php');
    //require('featured.php');
    //require('app_store.php');
    require('footer.php');
    break;
  case 'login':
    require('top_nav.php');
	$_SESSION['heading']='Log in';
    require('breadcumb.php');
    require('login.php');
    require('footer_short.php');
    break;
case 'signup':
    require('top_nav.php');
	$_SESSION['heading']='Sign up';
    require('breadcumb.php');
    require('signup.php');
    require('footer_short.php');
    break;
  case 'post_ad':
  case 'post':
    require('top_nav.php');
	$_SESSION['heading']='Post your ad';
    require('breadcumb.php');
    require('post_ad.php');
    require('footer_short.php');
    break;
case 'items':
	unset($_SESSION['s_location']);
	unset($_SESSION['search']);
	unset($_SESSION['cat1']);
	
	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$segments = explode('?', $actual_link);
	//echo $segments[1];
	if(count($segments)>1){
		parse_str($segments[1]);
		if(isset($location)){if($location!=='All Locations'){$_SESSION['s_location']=$location;}}
		if(isset($cat1)){if($cat1!=='All Category'){$_SESSION['cat1']=$cat1;}}
		if(isset($search)){$_SESSION['search']=$search;}
	}
	if(isset($item)){
		require('top_nav.php');
		require('breadcumb_search.php');
		require('item.php');
		require('footer.php');
	}else{
		require('top_nav.php');
		require('breadcumb_search.php');
		require('ad_list.php');
		require('footer.php');
	}
    break;
  default:
    require('top_nav.php');
	$_SESSION['heading']='Page not found!';
    require('breadcumb.php');
    require('not_found.php');
    require('footer_short.php');
    break;
}
?>
      <!-- Post Ad -->	
      <a href="/easyads/post_ad/" data-toggle="tooltip" data-placement="left" title="Post Your Ad" class="btn btn-primary btn-lg post-free-add-btn" style="z-index: 2;"><i class="fa fa-pencil"></i></a>
      <!-- jQuery -->
      
      <!-- Custom js--> 
      <script src="/easyads/js/custom.js"></script>
      <!-- Bootstrap JavaScript <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  -->
	  <script src="/easyads/js/bootstrap.min.js"></script>
      
      <!-- Owl Carousel -->
      <script src="/easyads/plugins/owl-carousel/owl.carousel2.js"></script>

   </body>
</html>