<?php

	$servername = "localhost";
	$username = "cmg";
	$password = "";
	$database = "cmg";

	// try {
	// 	$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
	// 	// set the PDO error mode to exception
	// 	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// 	echo "Connected successfully"; 
	// } catch(PDOException $e) {    
	// 	echo "Connection failed: " . $e->getMessage();
	// }


	$mysqli = new mysqli($servername,$username,$password,$database);

mysql_set_charset('utf8');

	if (mysqli_connect_errno()){
		echo "Can't connect with database: ". mysqli_connect_error();
		exit();
	}

$mysqli->set_charset("utf8")

?>
