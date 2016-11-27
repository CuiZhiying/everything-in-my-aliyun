<?php
header("Content-type: text/html; charset=utf-8");

require_once('./Response.php');
require_once('./db_config.php');

$data = json_decode(file_get_contents('php://input'), true);

session_start();
$_SESSION['signature'] = $data['signature'];
if( $data['email'] != $_SESSION['email'] )
    Response::json(400, "can't not be valify");
while( !isset($_SESSION['result']) )
{   ;
}

if( $_SESSION['result']== "T" )
    Response::json(200, "valify succeed!");
else
    Response::json(400,"can't not be valify");

$_SESSION['email'] = NULL;
$_SESSION['result'] = NULL;
?>
