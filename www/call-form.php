<?php
include ('sys/func.php');
$db=db('z');

$a=$_POST['name'];
$b=$_POST['tel'];

act(14,'звонок '.$a.' - '.$b); 

mail ('polozhev@mail.ru', 'Перезвонить ('.$a.')', 'Телефон: '.$b);
print '<html><body onload="window.close();"></body></html>';
?>