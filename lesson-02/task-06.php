<!doctype html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Урок 2. Задача 6.</title>
</head>
<body>

<form action="task-06.php" method="GET">
	<input type="text" name="a" required><br>
	<input type="text" name="b" required><br>
	<input type="submit" value="Возвести в степень">
</form>
<br>

<?php

$a = $_GET[a];
$b = $_GET[b];

function power($val, $pow) {
	if($pow>1) {
		return $val * power($val, $pow-1);
	}
	else return $val;
}

echo "Результат вычисления: ".power($a,$b);

?>

</body>
</html>