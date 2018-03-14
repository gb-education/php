<? include "core/core.php"; ?>
<!doctype html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Урок 5. Задача 1.</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="gallery">
		<?php for ($i=0; $i+1 < count($data_img); $i++) : ?>
		  <a href="image.php?photo=<?=$data_img[$i]['url_img'] ?>">
			<img src="<?=$data_img[$i]['url_img_cropped'] ?>">
		  </a>
		<?php endfor; ?>
	</div>
	<div class="upload">
		<form action="index.php" method="POST" enctype="multipart/form-data">
			<input type="file" name="userfile[]" multiple><br><br>
			<input type="submit" name="upload" value="Загрузить">
		</form>
	</div>
</body>
</html>