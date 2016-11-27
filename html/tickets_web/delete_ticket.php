<?php 
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "123456");
define("DB_DATABASE", "ticket_new");

@$conn = mysql_connect( DB_HOST, DB_USER, DB_PASSWORD)
		or die("connected failed! <br>");

mysql_query('set names utf8');
$db_select = mysql_select_db(DB_DATABASE, $conn); 

$oid = $_GET['oid'];
$query = "DELETE from orders where oid = $oid";
mysql_query($query, $conn);

header("Location: http://115.28.134.131/tickets_web/my_account.php");
exit;

?>
