<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Admin Panel</title>
	<base url="<?=$site_root_url?>">
	<link rel="stylesheet" href="<?=$site_root_url?>template/packages/fontawesome/5.0.8/css/fontawesome-all.min.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="<?=$site_root_url?>template/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=$site_root_url?>template/css/style_admin.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="<?=$site_root_url?>template/css/bootstrap-theme.min.css">
	<!-- Latest compiled and minified JavaScript -->
	<script src="<?=$site_root_url?>template/js/bootstrap.min.js"></script>
</head>
<body>


<div class="container">
	<form class="form-signin" action="server.php" method="POST">
		<h2 class="form-signin-heading">Войти в панель управления</h2>
		<label for="inputLogin" class="sr-only">Email address</label>
		<input type="login" id="inputLogin" class="form-control" placeholder="Логин" required="" autofocus="" value="<?=$_SESSION['login']?>" name="login">
		<label for="inputPassword" class="sr-only">Password</label>
		<input type="password" id="inputPassword" class="form-control" placeholder="Пароль" required="" value="<?=$_SESSION['pass']?>" name="pass">
		<button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
	</form>
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?=$site_root_url?>template/js/bootstrap.min.js"></script>
</body>
</html>