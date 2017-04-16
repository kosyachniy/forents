<?php
include('../sys/func.php');
start('Наши услуги','about','наши услуги');
$db=db('');
$name=$_GET['i'];
$f=False;
if ($name)
	{
	$c=mysqli_query($db,"SELECT * FROM `note` WHERE `id`='$name'");
	if ($c)
		$f=True;
	}
  else
  	$f=True;
if ($f)
	$c=mysqli_query($db,"SELECT * FROM `note` ORDER BY `id` DESC LIMIT 1");
	while($d=mysqli_fetch_array($c))
		$name=$d['id']+1;
print '<center><h1>Разместить объявление</h1></center>
<form action="dow.php?i='.$name.'" method="post" enctype="multipart/form-data">
    	<input type="file" name="fnam">
    	<!<input type="submit" value="Загрузить фотографию">
    </form><br><br>
<form class="b1"><input name="nam" placeholder="Название"><br>
	г. <input name="city" style="width: 200px;">, ул. <input name="" style="width: 200px;">, дом <input name="" style="width: 50px;">, кв. <input name="" style="width: 60px;"> (этаж <input name="" style="width: 20px;">)<br>
	Ближайшее метро <input name="subway" style="width: 300px;"><br>

	Тип <квартира / дом / хостел / отель><br>

	Количество комнат<input name="" style="width: 30px;">, мест<input name="" style="width: 30px;">, <input name="" style="width: 50px;">м<sup>2</sup><br>';
$cat=array('bathroom','wifi','child','zoo','balcony','conditioner','fan','fireplace','parking','sauna','pool','washer','microwave','dishwasher','telephone','heating','photo');
$nam=array('Раздельный санузел','Wi-Fi','Можно с детьми','Можно с животными','Балкон','Кондиционер','Вентилятор','Камин','Парковка','Сауна','Бассейн','Стиральная машина','Микроволновая печь','Посудомоечная машина','Телефон','Индивидуальное отопление','Только с фото');
for ($i=0; $i<=count($cat)-1; $i++)
	print '<label><input type="checkbox" name="'.$cat[$i].'"><div>'.$nam[$i].'</div></label> &nbsp; ';
print '<br>Цена <input name="price" style="width: 70px;">₽/день<br>

	<input type="submit" value="Поиск"></form>';
finish();
?>