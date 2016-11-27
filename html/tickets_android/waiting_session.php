<?php

header("Content-type: text/html; charset=utf-8");

require_once('./Response.php');
require_once('./db_config.php');

$data_json = file_get_contents('php://input');
//Response::json(200, "succeed");
$data = json_decode($data_json, true);
$uid = $data['uid'];
$timestamp = $data['timestamp'];
//Response::json(200, "succeed", $arr);
//$uid = 2;
$filename = $uid."_check_temp.txt";
if( file_exists($filename) ){
	$myfile = fopen($filename, "r");
	$string = fgets($myfile);
	fclose($myfile);
	$store = json_decode($string, true);
//	$arr['uid'] = $store['uid'];
//	$arr['timestamp'] =  $store['timestamp']; 
//	Response::json(200, "dd", $arr);


	//Response::json(400,"succeed", $store );
	if( $data['uid'] == $store['uid'] && $data['timestamp'] == $store['timestamp'])
		Response::json(200,"", $store);
	else
		Response::json(400,"");
/*
	if($data['uid'] == $store['uid'] && $data['timestamp'] == $store['timestamp'] )
		Response::json(200, "succeed//////", $store);
	else
		Response::json(400, "failing");
*/
}else{
	Response::json(400, "fail");
}


?>
