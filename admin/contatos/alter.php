<?php
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		session_start();
		if (!isset($_SESSION['userid'])){
			header("location: http://$_SERVER[HTTP_HOST]"."/cmg/admin/login.php");
			die("");
		} else if ($_SESSION['usercontatos'] != 1){
			header("location: ../index_admin.php?link=100&edit=0");
			die("");
		}
		require ('../DbConnection.php');
		updateContatos();
	} else {
		exit();
	}

	function updateContatos(){
		global $mysqli;
		$setor = $_POST["setor"];
		$telefone1 = $_POST["telefone1"];
		$telefone2 = $_POST["telefone2"];
		$telefone3 = $_POST["telefone3"];
		$email1 = $_POST["email1"];
		$email2 = $_POST["email2"];
		$email3 = $_POST["email3"];
		$id = $_POST["id"];

		$query = "UPDATE `contatos`
					SET `setor` = ?, `telefone1` = ?, `telefone2` = ?, `telefone3` = ?, `email1` = ?, `email2` = ?, `email3` = ?
					WHERE `id` = ?";
		if ($stmt = $mysqli->prepare($query)){
			$stmt->bind_param('sssssssi', $setor, $telefone1, $telefone2, $telefone3, $email1, $email2, $email3, $id);
			$stmt->execute();
			if ($stmt->affected_rows == 1){
				header("location: ../index_admin.php?link=100&edit=1");
				die("");
			} else {
				header("location: ../index_admin.php?link=100&edit=0");
				die("");
			}

			$stmt->close();
		}
		$mysqli->close();
	}
	
?>