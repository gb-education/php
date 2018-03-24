<hr>
<p>Добавить новый товар</p>
<form action="" method="POST">
	<input type="text" name="name">
	<input type="text" name="title">
	<input type="text" name="description">
	<input type="text" name="pubdate">
	<input type="text" name="price"><br>
	<input type="text" name="price_sale">
	<input type="text" name="alias">
	<input type="text" name="img"><br>
	<select name="cat_id">{{cat_list}}</select>
	<textarea name="text"></textarea> <br>
	<input type="submit" name="add" value="Добавить">
</form>