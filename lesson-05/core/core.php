<?
include "core/config.php";

/* проверка соединения */
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}

function view_count ($fname,$connect_db) {
	//echo $fname;
	mysqli_query($connect_db,"UPDATE images SET view_count = view_count + 1  WHERE url_img = '".$fname."';");

	//$sql = "SELECT view_count FROM images WHERE name IN ('".$fname."')"; //SELECT нужное поле FROM table WHERE field2=...
	$sql = "SELECT * FROM `images` WHERE `url_img` = '".$fname."';";
	$res = mysqli_query($connect_db,$sql);
	while($data_img = mysqli_fetch_assoc($res)) {
		echo "Просмотров: ".$data_img['view_count'];
	}
}

/*
// функция обрезки изображения
function crop_img ($source_img,$dirtmp,$croped_img,$crop_img_width,$crop_img_height) {
	exec("convert ".$source_img." -resize x". $crop_img_width * 2 ." -resize \"". $crop_img_height * 2 . "x<\" -resize 50% -gravity center -crop ".$crop_img_width."x".$crop_img_height."+0+0 +repage ".$dirtmp.$croped_img);
	echo "Исходное изображение: ".$source_img."<br>";
	return $croped_img;
}*/

// функция проверки существования папки и ее создания
function chkdir($folder) {
	if (!file_exists($folder)) {
		mkdir ($folder, 0755);
	}
}

//функция проверки записи в БД о новом загружаемом файле
function check_file_in_db ($file_name,$db_connect) {
	$sql = "SELECT * FROM images WHERE name IN ('".$file_name."')";
	$res = mysqli_query($db_connect,$sql);
	$data = mysqli_fetch_assoc($res);
	if (($data[name]) != $file_name) {
		return true;
	}
}

//echo check_file_in_db ("1gallery_img_04.jpg",$connect_db);
//print_r (mysqli_fetch_assoc(mysqli_query($connect_db,"SELECT * FROM images WHERE name IN ('".$_FILES[userfile][name][$key]."');")));

// загрузка изображений с занесением записей в БД
if((isset($_POST['upload'])) && ($_FILES[userfile][name][0]) != "") {
	$dir = galley_dir;
	$dir_tmp = galley_tmp;
	chkdir ($dir);
	chkdir($dir_tmp);
	/*$sql = "SELECT * FROM images WHERE name IN ('".$_FILES[userfile][name][$key]."')";
	$res = mysqli_query($connect_db,$sql);
	print_r ($data = mysqli_fetch_assoc($res));*/

	foreach ($_FILES[userfile][name] as $key => $fname) {
		$info = pathinfo($fname)['extension'];

		$tmp_file_name = $_FILES[userfile][tmp_name][$key];
		$file_name = $_FILES[userfile][name][$key];
		$cropped_file_url = $dir_tmp."resize_".$file_name;

		if ((mb_strpos($upload_file_type,$info) > -1) && (filesize($tmp_file_name) <= $max_file_upload)) {
			if (check_file_in_db ($file_name,$connect_db) === true)
			{
				//"."asd".$_FILES[userfile][name][$key]."
				//SELECT SupplierName FROM Suppliers WHERE EXISTS (SELECT ProductName FROM Products WHERE SupplierId = Suppliers.supplierId AND Price < 20);
				//echo $file_name;
				//echo check_file_in_db ($file_name,$connect_db);
				//SELECT cnum, cname, city FROM Customers WHERE EXISTS ( SELECT * FROM Customers WHERE city = 'Москва');
				//"INSERT INTO `images` (`name`,`url_img`,`url_img_cropped`) VALUES ('".$file_name."','".$dir.$file_name."','".$cropped_file_url.");");

				if (copy($tmp_file_name,$dir.$file_name)) {
					exec("convert ".$dir.$file_name." -resize x". $crop_img_width * 2 ." -resize \"". $crop_img_height * 2 . "x<\" -resize 50% -gravity center -crop ".$crop_img_height. "x".$crop_img_height."+0+0 +repage ".$cropped_file_url);
					
					mysqli_query($connect_db,"INSERT INTO `images`(`name`, `url_img`, `url_img_cropped`) VALUES ('".$file_name."','".$dir.$file_name."','".$cropped_file_url."');");
					//mysqli_query($connect_db,"UPDATE `images` SET `url_img_cropped`='".$dir_tmp.$croped_img."' WHERE `id`='".$data['id']."';");
				}

 			}
			else
			{
				echo "Файл уже существует";
			}
		}
	}
}

//$sql = "select * from images";
$sql = "SELECT * FROM images ORDER BY view_count DESC";
$res = mysqli_query($connect_db,$sql);
while($data_img[] = mysqli_fetch_assoc($res)){}

/*
//проверка записей в БД, проверка записей уменьшенных изображений и их создание
$sql = "SELECT * FROM images WHERE url_img_cropped IS NULL";
$res = mysqli_query($connect_db,$sql);
$dir_tmp = galley_tmp;
chkdir($dir_tmp);
while($data = mysqli_fetch_assoc($res)){
	echo $source_img = $data['url_img']."<BR>";
	$croped_img = "resize_".$data['name'];
echo "Имя ".$data['id']." ".$data['name']."<br>";

exec("convert ".$source_img." -resize x"."300"." -resize \""."300"."x<\" -resize 50% -gravity center -crop 150x150+0+0 +repage ".$dir_tmp."resize_".$croped_img);	

//exec("convert ".$source_img." -resize x". $crop_img_width * 2 ." -resize \"". $crop_img_height * 2 . "x<\" -resize 50% -gravity center -crop ".$crop_img_width."x".$crop_img_height."+0+0 +repage ".$dir_tmp.$croped_img);

	echo "Исходное изображение: ".$source_img."<br>";
echo "Обрезанное изображение: ".$dir_tmp.$croped_img."<br><br>";

	//crop_img ($source_img,$dir_tmp,$croped_img,$crop_img_width,$crop_img_height);
	//mysqli_query($connect_db,"INSERT INTO `images` (`name`,`url_img`) VALUES ('".$_FILES[userfile][name][$key]."','".$dir.$_FILES[userfile][name][$key]."');");
	mysqli_query($connect_db,"UPDATE `images` SET `url_img_cropped`='".$dir_tmp.$croped_img."' WHERE `id`='".$data['id']."';");
}*/
mysqli_close($connect_db);

?>