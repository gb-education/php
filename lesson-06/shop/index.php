<?
require_once('core/core.php');

session_start();

//echo $_GET['path'];

print_r($_GET);

echo session_id();

$str = trim($_GET['path']);
$str = stripslashes($str);
$str = htmlspecialchars($str);

$url = array();
$url = explode('/', $str);

//print_r($url);

pageBuilder($url);

?>
