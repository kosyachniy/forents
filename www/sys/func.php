<?php
header('Content-type: text/html; charset=utf-8');

/*
Ошибки
1 - Подключение невозможно
*/

function db($a)
{
//$db=mysqli_connect('localhost','root','a18988189a',$a);
$db=mysqli_connect('mysql.hostinger.ru','u696001181_z','asdrqwerty09','u696001181_'.$a);
if (mysqli_connect_errno()) print 'Ошибка #1: '.mysqli_connect_errno();
mysqli_query($db,'SET names "utf8"');
return $db;
}

function act($a,$b)
{
$db=db('z');
$c=$_SERVER['REMOTE_ADDR'];
$d=date('d.m.Y H:i:s');
if ($a==1) $t='Просмотрел';
  elseif ($a==2) $t='Добавил';
  elseif ($a==3) $t='Загрузил';
  elseif ($a==4) $t='Прокомментировал';
  elseif ($a==5) $t='Изменил';
  elseif ($a==6) $t='Удалил';
  elseif ($a==7) $t='Нравится';
  elseif ($a==8) $t='Навёл';
  elseif ($a==9) $t='Логин';
  elseif ($a==10) $t='Запрос';
  elseif ($a==11) $t='Настройки';
  elseif ($a==12) $t='Ошибка';
  elseif ($a==13) $t='Сообщение';
  elseif ($a==14) $t='Обратная связь';
$t.=' '.$b;
mysqli_query($db,"INSERT INTO `act`(`user`, `cont`, `time`) VALUES ('$c', '$t', '$d');");
}

function start($a,$b,$c)
{
act(1,$b);
$d=rand(1,mb_strstr(scandir($_SERVER['DOCUMENT_ROOT'].'/sys/bck/', 1)[0],'.',true));
print '<!Doctype html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=yes">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>'.$a.'</title>
    <link rel ="shortcut icon" type="images/png" href="/sys/logo.png">
    <meta name="author" content="Poloz Alexey">
    <meta name="keywords" content="'.$c.'">
    <meta name="description" content="'.$c.'">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="stylesheet" type="text/css" href="/sys/main.css">
  </head>
  <body style="zoom: 1; background: url(/sys/bck/'.$d.'.jpg) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;">
	<script type=\'text/javascript\'>
	if(window.innerWidth<=600)
	    location.href=\'/m/'.$b.'\';
	</script>
		<div class="a1">';
//<meta name="viewport" content="width=device-width; initial-scale=0.25; maximum-scale=0.25; user-scalable=0;" />
}

function finish()
{
print '</div>
		<div class="a2">
			<div class="a3">
			<img src="/sys/logo.png">
			<a href="/?i=0"><div>Главная</div></a>
			<a href="/service"><div>Наши услуги</div></a>
			<a href="/about/"><div>О нас</div></a>
			</div><div class="a4"><u>+7 981 163 55 78</u> или <u><a href="javascript:void(0)" onClick="javascript:window.open(\'/call.php\', \'Заказать обратный звонок\', \'width=500px, height=250px, left=400px, top=250px, status=no, toolbar=no, menubar=no, scrollbars=yes, resizable=yes\');">заказать звонок</a></u></div>
		</div>
</body></html>';
}
?>