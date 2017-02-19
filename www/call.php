<?php
header('Content-type: text/html; charset=utf-8');
print '<div style="width: 100%; height: 49%; padding-top: 10%; font-size: 30px; font-family: \'Lato\', sans-serif;">
<form action="call-form.php" method="post">
<table style="width: 100%;">
<tr><td>Ваше имя: </td><td><input name="name" type="text" style="width: 100%;"></td></tr>
<tr><td>Ваш телефон: </td><td><input name="tel" type="text" style="width: 100%;"></td></tr>
<tr><td colspan="2"><input type="submit" value="Заказать звонок" style="width: 100%; background-color: #fff; border: 1px solid #000;"></td></tr>
</table>
</form></div>';
?>