<?php

$header = "Поиск файлов";
include('header.html');

//-------------------------------------------


//print_r(scandir('files'));

//print_r  (file_get_contents('files/file_03.txt', NULL, NULL, 20, 50));


//echo file_get_contents ( "file.txt" );

$filename = "files/file_03.txt";
$search_str = $_POST['search_text'];;


$file_list = scandir ("files");

//print_r ($file_list);

foreach ($file_list as $key => $filename) {
	$filename = "files/".$filename;
	//echo $filename;
	if (($key >= 2) && (file_exists($filename))) {
		$file = fopen($filename, "r");
		
		$buffer = "";
		
		while (!feof($file)) {
			$str = fgets($file);
			if (mb_strpos($str,$search_str) !== false){
			$str = str_replace($search_str, "<b>".$search_str."</b>" , $str);
			$buffer.= $str."<br>\n<br>\n";
		   }
		}
		echo $buffer;
		
	fclose($file);
	}
}

//-------------------------------------------
include('footer.html');

?>