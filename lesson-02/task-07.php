<!doctype html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Урок 2. Задача 7.</title>
</head>
<body>

<?php

//echo date('H:i');
function scloneniye($x,$a,$b,$c) {
	$y = $x % 10;

	if ($y == 1 && $x != 11) {
		return $a;
	}
	elseif (($y>1 && $y<5) && ($x<5 || $x>20)) {
		return $b;
	}
	else return $c;
}

$hour = scloneniye(date('H'),' час',' часа',' часов');
$min = scloneniye(date('i'),' минута',' минуты',' минут');

echo date('H').$hour." ".date('i').$min;

?>

</body>
</html>
<!--
1 час минута
2-4 часа минуты
5-20 часов минут
21 час
22-24 часа
25-30 часов
-->