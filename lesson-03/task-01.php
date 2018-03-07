<!doctype html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Урок 3. Задача 1.</title>
</head>
<body>

<h1>Урок 3. Задача 1.</h1>

<h2>Условие</h2>

<p>С помощью цикла while вывести все числа в промежутке от 0 до 100, которые делятся на 3 без остатка.</p>

<h2>Решение</h2>

<?php
$i = 0;
while ($i<=100) {
	if ($i % 3 == 0) {
		echo $i."<br>";
	}
	$i++;
}

?>

</body>
</html>