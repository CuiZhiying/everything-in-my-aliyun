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
if(!empty($_POST['movie']) && isset($_SESSION['tel']) && isset($_SESSION['uid'])){
$movie = $_POST['movie'];


$tel = $_SESSION['tel'];
$uid = $_SESSION['uid'];

$query = "INSERT INTO orders(uid, mid, state) values($uid, $movie, 1)";
$result = mysql_query($query, $conn) or die("query failed!!!!!<br>");
header("Location: http://115.28.134.131/tickets_web/my_account.php");
exit;
}else{
	header("Location: http://115.28.134.131/tickets_web/index.php");
exit;
}
?>
