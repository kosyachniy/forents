<?php
include('../sys/func.php');
start('Наши услуги','about','наши услуги');
print '<form class="b1">Название<input name="nam"><br>
	г. <input name="city" style="width: 200px;">, ул. <input name="" style="width: 200px;">, дом <input name="" style="width: 20px;">, кв. <input name="" style="width: 10px;"> (этаж <input name="" style="width: 10px;">)<br>
	Ближайшее метро<input name=""><br>

	Тип <квартира / дом / хостел / отель>

	<Загрузка фото><br>

	Количество мест<input name=""><br>
	Количество комнат<input name=""><br>
	Метраж<input name=""><br>
	<label><input type="checkbox" name="fireplace"><div>Раздельный санузел</div></label>
			<label><input type="checkbox" name="fireplace"><div>Wi-Fi</div></label>
			<label><input type="checkbox" name="fireplace"><div>Можно с детьми</div></label>
			<label><input type="checkbox" name="fireplace"><div>Можно с животными</div></label>
			<label><input type="checkbox" name="fireplace"><div>Балкон</div></label><br>
			<label><input type="checkbox" name="fireplace"><div>Кондиционер</div></label>
			<label><input type="checkbox" name="fireplace"><div>Вентилятор</div></label>
			<label><input type="checkbox" name="fireplace"><div>Камин</div></label><br>
			<label><input type="checkbox" name="fireplace"><div>Парковка</div></label><br>
			<label><input type="checkbox" name="fireplace"><div>Сауна</div></label>
			<label><input type="checkbox" name="fireplace"><div>Бассейн</div></label><br>
			<label><input type="checkbox" name="fireplace"><div>Стиральная машина</div></label>
			<label><input type="checkbox" name="fireplace"><div>Микроволновая печь</div></label>
			<label><input type="checkbox" name="fireplace"><div>Посудомойная машина</div></label><br>
			<label><input type="checkbox" name="fireplace"><div>Телефон</div></label><br>

	Цена<input name=""><br>

	<input type="submit" value="Поиск"></form>';
finish();
?>