<?php 
header("Content-type: text/html; charset=utf-8");
require_once('./Response.php');
require_once('./db_config.php');

$data = json_decode(file_get_contents('php://input'), true);
$is_login = 0;

@$conn = mysql_connect( DB_HOST, DB_USER, DB_PASSWORD)
       or die("connected failed! <br>");
mysql_query('set names utf8');
$db_select = mysql_select_db(DB_DATABASE, $conn);

if( isset($data['username']) && isset($data['password']) ){
        $tel = $data['username'];
        $password = $data['password'];
/*	
	@$conn = mysql_connect( DB_HOST, DB_USER, DB_PASSWORD)
                or die("connected failed! <br>");
	mysql_query('set names utf8');
	$db_select = mysql_select_db(DB_DATABASE, $conn);
*/

	$query = "select * from user where tel = $tel";
	$result = mysql_query($query, $conn);
        if(mysql_num_rows($result) > 0){
                $row = mysql_fetch_assoc($result);
		if( $row['password'] == $password ){
			$is_login = 1;
			$uid = $row['uid'];
			$arr['uid'] = $row['uid'];
		}
	}
}

if( $is_login ){
	/*
	$query = "select * from orders inner join user using(uid) inner join movies using(mid)  where uid = $uid";
	$result = mysql_query($query, $conn)or die("query orders fail!");
	$count = 0;
	while($row = mysql_fetch_assoc($result)){
		$arr[$count]["mid"] = $row['mid'];
		$arr[$count]["movie_name"] = $row["movie_name"];
		$arr[$count]["movie_message"] = $row["movie_message"];
		$arr[$count]["uid"] = $uid;
		$arr[$count]["state"] = $row["state"];
		$count += 1;
	}
	$GOBALS["money"] = $uid;
	Response::json(200, "login succeed!", $arr);
	*/
	Response::json(200, "$uid");
}else{
	Response::json(400, "login fail!");
}

mysql_close($conn);


/*
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
*/

?>

