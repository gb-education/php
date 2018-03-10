<!doctype html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Урок 4. Задача 1.</title>
	<style rel="stylesheet">
		html, body {
			width:100%;
			height: 100%;
			margin: 0;
			padding: 0;;
		}
		.gallery {
			margin: 0 auto;
			max-width: 800px;
			line-height: 0;
			text-align: center;
		}
		.gallery a{
			display: inline-block;
			margin: 0;
			padding: 2px;;
		}
		.upload {
			padding: 30px 0;
			text-align: center;
		}
	</style>
</head>
<body>

<h1>Урок 4. Задача 1.</h1>

<h2>Условие</h2>

<p>Создать галерею фотографий. Она должна состоять всего из одной странички, на которой пользователь видит все картинки в уменьшенном виде и форму для загрузки нового изображения. При клике на фотографию она должна открыться в браузере в новой вкладке. Размер картинок можно ограничивать с помощью свойства width. При загрузке изображения необходимо делать проверку на тип и размер файла.</p>

<h2>Галерея</h2>

<div class="gallery">

<?php

$dir = "gallery/";
$files = scandir($dir);

foreach ($files as $key => $img_fname) {
	if (($key >= 2) && (stripos($img_fname,"resize_") === 0)) {
		echo "<a href='".$dir.str_replace("resize_","",$img_fname)."' target='blank'><img src='".$dir.$img_fname."' alt='".$img_fname."'></a>";
	}
}



/*
//echo file_get_contents ( "file.txt" );

$filename = "file.txt";
if (file_exists($filename)) {
	echo "File exists.";
	$file = fopen($filename, "r");
	
	$buffer = "";
	// если файл не может быть прочтен или не существует, fopen вернет FALSE
	//$filename = fopen("no_such_file", "r");

	// FALSE от fopen вызовет предупреждение и следующий цикл станет бесконечным
	while (!feof($file)) {
		$buffer .= fgets($file)."<br>\n";
	}
	echo $buffer;
	fclose($file);
}
else{
	echo "Файла не существует.";
}*/

?>
</div>
<div class="upload">


<form action="index.php" method="POST" enctype="multipart/form-data">
	<input type="file" name="userfile[]" multiple><br><br>
	<input type="submit" name="upload" value="Загрузить">
</form>

<?php

if(isset($_POST['upload'])) {
	$dir = "gallery/";// echo $dir."<br>\n";
	if (!file_exists($dir)) {
		mkdir ($dir, 0755);
		echo "Директория создана";
	}
/*&& (filesize($dir.$_FILES[userfile][tmp_name][$key]) <= 2048000)*/
	foreach ($_FILES[userfile][name] as $key => $fname) {
		$info = pathinfo($fname);
		if ((($info['extension'] == "jpg") || ($info['extension'] == "jpeg") || ($info['extension'] == "gif") || ($info['extension'] == "png")) && (filesize($_FILES[userfile][tmp_name][$key]) <= 2048000)) {
			if(copy($_FILES[userfile][tmp_name][$key],$dir.$_FILES[userfile][name][$key]))
			{
				exec("convert ".$dir.$_FILES[userfile][name][$key]." -resize x300 -resize \"300x<\" -resize 50% -gravity center -crop 150x150+0+0 +repage ".$dir."resize_".$_FILES[userfile][name][$key]);
				//ImageMagick
			}
		}
	}
echo "Готово!";
}

?>


</div>

</body>
</html>