<?php

header("Content-type: text/html; charset=utf-8");

require_once('./Response.php');
require_once('./db_config.php');

$data_json = file_get_contents('php://input');
$data = json_decode($data_json, true);

$filename = $data['uid']."_response.txt";

$myfile = fopen($filename, "w");
fwrite( $myfile, $data_json );
fclose( $myfile );

Response::json(200, "succeed");
?>
