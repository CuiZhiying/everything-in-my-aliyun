<?php 
echo $_POST["email"];
echo $_POST["password"];
if($_POST["email"] == "csu_cui@163.com" && $_POST["password"]=="123456")
{
	session_start();
	$_SESSION["login"] = true;
	echo "I'm login!";
}

?>
