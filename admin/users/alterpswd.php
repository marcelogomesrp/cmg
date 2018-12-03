<?php
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		session_start();
		if (!isset($_SESSION['userid'])){
			header("location: http://$_SERVER[HTTP_HOST]"."/cmg/admin/login.php");
			die("");
		} else if ($_SESSION['useradmin'] != 1){
			header("location: ../index_admin.php?link=90&edit=0");
			die("");
		}
		require ('../DbConnection.php');
		updatePassword();
	} else {
		exit();
	}

	function updatePassword(){
		global $mysqli;
		$id = $_POST["id"];
		// Hash + Salt password
		$password = $_POST["password"];
		$salt = generateRandomString(12);
		$pswdSalt = $password . $salt;
		$hashedPswd = base64_encode(hash('sha512', $pswdSalt, true));

		$query = "UPDATE users
					SET password = ?, salt = ?
					WHERE id = ?";
		if ($stmt = $mysqli->prepare($query)){
			$stmt->bind_param('ssi', $hashedPswd, $salt, $id);
			$stmt->execute();
			if ($stmt->affected_rows == 1){
				header("location: ../index_admin.php?link=90&edit=1");
				die("");
			} else {
				header("location: ../index_admin.php?link=90&edit=0");
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