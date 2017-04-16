<?php
include('sys/func.php');
$db=db('');
$a=$_GET['i'];
if (!($a>=0)) $a=0;
if ($a>=1)
	{
	$c=mysqli_query($db,"SELECT * FROM `note` WHERE `id`='$a'");
	while($d=mysqli_fetch_array($c))
		{
		start($d['nam'],'?i='.$a,'');
		print '<center><h1>';
		if ($d['nam']) print $d['nam'];
		  else print $d['city'].', '.$d['street'].', '.$d['house'].', '.$d['apartment'];
		print '</h1></center><img src="load/img/'.$d['id'].'-1.jpg"><br><br>'.nl2br($d['dop']).'<hr>'.nl2br($d['cont']);
		}
	}
  else
	{
	start('Главная','','');
	print '<div class="c9"><div><center><div class="c1">
	<div>Время
		<div>123</div>
	</div><div>Регион
		<div>123</div>
	</div><div>Гости
		<div>123</div>
	</div><div>Цена
		<div>123</div>
	</div><div>Тип
		<div>123</div>
	</div>
</div>
<div class="c7">
	<div class="c8">
		<form action="/sys/search.php" method="post"><input placeholder="Поиск" name="search"></form>
	</div><div onclick="change(this);" class="c2">
		<div>Расширенный поиск</div>
	</div><div style="display: none;" class="c4">
		<form action="fltr.php" method="post">
			<label><input type="checkbox" name="photo"><div>Только с фото</div></label><hr><br>';
$cat=array('price','floor','meter');
$nam=array('Цена','Этаж','Метраж');
for ($i=0; $i<=count($cat)-1; $i++)
	print '<div class="main" style="margin: 0 50px 0 50px;">
			<div class="formCost">
				<label for="minCost">'.$nam[$i].' от &nbsp; </label><input type="text" id="minCost" value="0">
				<label for="maxCost"> &nbsp; до &nbsp; </label> <input type="text" id="maxCost" value="1000">
			</div><br>
			<div class="sliderCont">
					<div id="slider" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
						<a class="ui-slider-handle ui-state-default ui-corner-all" href="http://www.xiper.net/examples/js-plugins/ui/ui-slider/#" style="left: 0%;"></a>
						<a class="ui-slider-handle ui-state-default ui-corner-all" href="http://www.xiper.net/examples/js-plugins/ui/ui-slider/#" style="left: 100%;"></a>
					</div>
			</div><br>
	</div>';
?>
	
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script><script src="./polzunok_files/ga.js" type="text/javascript"></script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-5053168-4");
pageTracker._trackPageview();
} catch(err) {}</script>

<div></div>

<?php
print '<label><input type="checkbox" name="photo"><div>Только с фото</div></label><hr>В квартире есть:<br>';
$cat=array('bathroom','wifi','child','zoo','balcony','conditioner','fan','fireplace','parking','sauna','pool','washer','microwave','dishwasher','telephone','heating');
$nam=array('Раздельный санузел','Wi-Fi','Можно с детьми','Можно с животными','Балкон','Кондиционер','Вентилятор','Камин','Парковка','Сауна','Бассейн','Стиральная машина','Микроволновая печь','Посудомоечная машина','Телефон','Индивидуальное отопление');
for ($i=0; $i<=count($cat)-1; $i++)
	print '<label><input type="checkbox" name="'.$cat[$i].'"><div>'.$nam[$i].'</div></label> &nbsp; ';
print '
			<input type="submit" value="Поиск">
	</form></div>
</div>
</center></div></div>
<div class="c3">
	<a href="?reg=1"><div style="background-image: url(sys/bck/1.jpg);"><div>Москва</div>
	</div></a><a href="?reg=2"><div style="background-image: url(sys/bck/2.jpg);"><div>Санкт-Петербург</div>
	</div></a><a href="?reg=3"><div style="background-image: url(sys/bck/3.jpg);"><div>Московская область</div>
	</div></a><a href="?reg=4"><div style="background-image: url(sys/bck/4.jpg);"><div>Ленинградская область</div>
	</div></a>
</div>
<div class="c5">';
$c=mysqli_query($db,"SELECT * FROM `note` WHERE `vip`>='15' ORDER BY `id` DESC LIMIT 6");
while($d=mysqli_fetch_array($c))
	{
	print '<a href="?i='.$d['id'].'"><div style="background-image: url(sys/bck/'.$d['id'].'.jpg);"><div><table><tr><td>';
	if ($d['nam']) print $d['nam'];
	  else print $d['city'].', '.$d['street'].', '.$d['house'].', '.$d['apartment'];
	if ($d['metro']) print ' ('.$d['metro'].')';
	print '<br>'.$d['room'].'-комнатная, '.$d['metr'].' м<sup>2</sup></td><td class="c6">&nbsp;'.$d['price'].'₽</td></tr></table></div></div></a>';
	}
print'</div>';
	}
finish();
?>