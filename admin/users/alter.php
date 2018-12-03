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
			updatePermissions();
			// if ($stmt->affected_rows == 1){
			// 	updatePermissions();
			// } else {
			// 	header("location: ../index_admin.php?link=90&edit=0");
			// 	die("");
			// }

			$stmt->close();
		}
	}

	function updatePermissions(){
		global $mysqli;
		$id = $_POST["id"];
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

		$query = "UPDATE `permissoes`
					SET `admin` = ?, `patrocinadores` = ?, `servicos` = ?, `analiseseuexame` = ?, `publicacoes` = ?, `agenda` = ?, `areas` = ?, `exames` = ?, `genes` = ?, `contatos` = ?
					WHERE `userid` = ?";
		if ($stmt = $mysqli->prepare($query)){
			$stmt->bind_param('iiiiiiiiiii', $admin, $patrocinadores, $servicos, $analiseseuexame, $publicacoes, $agenda, $areas, $exames, $genes, $contatos, $id);
			$stmt->execute();
		}
		header("location: ../index_admin.php?link=90&edit=1");
		die("");
		// if ($stmt->affected_rows == 1){
		// 	header("location: ../index_admin.php?link=90&edit=1");
		// 	die("");
		// } else {
		// 	header("location: ../index_admin.php?link=90&edit=0");
		// 	die("");
		// }
		$stmt->close();
	}

	$mysqli->close();
	
?>