<?php
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		require ('../DbConnection.php');
		checkUser();
	} else {
		exit();
	}

	function checkUser(){
		global $mysqli;
		$email = $_POST["email"];
		$password = $_POST["password"];

		// Get salt from user
		$query = "SELECT salt FROM users
					WHERE email = ?";

		if ($stmt = $mysqli->prepare($query)){
			$stmt->bind_param('s', $email);
			$stmt->execute();
			$stmt->store_result();
			$user = array();
			$stmt->bind_result($salt);
			$stmt->fetch();
			$stmt->close();
		}
		// Hash + Salt password
		$pswdSalt = $password . $salt;
		$hashedPswd = base64_encode(hash('sha512', $pswdSalt, true));

		$query = "SELECT id, name, email, admin, patrocinadores, servicos, analiseseuexame, publicacoes, agenda, areas, exames, genes, contatos
					FROM `users`
					INNER JOIN permissoes ON users.id = permissoes.userid
					WHERE email = ? AND password = ?";

		if ($stmt = $mysqli->prepare($query)){
			$stmt->bind_param('ss', $email, $hashedPswd);
		 	$stmt->execute();
		 	$stmt->store_result();
		 	if ($stmt->num_rows() == 1){
		 		// SUCCESS - ACCEPTED
		 		$stmt->bind_result($id, $name, $email, $admin, $patrocinadores, $servicos, $analiseseuexame, $publicacoes, $agenda, $areas, $exames, $genes, $contatos);
				$stmt->fetch();
		 		// CREATE SESSION
		 		session_start(['cookie_lifetime' => 86400]);
		 		$_SESSION['userid'] = $id;
		 		$_SESSION['username'] = $name;
				$_SESSION['useremail'] = $email;
				$_SESSION['useradmin'] = $admin;
				$_SESSION['userpatrocinadores'] = $patrocinadores;
				$_SESSION['userservicos'] = $servicos;
				$_SESSION['useranaliseseuexame'] = $analiseseuexame;
				$_SESSION['userpublicacoes'] = $publicacoes;
				$_SESSION['useragenda'] = $agenda;
				$_SESSION['userareas'] = $areas;
				$_SESSION['userexames'] = $exames;
				$_SESSION['usergenes'] = $genes;
				$_SESSION['usercontatos'] = $contatos;
		 		header("location: ../index_admin.php");
				die("");
		 	} else {
				// WRONG USERNAME OR PASSWORD - UNAUTHORIZED
				header("location: ../login.php?s=0");
				die("");
		 	}
		 	$stmt->close();
		}
	}

	$mysqli->close();
?>