<!doctype html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Факультатив</title>

</head>
<body>
<h1>Условие</h1>
<p>Дан массив из n элементов. Переставьте его элементы случайным образом так, чтобы каждый элемент оказался на новом месте.</p>

<h2>Решение</h2>

<?php

$my_array = array ("Один","Два","Три","Четыре","Пять","Шесть");

for ($i = 0; $i < count ($my_array); $i++) {
	echo $my_array[$i];
}

echo "<br><br>";

for ($i = 0; $i < count ($my_array); ) {
	$k = rand (0,count ($my_array)-1);
	if (($transfer_array[$k] == "") && ($k != $i)) {
		$transfer_array[$k] = $my_array[$i];
		echo $i++." ";
		echo $k."<br>";
	}
	
}

echo "<br><br>";

for ($i = 0; $i < count ($transfer_array); $i++) {
	echo $transfer_array[$i];
}

?>
<p>Задача выполнена. Немного смущает несовпадение значений в соответствии со счетчиками, по которым была расстановка.</p>

</body>
</html>