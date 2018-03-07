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
	if ($tranfer_array[$k] == "") {
		$tranfer_array[$k] = $my_array[$i];
		echo $i++." ";
		echo $k."<br>";
	}
	
}

echo "<br><br>";

for ($i = 0; $i < count ($tranfer_array); $i++) {
	echo $tranfer_array[$i];
}

?>

</body>
</html>