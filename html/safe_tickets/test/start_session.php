<?php

header("Content-type: text/html; charset=utf-8");

require_once('./Response.php');
require_once('./db_config.php');

//Response::json(200, "haha, I'm here!");

$data = json_decode(file_get_contents('php://input'), true);

session_start();
$_SESSION['email'] = $data['email'];
/*
while( $_SESSION['check'] == NULL )
{   ;
}
*/
while( 1);
$send_data = array (
              'a' => 123,
              'b' => 456
             );
Response::json(200,"please cherk the signature", $send_data);
unset( $_SESSION['email']);

?>
