<?php
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		session_start();
		if (!isset($_SESSION['userid'])){
			header("location: http://$_SERVER[HTTP_HOST]"."/cmg/admin/login.php");
			die("");
		}
		require ('../DbConnection.php');
		checkCurrentPassword();
	} else {
		exit();
	}

	function checkCurrentPassword(){
		global $mysqli;
		$id = $_POST["id"];
		$email = $_POST["email"];
		$oldpassword = $_POST["oldpassword"];

		// Get salt from user
		$query = "SELECT salt FROM users
					WHERE id = ?";

		if ($stmt = $mysqli->prepare($query)){
			$stmt->bind_param('s', $id);
			$stmt->execute();
			$stmt->store_result();
			$user = array();
			$stmt->bind_result($oldSalt);
			$stmt->fetch();
			$stmt->close();
		}
		// Hash + Salt password
		$pswdSalt = $oldpassword . $oldSalt;
		$hashedPswd = base64_encode(hash('sha512', $pswdSalt, true));

		$query = "SELECT id FROM `users`
					WHERE id = ? AND password = ?";

		if ($stmt = $mysqli->prepare($query)){
			$stmt->bind_param('ss', $id, $hashedPswd);
		 	$stmt->execute();
		 	$stmt->store_result();
		 	if ($stmt->num_rows() == 1){
		 		// SUCCESS - ACCEPTED
		 		updatePassword();
		 	} else {
				header("location: ../index_admin.php?link=3&edit=0");
				die("");
		 	}
		 	$stmt->close();
		}
	}

	function updatePassword(){
		global $mysqli;
		$id = $_POST["id"];
		$email = $_POST["email"];
		// Hash + Salt password
		$password = $_POST["password"];
		$salt = generateRandomString(12);
		$pswdSalt = $password . $salt;
		$hashedPswd = base64_encode(hash('sha512', $pswdSalt, true));

		$query = "UPDATE users
					SET password = ?, salt = ?
					WHERE id = ?";
		if ($stmt = $mysqli->prepare($query)){
			$stmt->bind_param('sss', $hashedPswd, $salt, $id);
			$stmt->execute();
			if ($stmt->affected_rows == 1){
				header("location: ../index_admin.php?link=3&edit=1");
				die("");
			} else {
				header("location: ../index_admin.php?link=3&edit=0");
				die("");
			}

			$stmt->close();
		}
		$mysqli->close();
	}

	function generateRandomString($length) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
	
?>