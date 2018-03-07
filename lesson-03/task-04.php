<!doctype html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Урок 3. Задача 3.</title>
</head>
<body>

<h1>Урок 3. Задача 3.</h1>

<h2>Условие</h2>

<p>Объявить массив, индексами которого являются буквы русского языка, а значениями – соответствующие латинские буквосочетания (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’).</p>
<p>Написать функцию транслитерации строк.</p>

<h2>Решение</h2>

<form action="#" method="get" style="displai: block; margin-bottom: 30px;">
	<textarea name="textme" placeholder="Введите текст (только в нижнем регистре)" style="width:300px; height:100px;"></textarea><br>
	<input type="submit" value="Перевести">
</form>
<h3>Текст</h3>

<?php

function trlt($txt) {
	

	$translit = array ('а' => "a", "б" => "b", "в" => "v", "г" => "g", "д" => "d", "е" => "e", "ё" => "yo", "ж" => "zh", "з" => "z", "и" => "i", "й" => "i", "к" => "k", "л" => "l", "м" => "m", "н" => "n", "о" => "o", "п" => "p", "р" => "r", "с" => "s", "т" => "t", "у" => "u", "ф" => "f", "х" => "h", "ц" => "ts", "ч" => "ch", "ш" => "sh", "щ" => "sh", "ь" => "", "ы" => "y", "ъ" => "", "э" => "e", "ю" => "yu", "я" => "ya", " " => " "	);
	
	for ($i = 0; $i <= mb_strlen($txt) - 1; $i++) {
		$text.= $translit[mb_substr($txt,$i,1)];
	}
	
	return $text;
}

echo trlt($_GET[textme]);
// Можно было бы добавить в массив в верхнем регистре символов, но принцип понятен и так.
?>

</body>
</html>
<!-- mb_substr($mytext, $i, 1, "utf-8")." "
mb_convert_encoding($_GET[textme], "UTF-8", "auto")
 -->
