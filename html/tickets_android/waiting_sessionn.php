<?php

header("Content-type: text/html; charset=utf-8");

require_once('./Response.php');
require_once('./db_config.php');

$data_json = file_get_contents('php://input');
$data = json_decode($data_json, true);

$filename = "testfile.txt";
if( file_exists($filename) ){
	$myfile = fopen($filename, "r");
	$string = fgets($myfile);
	fclose($myfile);
	Response::json(200, "succeed", $string);
}else{
	Response::json(400, "fail");
}


?>
