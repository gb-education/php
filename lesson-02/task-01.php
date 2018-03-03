<!doctype html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Урок 2. Задача 1.</title>
</head>
<body>

<form action="task-01.php" method="GET">
	<input type="text" name="a" required><br>
	<input type="text" name="b" required><br>
	<input type="submit" value="Посчитать">
</form>
<br>
Результат:

<?php
/*
$a = -1;
$b = 20;
*/
$a = $_GET[a];
$b = $_GET[b];

if (!empty($a) || !empty($b)) {
	if ($a>=0 && $b>=0) {
		echo $a-$b;
	}
	elseif ($a<0 && $b<0) {
		echo $a*$b;
	}
	elseif (($a<0 && $b>=0) || ($a>=0 && $b<0)) {
		echo $a+$b;
	}
}
?>

</body>
</html>