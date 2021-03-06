<?php
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		session_start();
		if (!isset($_SESSION['userid'])){
			header("location: http://$_SERVER[HTTP_HOST]"."/cmg/admin/login.php");
			die("");
		} else if ($_SESSION['useragenda'] != 1){
			header("location: ../index_admin.php?link=50&edit=0");
			die("");
		}
		require ('../DbConnection.php');
		updateAgenda();
	} else {
		exit();
	}

	function updateAgenda(){
		global $mysqli;
		$id = $_POST["id"];
		$nome = $_POST["nome"];
		$descricao = $_POST["descricao"];
		$data = $_POST["data"];
		$dataaux = explode("/", $data);
		$date = $dataaux[2] . "-" . $dataaux[1] . "-" . $dataaux[0];

		$query = "UPDATE `agenda`
					SET `nome` = ?, `descricao` = ?, `data` = ?
					WHERE `id` = ?";
		if ($stmt = $mysqli->prepare($query)){
			$stmt->bind_param('sssi', $nome, $descricao, $date, $id);
			$stmt->execute();
			if ($stmt->affected_rows == 1){
				header("location: ../index_admin.php?link=50&edit=1");
				die("");
			} else {
				header("location: ../index_admin.php?link=50&edit=0");
				die("");
			}

			$stmt->close();
		}
		$mysqli->close();
	}
	
?>