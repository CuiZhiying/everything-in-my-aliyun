<?php 
session_start();
unset($_POST['email']);
unset($_POST['password']);
unset($_SESSION['uid']);
$_SESSION['login'] = false;
header("Location: http://115.28.134.131/tickets_web/index.php");
exit;
?>
