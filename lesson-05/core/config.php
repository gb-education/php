<?
$connect_db = mysqli_connect ("localhost", "root", "", "gallery_db");

const galley_dir = "gallery_img/";
const galley_tmp = "gallery_img_cache/";

$max_file_upload = 2048000;

$crop_img_width = 150;
$crop_img_height = 150;

$upload_file_type = "jpg,jpeg,png";

?>