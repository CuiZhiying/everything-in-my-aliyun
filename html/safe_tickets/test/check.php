<?php
header("Content-type: text/html; charset=utf-8");
//echo "Hello, I'm here";

require_once('./Response.php');
require_once('./db_config.php');

$data = json_decode(file_get_contents('php://input'), true);


if( $data )
    Response::json(200, "I receive your data!");
else
    Response::json(400,"I can't not receive your data!");


/*
session_start();
//$_SESSION['signature']=$data['signature'];
//if( $data != NULL)
//    $_SESSION['test'] = 'test';
//while( $_SESSION['test'] != 'test');
//echo $data;


if( $data['email'] != $_SESSION['email'] )
    Response::json(400, "can't not be valify");
else 
    $_SESSION['check'] = "checking";
while( !isset($_SESSION['result']) );


if( $_SESSION['result']== "T" )
    Response::json(200, "valify succeed!");
else
    Response::json(400,"can't not be valify");
unset($_SESSION['result']);
unset($_SESSION['email']);
unset($_SESSION['check']);
*/
?>
