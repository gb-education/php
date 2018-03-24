<hr>
<p>id: {{id}}</p>
<form action="" method="POST">
	<input type="text" name="name" value="{{name}}">
	<input type="text" name="title" value="{{title}}">
	<input type="text" name="description" value="{{description}}">
	<input type="text" name="pubdate" value="{{pubdate}}">
	<input type="text" name="price" value="{{price}}"><br>
	<input type="text" name="price_sale" value="{{price_sale}}">
	<input type="text" name="alias" value="{{alias}}">
	<input type="text" name="img" value="{{img}}"><br>
	<select name="cat_id">{{cat_list}}</select>
	<textarea name="text" value="{{text}}">{{text}}</textarea> <br>
	<input type="submit" name="change" value="Изменить">
</form>