<!doctype html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Урок 3. Задача 5.</title>
</head>
<body>

<h1>Урок 3. Задача 5.</h1>

<h2>Условие</h2>

<p>Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.</p>

<h2>Решение</h2>

<form action="#" method="get" style="displai: block; margin-bottom: 30px;">
	<textarea name="textme" placeholder="Введите текст" style="width:300px; height:100px;"></textarea><br>
	<input type="submit" value="Перевести">
</form>
<h3>Способ 1:</h3>

<?php

echo str_replace(" ", "_",$_GET[textme]);

?>

<h3>Способ 2:</h3>

<?php

function nospace ($text) {
	for ($i = 0; $i <= mb_strlen($text) - 1; $i++ ) {
		if (mb_substr($text,$i,1) == " ") {
			$newtext.= "_";
		}
		else {
			$newtext.= mb_substr($text,$i,1);
		}
	}
	return $newtext;
}

echo nospace ($_GET[textme]);

?>

</body>
</html>
