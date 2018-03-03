<!doctype html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Урок 2. Задача 4.</title>
</head>
<body>

<form action="task-04.php" method="GET">
	<input type="text" name="a" required><br>
	<input type="text" name="b" required><br>
	<select name="operation">
		<option disabled selected>Выберите операцию</option>
		<option value="Сложение">Сложение</option>
		<option value="Вычетание">Вычетание</option>
		<option value="Умножение">Умножение</option>
		<option value="Деление">Деление</option>
	</select>
	<br>
	<input type="submit" value="Посчитать">
</form>
<br>

<?php

function add($x,$y) { // сложение
	return $x+$y;
}
function sub($x,$y) { // вычетание
	return $x-$y;
}
function mult($x,$y) { // умножение
	return $x*y;
}
function div($x,$y) { // деление
	return round($x/$y, 2);
}

function mathOperation($arg1, $arg2, $operation) {
	switch ($operation) {
		case 'Сложение':
			return add($arg1,$arg2);
			break;
		case 'Вычетание':
			return sub($arg1,$arg2);
			break;
		case 'Умножение':
			return mult($arg1,$arg2);
			break;
		case 'Деление':
			return div($arg1,$arg2);
	}
}

$a = $_GET[a];
$b = $_GET[b];
$op = $_GET[operation];

echo "Результат вычисления: ".mathOperation($a,$b,$op);

?>

</body>
</html>