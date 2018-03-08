<!doctype html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Факультатив #2</title>
	
	<style rel="stylesheet">
		table td {
			text-align: center;
			width: 100px;
			font-weight: bold;
		}
	</style>

</head>
<body>
<h1>Условие</h1>
<p>Создать генератор случайных таблиц. Есть переменные: $row - кол-во строк в таблице, $cols - кол-во столбцов в таблице. Есть список цветов, в массиве: $colors = array('red','yellow','blue','gray','maroon','brown','green'). Необходимо создать скрипт, который по заданным условиям выведет таблицу размера $rows на $cols, в которой все ячейки будут иметь цвета, выбранные случайным образом из массива $colors. В каждой ячейке должно находиться случайное число.</p>

<h2>Решение</h2>

<form action="#" method="GET">
	<input type="text" name="col_count" placeholder="Столбцов" required><br>
	<input type="text" name="row_count" placeholder="Строк" required><br>
	<input type="submit" value="Создать таблицу">
</form>
<br>

<?php

$colors = array('red','yellow','blue','gray','maroon','brown','green');

$col_count = $_GET[col_count];
$row_count = $_GET[row_count];

echo "<table>";

for ($i = 1; $i <= $row_count; $i++) {
	echo "<tr>";
	for ($k = 1; $k <= $col_count; $k++) {
		echo "<td style='background-color:".$colors[rand(0,6)]."'>".rand(0,1000)."</td>";
	}
	echo "</tr>";
}
echo "</table>";

?>

</body>
</html>