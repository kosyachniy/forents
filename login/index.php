<?php
include('../sys/func.php');
$ser=$_SERVER['HTTP_REFERER'];
if (!stripos($ser, 'login'))
	{
	if (stripos($ser, 'zodzu'))
		$_SESSION['inp']=$ser;
	  else
		$_SESSION['inp']='/';
	}
  else
	  	$_SESSION['inp']='/';
start('Аккаунт','login','Логин, авторизация, пароль, аккаунт');
print '<div class="b1"><div>
	<div>Зарегистрироваться</div>
    <form action="form.php" method="post">
    	<input type="text" name="nam" placeholder="Имя" required>
    	<input type="text" name="fam" placeholder="Фамилия" required>
		<input type="email" name="mail" placeholder="Почта" readonly onfocus="this.removeAttribute(\'readonly\')" required>
		<input type="password" name="pas" placeholder="Пароль" readonly onfocus="this.removeAttribute(\'readonly\')" required>
		<input name="sub_com" type="submit" value="Зарегистрироваться">
      </form><br><br>
    Нажимая кнопку "Зарегистрироваться", вы автоматически соглашаетесь с <a href="privacy.php">условиями сайта</a>.
</div><div>
	<div>Войти</div>
    <form action="login.php" method="post">
		<input placeholder="Почта" name="user" required>
		<input type="password" placeholder="Пароль" name="pas" required>
		<input name="sub_com" type="submit" value="Войти">
    </form><br><br>
	Регистр учитывается<br><br>';
include ('error.php');
print '</div></div>';
finish();
?>                                                                                