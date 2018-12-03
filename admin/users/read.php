<?php
	if($_SERVER["REQUEST_METHOD"]=="GET"){
		require ('../DbConnection.php');
		getUsers();
	} else {
		exit();
	}

	function getUsers(){
		global $mysqli;
		$id = $json["id"];

		$query = "SELECT id, name, email, created_at, updated_at
					FROM users
					WHERE id = ?
					ORDER BY name ASC";

		if ($stmt = $mysqli->prepare($query)){
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->store_result();
			$user = array();
			$stmt->bind_result($id, $name, $email, $created_at, $updated_at);
			$stmt->fetch();
			$user = array('id'=>$id, 'name'=>$name, 'email'=>$email, 'created_at'=>$created_at, 'updated_at'=>$updated_at);
			$stmt->close();
		}
		$mysqli->close();

		header('Content-Type: application/json');
		echo json_encode($user);
	}
?>