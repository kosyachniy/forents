<?php
include('func.php');
$ip=$_SERVER['REMOTE_ADDR'];
$_SESSION['auth']=1;
$_SESSION['user']=$ip;
$_SESSION['access']=11;
$_SESSION['fio']='';
setcookie('user', '', time()+31536000);
setcookie('password', '', time()+31536000);
$str=$_SERVER['HTTP_REFERER'];
header("location: $str");
act(9, 'Вышел');
?>