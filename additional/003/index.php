<?php

$header = "Поиск файлов";
include('header.html');

//-------------------------------------------


//print_r(scandir('files'));

//print_r  (file_get_contents('files/file_03.txt', NULL, NULL, 20, 50));


//echo file_get_contents ( "file.txt" );

//$filename = "files/file_03.txt";
$search_str = $_POST['search_text'];;


$file_list = scandir ("files");

//print_r ($file_list);

$search_count = 0;
$res_str_count = 1;

$main_result = "";

foreach ($file_list as $key => $filename) {
	$filename = "files/".$filename;
	//echo $filename;
	if (($key >= 2) && (file_exists($filename))) {
		$file = fopen($filename, "r");
		
		$buffer = "";
		
		while (!feof($file)) {
			$str = fgets($file);
			if (mb_strpos($str,$search_str)) {
			$str = str_replace($search_str, "<b>".$search_str."</b>" , $str);
			$search_count += mb_substr_count($str,$search_str);
			$buffer.= $res_str_count++.") ".$filename." - ".$str."<br>\n<br>\n";
		   }
		}
		$main_result .= $buffer;
		
	fclose($file);
	}
}

echo "Всего результатов найдено: ".$search_count."<br><br>".$main_result;

//-------------------------------------------
include('footer.html');

?>