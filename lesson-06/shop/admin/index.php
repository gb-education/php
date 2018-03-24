<?
//require_once ('../core/config.php');
require_once('functions.php');
session_start();

if (isset($_GET['logout'])) {
	session_destroy();
	header("Location:index.php");
}



/*if ($_SESSION['login'] && (isset($_GET['success']))) {
	echo "Привет, ".$_SESSION['login'];
	//session_destroy();
}*/

//print_r($_GET);
//echo session_id();

$str = trim($_GET['path']);
$str = stripslashes($str);
$str = htmlspecialchars($str);

$url = array();
$url = explode('/', $str);

//print_r($url);

//admin_generate ($url);


if ($_SESSION['login']) {
	delLine($url);
	$update = updateLine($url);
	$content = switch_page_admin($url);
	$add = addLine($url);
	include_once('tpl_admin_main.php');
}
else {
	include_once('tpl_form.php');
}

?>