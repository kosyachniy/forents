<?php
header('Content-type: text/html; charset=utf-8');
session_start();

/*
Ошибки
1 - Подключение невозможно
*/

function db($a)
{
$db=mysqli_connect('localhost','root','a18988189a','k'.$a);
//$db=mysqli_connect('mysql.hostinger.ru','u950474196_k','asdrqwerty09','u950474196_k'.$a);
if (mysqli_connect_errno()) print 'Ошибка #1: '.mysqli_connect_errno();
mysqli_query($db,'SET names "utf8"');
return $db;
}

function user($b)
  {
  $ip=$_SERVER['REMOTE_ADDR'];
  $cookie=$_COOKIE['user'];
  
  if ($_SESSION['auth']!=2 && $_SESSION['auth']!=1)
  {
  if ($cookie=='')
    {
    if ($_SESSION['auth']!=1 && $_SESSION['auth']!=2)
      { // Сообщение при первом входе в день
      $_SESSION['access']=11;
      $_SESSION['auth']=1;
      $_SESSION['user']=$ip;
      }
    }
   else
    {
    $u=mysqli_query($db,"SELECT * FROM `user` WHERE `user`='$cookie'");
    if ($u)
      {
      while ($a=mysqli_fetch_array($u))
        if ($_COOKIE['password']==$a['pas'])
          {
          $_SESSION['access']=$a['admin'];
          $_SESSION['user']=$cookie;
          $_SESSION['auth']=2;
          $_SESSION['fio']=$a['nam'].' '.$a['fam'];
          }
      }
    }
    }
  
  //1-Администратор, 2-Главный модератер(блокирование пользователей, изменение статей, добавление новостей сайта, служба поддержки), 10-Обычный пользователь, 11-Не авторизованный, 12-Пытался загрузить вирус, 13-Спамит, 14-Нарушает правила сайта(отпугивает людей от сайта, ...), 15-Взламывал сайт.
  
  if ($_SESSION['access']>12)
    print 'Ошибка 2. Вы заблокированы.';
   else
    {
    if ($_SESSION['auth']==2)
      {
      if ($b==1)
        return $_SESSION['user'];
       elseif ($b==3)
        return $_SESSION['user'].' <a href="/sys/php/out.php">Выйти</a>';
       elseif ($b==4)
        return 'Вы сейчас в пользователе '.$_SESSION['user'];
       elseif ($b==5)
        return $_SESSION['access'];
       elseif ($b==6)
        return $_SESSION['fio'];
      }
     else
      {
      if ($b==1)
        return $ip;
       elseif ($b==2)
        return 'Гость';
       elseif ($b==3)
        return 'Гость <a href="/set/login/">Войти</a>';
       elseif ($b==4)
        return 'Вы не вошли';
       elseif ($b==5)
        return $_SESSION['access'];
      }
    }
  }


function act($a,$b)
{
$db=db('');
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
  elseif ($a==15) $t='Поиск';
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
    <link rel="stylesheet" type="text/css" href="/sys/slider.css">
    <script src="/sys/main.js"></script>
  </head>
  <body>
	<script type=\'text/javascript\'>
	if(window.innerWidth<=600)
	    location.href=\'/m/'.$b.'\';
	</script>
		<center><div class="a1">';
//<meta name="viewport" content="width=device-width; initial-scale=0.25; maximum-scale=0.25; user-scalable=0;" />
//    <script type="text/javascript" src="/sys/jquery-1.6.1.min.js" ></script>
//    <script type="text/javascript" src="/sys/jquery.ui-slider.js"></script>
//    <script type="text/javascript" src="/sys/jquery.main.js"></script>
}

function finish()
{
print '</div></center>
		<div class="a2">
			<div class="a3">
			<a href="/?i=0"><img src="/sys/logo.png"></a>
			<a href="/?i=0"><div>Снять квартиру</div></a>
			<a href="/service"><div>Разместить</div></a>
			<a href="/about/"><div>О нас</div></a>
			</div><div class="a4"><form action="/sys/search.php" method="post" class="a8"><input placeholder="Поиск" name="search"></form><div>';
if ($_SESSION['auth']==2) print '<a href="/cabinet">'.$_SESSION['user'].'</a> &nbsp;<a href="/sys/out.php">Выйти</a>'; else print 'Гость &nbsp;<a href="/login">Войти</a></div></div>
		</div>
</body></html>';
}
?>