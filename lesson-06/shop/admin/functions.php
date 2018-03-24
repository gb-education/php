<?
//require_once ('../core/core.php');
require_once ('../core/config.php');

$db = mysqli_connect(HOST, USER, PASS, DB);

function active_link ($explode_url,$condition) {
	if ($explode_url[0] == $condition) {
		echo " class=\"active\"";
	}
}

function getAssocResult($sql) {

	$db = mysqli_connect(HOST, USER, PASS, DB);

	$result = mysqli_query($db, $sql);
	$array_result = array();
	while($row = mysqli_fetch_assoc($result))
		$array_result[] = $row;

    mysqli_close($db);
	return $array_result;

}

function list_table($table,$tpl) {
	$sql = "SELECT * FROM `".$table."`";
	//echo $tpl;
	$goods_table = "";
	foreach (getAssocResult($sql) as $value) {
		$goods_line = file_get_contents($tpl);

		foreach ($value as $key => $item) {
			if ($key == "cat_id") {
				$sql_cat = "SELECT * FROM `categories` WHERE `id` = ".$item;
				//print_r(getAssocResult($sql_cat));
				if (count(getAssocResult($sql_cat)) >0) {
					foreach (getAssocResult($sql_cat) as $value_cat) {
						$goods_line = str_replace("{{".$key."}}", $value_cat['cat_name'], $goods_line);
					}
				}
				else {
					$goods_line = str_replace("{{".$key."}}", "Без категории", $goods_line);
				}
			}
			else {
				$goods_line = str_replace("{{".$key."}}", $item, $goods_line);
			}
		}
		
		$goods_table .= $goods_line;
	}
//echo $goods_table;
	return $goods_table;
}

function switch_page_admin($url) {
	//print_r($url);
	$page_name = $url[0];

	switch ($page_name) {
		case "goods":
			return list_table("goods","tpl_goods.php");
			break;
		case "categories":
			return list_table("categories","tpl_cat.php");
			break;
		case "galleries":
			return list_table("galleries","tpl_gal.php");
			break;
		case "users":
			return list_table("users","tpl_users.php");
			break;
	}
}


function delLine($url) {
	$db = mysqli_connect(HOST, USER, PASS, DB);
	$page_name = $url[0];
	$action = $url[1];
	$id = $url[2];
	if ($action == "del") {
		switch ($page_name) {
			case "goods":
				$sql = "DELETE FROM `goods` WHERE `id` = ".$id;
				mysqli_query($db, $sql);
				break;
			case "categories":
				$sql = "DELETE FROM `categories` WHERE `id` = ".$id;
				mysqli_query($db, $sql);
				break;
			case "galleries":
				$sql = "DELETE FROM `galleries` WHERE `id` = ".$id;
				mysqli_query($db, $sql);
				break;
			case "users":
				$sql = "DELETE FROM `users` WHERE `id` = ".$id;
				mysqli_query($db, $sql);
				break;
		}
	}
}

function addLine($url) {
	$db = mysqli_connect(HOST, USER, PASS, DB);
	$page_name = $url[0];
	$action = $url[1];
	if ($action == "add") {
		switch ($page_name) {
			case "goods":
				$add_form = file_get_contents('tpl_goods_add.php');
				return addLineAction($page_name,$add_form);
				
				break;
			case "categories":
				
				break;
			case "galleries":
				
				break;
			case "users":
				
				break;
		}
	}
}


function addLineAction($page_name,$add_form) {
	if ((!empty($_POST)) && (isset($_POST['add']))) {
		foreach ($_POST as $key => $item) {
			$sql = "INSERT INTO `".$page_name."`  (`".$key."`) VALUES ('".$_POST[$key]."')";
			mysqli_query($db, $sql);
		}
		//print_r($_POST);
	}
	return $add_form;
}


function updateLine($url) {
	$db = mysqli_connect(HOST, USER, PASS, DB);
	$page_name = $url[0];
	$action = $url[1];
	$id = $url[2];
	if ($action == "update") {
		switch ($page_name) {
			case "goods":
				$update_form = file_get_contents('tpl_goods_update.php');
				return prepareUpdate($page_name,$update_form,$id);
				break;
			case "categories":
				$update_form = file_get_contents('tpl_cat_update.php');
				return prepareUpdate($page_name,$update_form,$id);
				break;
			case "galleries":
				
				break;
			case "users":
				
				break;
		}
	}

}



function prepareUpdate($page_name,$update_form,$id) {
	$db = mysqli_connect(HOST, USER, PASS, DB);
	$sql = "SELECT * FROM `".$page_name."` WHERE `id` = ".$id;
	$value = getAssocResult($sql);
	foreach ($value[0] as $key => $item) {
		
		switch ($page_name) {
			case "goods":
				if ($key == "cat_id") {
					//echo "Bingo";
					$res_options_line = "";
					//echo $options_line;
					$sql_select = "SELECT * FROM `categories`";
					foreach (getAssocResult($sql_select) as $options_values) {
						
						$options_line = file_get_contents('tpl_options.php');
						foreach ($options_values as $key_opt => $value_opt) {
							$options_line = str_replace("{{".$key_opt."}}", $value_opt, $options_line);
						}
						//print_r($options_values[$key_opt]);
						
						//$options_line = str_replace("{{cat_name}}", $options_values['cat_name'], $options_line);
						//print_r($options_values);
						//foreach ($options_values as $key_opt => $value_opt) {
							//print_r($value_opt);
							//echo $key_opt;
							//echo $value_opt;
							
							//print_r($options_line);
						//}
						$res_options_line .= $options_line;
					
					}
					echo "<br>".$res_options_line;
					//$update_form = str_replace("{{".$key."}}", $item, $update_form);
					$update_form = str_replace("{{cat_list}}", $res_options_line, $update_form);
				}
				else {
					$update_form = str_replace("{{".$key."}}", $item, $update_form);
				}
				break;
			default:
				$update_form = str_replace("{{".$key."}}", $item, $update_form);
				break;

		}



	}
	if ((!empty($_POST)) && (isset($_POST['change']))) {
		foreach ($value[0] as $key => $item) {
			if ($key != 'id') {
				$sql = "UPDATE  `".$page_name."` SET ".$key." = '".$_POST[$key]."' WHERE `id` = ".$id;
				mysqli_query($db, $sql);
			}
		}
		//print_r($_POST);
	}
	return $update_form;
}
?>