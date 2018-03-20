<?

$get_data = $_GET;

//print_r ($get_data);

if (($get_data['val01']) && ($get_data['val01']) && ($get_data['calulate'])) {
	switch ($get_data['calulate']) {
		case '+':
			$res = $get_data['val01'] + $get_data['val02'];
			break;
		case '-':
			$res = $get_data['val01'] - $get_data['val02'];
			break;
		case '*':
			$res = $get_data['val01'] * $get_data['val02'];
			break;
		case '/':
			if ($get_data['val02'] == 0) {
				$res = "На ноль делить нельзя";
			}
			else {
				$res = $get_data['val01'] / $get_data['val02'];
			}
			break;
	}
}
else {
	if ($get_data['calulate']) {
		$res = "Заполните все поля";
	}
}

//$res = $get_data['val01'].$get_data['operation'].$get_data['val02'];

?>

<!doctype html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Калькулятор</title>
</head>
<body>
	<form action="" method="get">
		<input type="number" name="val01" step="0.01"><br>
		<input type="number" name="val02" step="0.01"><br>
		<input type="submit" name="calulate" value="+">
		<input type="submit" name="calulate" value="-">
		<input type="submit" name="calulate" value="*">
		<input type="submit" name="calulate" value="/">
	</form>

	<p>Результат: <? echo $res; ?></p>
</body>
</html>