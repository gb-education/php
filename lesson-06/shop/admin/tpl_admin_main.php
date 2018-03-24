<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Admin Panel</title>
	<base url="<?=$site_root_url?>">
	<link rel="stylesheet" href="<?=$site_root_url?>template/packages/fontawesome/5.0.8/css/fontawesome-all.min.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="<?=$site_root_url?>admin/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=$site_root_url?>admin/css/style_admin.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="<?=$site_root_url?>admin/css/bootstrap-theme.min.css">
	<!-- Latest compiled and minified JavaScript -->
	<script src="<?=$site_root_url?>admin/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<div class="row">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Меню</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Админи-панель</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li<? active_link ($url,"goods"); ?>><a href="/admin/goods/">Товары <span class="sr-only">(current)</span></a></li>
						<li<? active_link ($url,"cat"); ?>><a href="/admin/categories/">Категории</a></li>
						<li<? active_link ($url,"gal"); ?>><a href="/admin/galleries/">Галереи</a></li>
						<li<? active_link ($url,"users"); ?>><a href="/admin/users/">Пользователи</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="index.php?logout">Выход</a></li>
					</ul>
					<p class="navbar-text navbar-right"><?=$_SESSION['login'];?> </p>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="panel panel-default">
			<table class="table small">
				<?=$content;?>
			</table>
			<?=$update;?>
			<a class="btn btn-default" href="/admin/<?=$url[0];?>/add/">Добавить</a>
			<?=$add;?>
		</div>
	</div>
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?=$site_root_url?>admin/js/bootstrap.min.js"></script>
</body>
</html>