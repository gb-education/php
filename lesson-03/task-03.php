<!doctype html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Урок 3. Задача 3.</title>
</head>
<body>

<h1>Урок 3. Задача 3.</h1>

<h2>Условие</h2>

<p>Объявить массив, в котором в качестве ключей будут использоваться названия областей,<br>а в качестве значений – массивы с названиями городов из соответствующей области.<br>Вывести в цикле значения массива, чтобы результат был таким:</p>
<ul>
	<li>Московская область:</li>
	<li>Москва, Зеленоград, Клин</li>
	<li>Ленинградская область:</li>
	<li>Санкт-Петербург, Всеволожск, Павловск, Кронштадт</li>
	<li>Рязанская область … (названия городов можно найти на maps.yandex.ru)</li>
</ul>

<h2>Решение</h2>

<?php

$russia = array (
	"Московская область:" => array ("Москва", "Зеленоград", "Клин"),
	"Ленинградская область:" => array ("Санкт-Петербург", "Всеволожск", "Павловск", "Кронштадт"),
	"Рязанская область:" => array ("Рязань", "Касимов", "Скопин", "Рыбное")
	);
/*	
foreach ($russia as $region => $cities) {
	echo $region."<br>";
	foreach ($cities as $city) {
		if ($city == end($cities)) {
			echo $city."<br>";
		}
		else {
			echo $city.", ";
		}
	}
}
*/

foreach ($russia as $region => $cities) {
	echo $region."<br>".implode(', ',$cities)."<br>";

}

?>

</body>
</html>

