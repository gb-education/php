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

function chkdir($folder) {
	if (!file_exists($folder)) {
		mkdir ($folder, 0755);
	}
}

$dir = "gallery/";
$dirtmp = "gallery_tmp/";

if (file_exists($dir)) {
	$files = scandir($dir);
	$filestmp = scandir($dirtmp);
	foreach ($files as $key => $img_fname) {
		if ($key >= 2) {
			echo "<a href='".$dir.$img_fname."' target='blank'><img src='".$dirtmp.$filestmp[$key]."' alt='".$img_fname."'></a>";
		}
	}
}

?>
</div>
<div class="upload">


<form action="index.php" method="POST" enctype="multipart/form-data">
	<input type="file" name="userfile[]" multiple><br><br>
	<input type="submit" name="upload" value="Загрузить">
</form>

<?php

if(isset($_POST['upload'])) {
	$dir = "gallery/";
	$dirtmp = "gallery_tmp/";
	chkdir ($dir);
	chkdir ($dirtmp);
	foreach ($_FILES[userfile][name] as $key => $fname) {
		$info = pathinfo($fname);
		if ((($info['extension'] == "jpg") || ($info['extension'] == "jpeg") || ($info['extension'] == "gif") || ($info['extension'] == "png")) && (filesize($_FILES[userfile][tmp_name][$key]) <= 2048000)) {
			if(copy($_FILES[userfile][tmp_name][$key],$dir.$_FILES[userfile][name][$key]))
			{
				exec("convert ".$dir.$_FILES[userfile][name][$key]." -resize x300 -resize \"300x<\" -resize 50% -gravity center -crop 150x150+0+0 +repage ".$dirtmp."resize_".$_FILES[userfile][name][$key]);
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