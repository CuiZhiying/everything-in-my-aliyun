<?php
header("Content-type: text/html; charset=utf-8");

require_once('./Response.php');
require_once('./db_config.php');

$data_json = file_get_contents('php://input');
$data = json_decode($data_json, true);

$uid = $data["uid"];
$mid = $data['mid'];
$timestamp = $data["timestamp"];
$arr['uid'] = $data["uid"];
$arr["timestamp"] = $data["timestamp"];
//Response::json(400, "fail", $arr);

@$conn = mysql_connect( DB_HOST, DB_USER, DB_PASSWORD)
       or die("connected failed! <br>");
mysql_query('set names utf8');
$db_select = mysql_select_db(DB_DATABASE, $conn);

$query ="select * from orders where mid=$mid && uid=$uid";
$result = mysql_query( $query, $conn);

if(mysql_num_rows($result) > 0){
        $row = mysql_fetch_assoc($result);
        if( $row['state'] != 1 ){
                Response::json(400, "fail");
		exit;
        }
}else{
	Response::json(400, "fail!");
}

$filename = $uid."_temp.txt";
if( file_exists($filename) ){
	$myfile = fopen($filename, "r");
	$message = json_decode( fgets($myfile), true );
	//Response::json(200, "succeed", $message);
	fclose( $myfile );
	if( $uid != $message['uid'] || $timestamp != $message['timestamp']){
		Response::json(400, "fail!::::::::::::::::::::");
		exit;
	}
}else{
	Response::json(400, "fail");
	exit;
}

$filename2 = $uid."_check_temp.txt";
$myfile2 = fopen($filename2, "w");
fwrite($myfile2, $data_json);
fclose($myfile2);


/*
@$conn = mysql_connect( DB_HOST, DB_USER, DB_PASSWORD)
       or die("connected failed! <br>");
mysql_query('set names utf8');
$db_select = mysql_select_db(DB_DATABASE, $conn);
*/
$query = "update orders set state=0 where mid=$mid && uid=$uid";
mysql_query($query, $conn);




$filename3 = $uid."_response.txt";
while( !file_exists( $filename3 ) )
	;
$myfile3 = fopen($filename3, "r");
$message3 = json_decode( fgets($myfile3), true );
while( $message['uid'] != $uid || $message['timestamp'] != $timestamp )
	;
Response::json(200, "succss");
unlink("$uid"."_temp.txt");
unlink("$uid"."_check_temp.txt");
unlink("$uid"."_response.txt");


?>
