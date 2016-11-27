<?php 
header("Content-type: text/html; charset=utf-8");
require_once('./Response.php');
require_once('./db_config.php');

$data = json_decode(file_get_contents('php://input'), true);
$uid = $data['uid'];

@$conn = mysql_connect( DB_HOST, DB_USER, DB_PASSWORD)
       or die("connected failed! <br>");
mysql_query('set names utf8');
$db_select = mysql_select_db(DB_DATABASE, $conn);

$query = "update orders set state=1 where uid=$uid";
mysql_query($query,$conn);
mysql_close($conn);
Response::json(200, "succeed!");

?>

