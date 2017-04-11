<?php
include ('sys/func.php');
$db=db('');

$a=$_GET['i'];
$b=$_POST['cont'];

act(5,'note '.$a.' - '.$b); 

header("location: ./");
mysqli_query($db,"UPDATE `note` SET `cont`='$b' WHERE `id`='$a';");
?>