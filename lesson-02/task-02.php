<!doctype html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Урок 2. Задача 2.</title>
</head>
<body>

<form action="task-02.php" method="GET">
	<input type="text" name="a" required>
	<input type="submit" value="Вывести">
</form>
<br>
Результат:

<?php

$a = $_GET[a];

if (!empty($a)) {
	switch ($a) {
		case 0: echo $a++." ";
		case 1: echo $a++." ";
		case 2: echo $a++." ";
		case 3: echo $a++." ";
		case 4: echo $a++." ";
		case 5: echo $a++." ";
		case 6: echo $a++." ";
		case 7: echo $a++." ";
		case 8: echo $a++." ";
		case 9: echo $a++." ";
		case 10: echo $a++." ";
		case 11: echo $a++." ";
		case 12: echo $a++." ";
		case 13: echo $a++." ";
		case 14: echo $a++." ";
		case 15: echo $a++." ";
		default: echo "Заданное число не попадает в промежуток от 0 до 15";
	}
}
/* Не очень понятная задача и суть упражнения, но цель достигнута. */

?>

</body>
</html>