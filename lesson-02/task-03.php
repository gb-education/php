<!doctype html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Урок 2. Задача 3.</title>
</head>
<body>

<form action="task-03.php" method="GET">
	<input type="text" name="a" required><br>
	<input type="text" name="b" required><br>
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

$a = $_GET[a];
$b = $_GET[b];

echo "Результат сложения: ".add($a,$b)."<br>";
echo "Результат вычетания: ".sub($a,$b)."<br>";
echo "Результат умножения: ".mult($a,$b)."<br>";
echo "Результат деления: ".div($a,$b);
?>

</body>
</html>