<?php 
header("Content-type: text/html; charset=utf-8"); 

require_once('./Response.php');
require_once('./db_config.php');

$data = json_decode(file_get_contents('php://input'), true);

//print_r($data);
//echo $data["operacion"];

if( isset($data['email']) && isset($data['password']) ){
//if(  1 /*isset($_POST['email']) && isset($_POST['password'])*/ ){
//$email = "csu_cui@163.com";
//$password = "123456";
        $email = $data['email'];
        $password = $data['password'];
	$dbc = mysqli_connect( db_host, db_user, db_password, db_name )
	    or die("error:cannot connect to the database!");
	$query = "select password from users where email = '$email'";
	$result =  mysqli_query($dbc, $query)
	    or die("query error!");
	$number = mysqli_num_rows($result);

	if( $number==1 )
	{
		$row = mysqli_fetch_array($result, MYSQL_ASSOC);//
		if( $password == $row['password'] )
		{
			//fetching tickets 
			$query = "select u.email, o.signature, t.code, t.title, t.date, t.seate from orders as o  inner join tickets as t using(tid) inner join users as u using(uid) where u.email = '$email';";

			$result = mysqli_query($dbc, $query);
			$arr = array();
			$count = 0;
			while( $row = mysqli_fetch_array($result, MYSQL_ASSOC))
			{	//var_dump($row);
				$count++;
				$arr['email'."$count"] = $row['email'];
			        $arr['signature'."$count"] = $row['signature'];
				$arr['code'."$count"]   = $row['code'];
				$arr['title'."$count"]  = $row['title'];
				$arr['date'."$count"]   = $row['date'];
				$arr['seate'."$count"]  = $row['seate'];
				//var_dump($arr);
				//Response::json(200,"succeed",$arr);
				//$arr["email"."$count"] = $row['email'];
				//$arr["signature"."$count"] = $row['signature'];

				//echo "\n\n\n\n\n";
			}
			//var_dump($arr);
			/*$arr = array(
				'email' => $email,
				'password' => $password
				);*/
                        $arr['count'] = $count;
			Response::json(200, "succeed!", $arr);
		}else{
			Response::json(400, "Error: wrong password!");
		}
	}
}
else{
	Response::json(400, "cannot recieve enough arguments!");
}


?>

