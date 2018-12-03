<?php
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		session_start();
		if (!isset($_SESSION['userid'])){
			header("location: http://$_SERVER[HTTP_HOST]"."/cmg/admin/login.php");
			die("");
		}
		require ('../DbConnection.php');
		updateUsers();
	} else {
		exit();
	}

	function updateUsers(){
		global $mysqli;
		$name = $_POST["name"];
		$email = $_POST["email"];
		$id = $_POST["id"];

		$query = "UPDATE `users`
					SET `name` = ?, `email` = ?
					WHERE `id` = ?";
		if ($stmt = $mysqli->prepare($query)){
			$stmt->bind_param('ssi', $name, $email, $id);
			$stmt->execute();
			
			// if ($stmt->affected_rows == 1){
			$_SESSION['username'] = $name;
			$_SESSION['useremail'] = $email;
			header("location: ../index_admin.php?link=3&edit=1");
			die("");
			// } else {
			// 	header("location: ../index_admin.php?link=90&edit=0");
			// 	die("");
			// }

			$stmt->close();
		}
	}

	$mysqli->close();
	
?>