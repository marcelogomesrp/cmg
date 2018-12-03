<?php
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		session_start();
		if (!isset($_SESSION['userid'])){
			header("location: http://$_SERVER[HTTP_HOST]"."/cmg/admin/login.php");
			die("");
		} else if ($_SESSION['useranaliseseuexame'] != 1){
			header("location: ../index_admin.php?link=30&edit=0");
			die("");
		}
		require ('../DbConnection.php');
		updateAnaliseSeuExame();
	} else {
		exit();
	}

	function updateAnaliseSeuExame(){
		global $mysqli;
		$pedidoexame = $_POST["pedidoexame"];
		$documentos = $_POST["documentos"];
		$solicitacaoservico = $_POST["solicitacaoservico"];
		$agendamentodeconsultoria = $_POST["agendamentodeconsultoria"];
		$id = $_POST["id"];

		$query = "UPDATE `analiseseuexame`
					SET `pedidoexame` = ?, `documentos` = ?, `solicitacaoservico` = ?, `agendamentodeconsultoria` = ?
					WHERE `id` = ?";
		if ($stmt = $mysqli->prepare($query)){
			$stmt->bind_param('ssssi', $pedidoexame, $documentos, $solicitacaoservico, $agendamentodeconsultoria, $id);
			$stmt->execute();
			if ($stmt->affected_rows == 1){
				header("location: ../index_admin.php?link=30&edit=1");
				die("");
			} else {
				header("location: ../index_admin.php?link=30&edit=0");
				die("");
			}

			$stmt->close();
		}
		$mysqli->close();
	}
	
?>