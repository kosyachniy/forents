<?php
include('sys/func.php');
$db=db('z');
$a=$_GET['i'];
$b=$_GET['a'];
if (!($a>=0)) $a=0;
if ($a>=1)
	{
	if ($b==1)
		{
		$c=mysqli_query($db,"SELECT * FROM `note` ORDER BY `id` DESC LIMIT 1");
		while($d=mysqli_fetch_array($c)) $e=$d['id']+1;
		if ($a==$e)
			{
			$t=date('d.m.Y H:i:s');
			mysqli_query($db,"INSERT INTO `note`(`nam`,`cont`,`photo`,`dop`,`price`,`time`,`tags`) VALUES ('Название','Содержание','','','0','$t','');");
			}
		}
	$c=mysqli_query($db,"SELECT * FROM `note` WHERE `id`='$a'");
	while($d=mysqli_fetch_array($c))
		{
		start($d['nam'],'?i='.$a,'');
		if ($b==1) print '<center><h1>'.$d['nam'].'</h1></center><form action="save.php?i='.$a.'" method="post"><textarea name="cont" style="width: 100%; height: 300px;">'.$d['cont'].'</textarea><input type="submit" value="Сохранить"></form><hr><center><a href="del.php?i='.$a.'"><div class="a5">Удалить</div></a></center>';
		  else print '<center><h1>'.$d['nam'].'</h1></center>'.nl2br($d['cont']);
		}
	
	}
  else
	{
	start('Главная','','все статьи');
	if ($b==1)
		{
		$c=mysqli_query($db,"SELECT * FROM `note` ORDER BY `id` DESC");
		while($d=mysqli_fetch_array($c)) print '<a href="?i='.$d['id'].'&a=1">'.$d['nam'].'</a><br>';
		$c=mysqli_query($db,"SELECT * FROM `note` ORDER BY `id` DESC LIMIT 1");
		while($d=mysqli_fetch_array($c)) $e=$d['id']+1;
		print '<hr><a href="?i='.$e.'&a=1">Создать страницу</a>';
		}
	  else
		{
		$c=mysqli_query($db,"SELECT * FROM `note` ORDER BY `id` DESC");
		while($d=mysqli_fetch_array($c)) print '<a href="?i='.$d['id'].'">'.$d['nam'].'</a><br>';
		}
	}
finish($b);
?>