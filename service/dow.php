<?php
include('../sys/func.php');
$name=$GET['i']
upload('../load/img/', $name);
session_start();
$_SESSION['fil']=0;
$_SESSION['fnam']=$name;
$db=db('');
act(3, 'фото: '.$name);
header('location: ./?i='.$name);
?>