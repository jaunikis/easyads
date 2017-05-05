<?php

$_SESSION['user']=$row['name'];
$_SESSION['email']=$user_email;
$_SESSION['password']=$password;
$_SESSION['phone']=$row['phone'];
$_SESSION['registered']=$row['registered'];
$_SESSION['email']=$row['email'];
$_SESSION['photo']=$row['photo'];
$_SESSION['active']=$row['active'];
$_SESSION['location']=$row['location'];
?>