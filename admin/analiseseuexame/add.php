<?php
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		session_start();
		if (!isset($_SESSION['userid'])){
			header("location: http://$_SERVER[HTTP_HOST]"."/cmg/admin/login.php");
			die("");
		} else if ($_SESSION['useranaliseseuexame'] != 1){
			header("location: ../index_admin.php?link=30&add=0");
			die("");
		}
		require ('../DbConnection.php');
		insertAnaliseSeuExame();
	} else {
		exit();
	}

	function insertAnaliseSeuExame(){
		global $mysqli;
		$pedidoexame = $_POST["pedidoexame"];
		$documentos = $_POST["documentos"];
		$solicitacaoservico = $_POST["solicitacaoservico"];
		$agendamentodeconsultoria = $_POST["agendamentodeconsultoria"];
		
		$query = "INSERT INTO `analiseseuexame`
					(`pedidoexame`, `documentos`, `solicitacaoservico`, `agendamentodeconsultoria`)
					VALUES (?, ?, ?, ?)";
		if ($stmt = $mysqli->prepare($query)){
			$stmt->bind_param('ssss', $pedidoexame, $documentos, $solicitacaoservico, $agendamentodeconsultoria);
			$stmt->execute();
		}
		if ($stmt->affected_rows == 1){
			header("location: ../index_admin.php?link=30&add=1");
			die("");
		} else {
			header("location: ../index_admin.php?link=30&add=0");
			die("");
		}
		$stmt->close();
	}

	$mysqli->close();
?>