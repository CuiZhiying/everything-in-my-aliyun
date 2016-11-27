<?php
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "123456");
define("DB_DATABASE", "ticket_new");

@$conn = mysql_connect( DB_HOST, DB_USER, DB_PASSWORD)
		or die("connected failed! <br>");

mysql_query('set names utf8');
$db_select = mysql_select_db(DB_DATABASE, $conn); 
session_start();

$tel = $_POST['tel'];
$password = $_POST['password'];
$signature = "123456";
$query = "INSERT INTO user(tel, password, signature) values($tel, $password, $signature)";
mysql_query($query, $conn)or die("INSERT failed!<br>");
header("Location: http://115.28.134.131/tickets_web/index.php");
exit;
 ?>
