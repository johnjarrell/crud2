<?php

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "crud2";
//
// // Create connection
// $conn = mysqli_connect($servername, $username, $password, $dbname);
// // Check connection
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }

$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "root";
$db['db_name'] = "crud2";

foreach ($db as $key => $value) {
	define(strtoupper($key), $value);
}

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);


if (!$conn) {
	die('We are unable to connect to the Database. ERROR: '.mysqli_connect_error());
}

//$user = 'root';
//$password = 'root';
//$db = 'crud2';
//$host = 'localhost';
//$port = 8889;
//
//$link = mysqli_init();
//$success = mysqli_real_connect(
//	$link,
//	$host,
//	$user,
//	$password,
//	$db,
//	$port
//);

?>
