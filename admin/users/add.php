<?php
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		session_start();
		if (!isset($_SESSION['userid'])){
			header("location: http://$_SERVER[HTTP_HOST]"."/cmg/admin/login.php");
			die("");
		} else if ($_SESSION['useradmin'] != 1){
			header("location: ../index_admin.php?link=90&add=0");
			die("");
		}
		require ('../DbConnection.php');
		checkUsers();
	} else {
		exit();
	}

	function checkUsers(){
		global $mysqli;
		$email = $_POST["email"];

		$query = "SELECT id FROM users
					WHERE email = ?";

		if ($stmt = $mysqli->prepare($query)){
			$stmt->bind_param('s', $email);
			$stmt->execute();
			$stmt->store_result();
			if ($stmt->num_rows() == 1){
				header("location: ../index_admin.php?link=90&add=2");
				die("");
				$stmt->close();
			} else {
				$stmt->close();
				insertUsers();
			}
		}
	}

	function insertUsers(){
		global $mysqli;
		$name = $_POST["name"];
		$email = $_POST["email"];
		// Hash + Salt password
		$password = $_POST["password"];
		$salt = generateRandomString(12);
		$pswdSalt = $password . $salt;
		$hashedPswd = base64_encode(hash('sha512', $pswdSalt, true));
		
		$query = "INSERT INTO `users`
					(`name`, `email`, `password`, `salt`)
					VALUES (?, ?, ?, ?)";
		if ($stmt = $mysqli->prepare($query)){
			$stmt->bind_param('ssss', $name, $email, $hashedPswd, $salt);
			$stmt->execute();
			$id = $mysqli->insert_id;
		}
		if ($stmt->affected_rows == 1){
			insertPermissions($id);
		} else {
			header("location: ../index_admin.php?link=90&add=0");
			die("");
		}
		$stmt->close();
	}

	function insertPermissions($id){
		global $mysqli;
		if (isset($_POST["admin"])){
			$admin = 1;
		} else {
			$admin = 0;
		}
		if (isset($_POST["patrocinadores"])){
			$patrocinadores = 1;
		} else {
			$patrocinadores = 0;
		}
		if (isset($_POST["servicos"])){
			$servicos = 1;
		} else {
			$servicos = 0;
		}
		if (isset($_POST["analiseseuexame"])){
			$analiseseuexame = 1;
		} else {
			$analiseseuexame = 0;
		}
		if (isset($_POST["publicacoes"])){
			$publicacoes = 1;
		} else {
			$publicacoes = 0;
		}
		if (isset($_POST["agenda"])){
			$agenda = 1;
		} else {
			$agenda = 0;
		}
		if (isset($_POST["areas"])){
			$areas = 1;
		} else {
			$areas = 0;
		}
		if (isset($_POST["exames"])){
			$exames = 1;
		} else {
			$exames = 0;
		}
		if (isset($_POST["genes"])){
			$genes = 1;
		} else {
			$genes = 0;
		}
		if (isset($_POST["contatos"])){
			$contatos = 1;
		} else {
			$contatos = 0;
		}

		$query = "INSERT INTO `permissoes`
					(`userid`, `admin`, `patrocinadores`, `servicos`, `analiseseuexame`, `publicacoes`, `agenda`, `areas`, `exames`, `genes`, `contatos`)
					VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		if ($stmt = $mysqli->prepare($query)){
			$stmt->bind_param('iiiiiiiiiii', $id, $admin, $patrocinadores, $servicos, $analiseseuexame, $publicacoes, $agenda, $areas, $exames, $genes, $contatos);
			$stmt->execute();
		}
		if ($stmt->affected_rows == 1){
			header("location: ../index_admin.php?link=90&add=1");
			die("");
		} else {
			header("location: ../index_admin.php?link=90&add=0");
			die("");
		}
		$stmt->close();
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

	$mysqli->close();
?>