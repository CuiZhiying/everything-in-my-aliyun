<?php 

require_once('./Response.php');


$data = json_decode(file_get_contents('php://input'), true);

//print_r($data);
//echo $data["operacion"];

if( isset($data['email']) && isset($data['password']) ){
    $email    = $data['email'];
    $password = $data['password'];

    $arr = array(
    	'username' => $username,
    	'password' => $password
    	);
    Response::json(200, "succeed",$arr);
}
else{
	Response::json(400, "fail", $arr);
}


?>

