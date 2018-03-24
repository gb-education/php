<?
require_once ('config.php');

function getAssocResult($sql) {

	$db = mysqli_connect(HOST, USER, PASS, DB);

	$result = mysqli_query($db, $sql);
	$array_result = array();
	while($row = mysqli_fetch_assoc($result))
		$array_result[] = $row;

    mysqli_close($db);
	return $array_result;

}

//Генерация списка товаров


function cat_generate($field,$limit,$block_name, $cat_sql = null) {

	$prod_list = "";
	if ($limit == 0) {
		$sql = "SELECT * FROM `goods` ORDER BY `".$field."`";
	}
	else {
		$sql = "SELECT * FROM `goods` ORDER BY `".$field."` DESC LIMIT ".$limit;
	}
	if (!empty($cat_sql)) {
		$sql = $cat_sql;
	}
	//print_r(getAssocResult($sql));
	foreach (getAssocResult($sql) as $prod_once_info) {
		//echo $key;
		//echo $value;
		//print_r($prod_once_info);
		$prod_once = file_get_contents('template/00_product_once.tpl');

		foreach ($prod_once_info as $key => $value) {
			//echo $key."<br>";
			//echo $value."<br>";
			$prod_once = str_replace("{{".$key."}}",$value,$prod_once);
		}
		$prod_list .= $prod_once;
	}
	$index_content = str_replace("{{prod_list}}",$prod_list,file_get_contents('template/00_product_list.tpl'));
	$index_content = str_replace("{{block_header}}",$block_name,$index_content);
	return $index_content;

}

//Группируем шаблоны
function templates_amount($content,$page_title,$index = null) {
	$page = file_get_contents('template/01_meta.tpl');
	if ($index == 1) {
		$page .= file_get_contents('template/02_header_index.tpl');
	}
	else {
		$page .= file_get_contents('template/02_header.tpl');
	}
	$page .= side_menu();
	//$page .= file_get_contents('template/03_sidebar.tpl');
	$page .= $content;
	$page .= file_get_contents('template/05_prefooter.tpl');
	$page .= file_get_contents('template/06_footer.tpl');
	$page .= file_get_contents('template/07_scripts.tpl');
	echo $page = str_replace("{{name}}",$page_title,$page);
}

//$value['id']

function side_menu() {
	$sql = "SELECT * FROM `categories`";
	$side_menu = "";
	$cat_menu = "";
	foreach (getAssocResult($sql) as $value) {
		$side_menu_li = file_get_contents('template/00_sidebar_menu_li.tpl');
		$side_menu_li = str_replace("{{name}}",$value['cat_name'],$side_menu_li);
		$side_menu_li = str_replace("{{alias}}",$value['alias'],$side_menu_li);
		$side_menu .= $side_menu_li;
		
	}
	$cat_menu = str_replace("{{cat_menu}}",$side_menu,file_get_contents('template/03_sidebar.tpl'));
	return $cat_menu;
}

function pageBuilder($url) {

	if (count($url) > 3) {
		echo file_get_contents('template/00_404.tpl');;
		exit;
	}

	//$page = file_get_contents('template/01_meta.tpl');
	
	$db = mysqli_connect(HOST, USER, PASS, DB);

	$parent = $url[0];
	$page_name = $url[1];

	//Собираем страница товара
	if (!empty($parent) && !empty($page_name)) {

		switch ($parent) {
			case "goods":
				//Собираем страница товара
				$sql = "SELECT * FROM `".$parent."` WHERE `alias` = '".$page_name."';";
				//echo (mysqli_query($db, $sql)['current_field']);
				
				mysqli_query($db, $sql);
				if (mysqli_affected_rows($db) > 0) {
					$result = mysqli_query($db, $sql);
					$array_result = array();
					while ($row = mysqli_fetch_assoc($result)) {
						$array_result[] = $row;
					}
					//return $array_result;
					//echo $array_result[0]['name'];
					//print_r($array_result);


					$page = file_get_contents('template/04_product.tpl');
					$page = str_replace("{{name}}",$array_result[0]['name'],$page);
					$page = str_replace("{{img}}",$array_result[0]['img'],$page);
					$page = str_replace("{{description}}",$array_result[0]['description'],$page);
					$page = str_replace("{{price}}",$array_result[0]['price'],$page);
					$page = str_replace("{{text}}",$array_result[0]['text'],$page);

					templates_amount($page,$array_result[0]['name']);

				}
				//Закончили сборку товара

				break;
			case "category":
				//Сборка страницы каталога-категории 
				$sql_cat = "SELECT * FROM `categories` WHERE `alias` = '".$page_name."';";
				//echo "$sql_cat";
				mysqli_query($db, $sql_cat);
				if (mysqli_affected_rows($db) > 0) {
					$result = mysqli_query($db, $sql_cat);
				}
				else {
					echo "В базе ничего не найдено. Ошибка 404.";
					break;
				}
				//print_r($result);
				$array_result = array();
				while ($row = mysqli_fetch_assoc($result)) {
						$array_result[] = $row;
					}
				//echo "<br>категория - ";
				//echo $array_result[0]['id'];
				$sql_goods = "SELECT * FROM `goods` WHERE `cat_id` = ".$array_result[0]['id'].";";

				//собираем страницу категории
				
				$content = cat_generate("id",0,$array_result[0]['cat_name'],$sql_goods);
				templates_amount($content,"Каталог - ".$array_result[0]['cat_name']);
				break;
				//закаончили собирать категорию
			case "admin":
				echo "Привет!";
				break;
			default:
				echo "В базе ничего не найдено. Ошибка 404.";
				break;
		}

		
	}
	elseif (!empty($parent)) {

		switch ($parent) {
			case "goods":

				$content = cat_generate("id",0,"Все товары");
				//echo $page = str_replace("{{name}}","",$page);
				templates_amount($content,"Каталог");
				break;

			case "contacts":
				$content = file_get_contents('template/04_contacts.tpl');
				templates_amount($content,"Контакты");
				break;
			case "cart":
				echo "cart";
				break;
			default:
				echo "Найден 1 параметр - который нам пока неизвестен";
		}
	}
	else {

		$content = cat_generate("pubdate",3,"Новые").cat_generate("view_count",3,"Популярные");
		//echo "Нихрена не найдено - видимо это главная страница :)";
		templates_amount($content,"Главная страница",1);

	}

	mysqli_close($db);
}




?>