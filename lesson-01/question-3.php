<?php
    $a = 5;
    $b = '05';
    var_dump($a == $b);         // Почему true?
    var_dump((int)'012345');     // Почему 12345?
    var_dump((float)123.0 === (int)123.0); // Почему false?
    var_dump((int)0 === (int)'hello, world'); // Почему true?

?>

<!doctype html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Домашнее задание - вопрос № 3</title>
<head>
<body>
	<p><a href="http://php.net/manual/ru/language.operators.comparison.php" target="_blank">Операторы сравнения в PHP</a></p>
	<ul>
		<li>var_dump($a == $b); - оператор "==" - TRUE если $a равно $b после преобразования типов.</p>
		<li>(int)'012345' - операция преобразования в число, т.к. число с цифры 0 начинаться не может (не считая десятичных), то получилось 12345. :)</p>
		<li>var_dump((float)123.0 === (int)123.0); - оператор "===" - TRUE если $a равно $b и имеет тот же тип. В нашем же случае тип данных разный поэтому - false.</p>
		<li>
			<p>var_dump((int)0 === (int)'hello, world'); - true потому что один и тот же тип данных и значение, т.к. после преобразования строки "hellow world" значение числа становится 0.<br>
			<?php echo '<br>Проверка преобразования: (int)/"hello, world/" = '.(int)'hello, world'; ?></p>	
		</li>
	</ul>
</body>
</html>