<?php
include('sys/func.php');
$db=db('');
$a=$_GET['i'];
act(6,'note '.$a);
mysqli_query($db,"DELETE FROM `note` WHERE `id`='$a'");
header("location: ./?a=1");
?>