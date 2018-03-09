<!doctype html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Урок 3. Задача 6.</title>
</head>
<body>

<h1>Урок 3. Задача 6.</h1>

<h2>Условие</h2>

<p>В имеющемся шаблоне сайта заменить статичное меню (ul - li) на генерируемое через PHP. Необходимо представить пункты меню как элементы массива и вывести их циклом. Подумать, как можно реализовать меню с вложенными подменю? Попробовать его реализовать.</p>

<h2>Решение</h2>

<?php

$menu = array ("Главная", "Услуги" => array ("Разработка веб-сайтов", "СЕО-оптимизация", "Контекстная реклама"), "О компании" => array ("Наша миссия", "История", "Портфолио"), "Контакты");

echo "<ul>";
foreach ($menu as $count => $itemname) {
	// is_array
	if (gettype($itemname) == "array" ) {
		echo "<li>".$count."<ul>";
		foreach ($itemname as $itemname2) {
			echo "<li>".$itemname2."</li>";
		}
		echo "</ul>";
	}
	else echo "<li>".$itemname."</li>";
}

?>

</body>
</html>