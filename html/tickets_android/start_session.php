<?php

header("Content-type: text/html; charset=utf-8");

require_once('./Response.php');
require_once('./db_config.php');

$data_json = file_get_contents('php://input');
$data = json_decode($data_json, true);
$temp_session = fopen($data['uid']."_temp.txt","w");
fwrite($temp_session, $data_json);
fclose($temp_session);

?>
