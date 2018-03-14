<?
include "core/core.php";
include "core/config.php";
?>
<!doctype html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Урок 5. Задача 1.</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<? echo $_GET['photo']; ?>
  <a href="index.php"> Вернуться в галерею </a>
  <div>
    <img src="<?=$_GET['photo'] ?>">
  </div>

	<? view_count($_GET['photo'],$connect_db); ?>
</body>
</html>
