<?php 
session_start();
setcookie('user', '', time() - 63600);
unset($_COOKIE["user"]);
if(isset($_SESSION['user'])){unset($_SESSION['user']);}
if(isset($_SESSION['email'])){unset($_SESSION['email']);}
if(isset($_SESSION['phone'])){unset($_SESSION['phone']);}
//echo $_COOKIE['user'];
header('Location: /easyads/');
?>