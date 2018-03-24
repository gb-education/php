<?
require_once ('../core/config.php');
session_start();

$db = mysqli_connect(HOST, USER, PASS, DB);

$salt = "3Avenb7Avk";

$login = (isset($_POST['login']))?strip_tags($_POST['login']):"";
$pass = (isset($_POST['pass']))?strip_tags($_POST['pass']).$salt:"";
$q="select * from users where login='$login' and pass=md5('$pass');";
//echo $q;
$sql = mysqli_query($db,$q);
//print_r($sql);
//echo $q;
if(mysqli_num_rows($sql)>0){
	$_SESSION['login']=$login;	
	$_SESSION['pass']=$pass;
	header("Location:index.php?success");
}
else {
	header("Location:index.php");
}

?>