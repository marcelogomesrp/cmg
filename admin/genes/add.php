<?php
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		session_start();
		if (!isset($_SESSION['userid'])){
			header("location: http://$_SERVER[HTTP_HOST]"."/cmg/admin/login.php");
			die("");
		} else if ($_SESSION['usergenes'] != 1){
			header("location: ../index_admin.php?link=80&add=0");
			die("");
		}
		require ('../DbConnection.php');
		insertGenes();
	} else {
		exit();
	}

	function insertGenes(){
		global $mysqli;
		$nome = $_POST["nome"];
		$link = $_POST["link"];
		session_start();
		$idusuario_alteracao = $_SESSION['userid'];
		$data_alteracao = date('Y-m-d H:i:s');
		
		$query = "INSERT INTO `genes`
					(`nome`, `link`, `idusuario_alteracao`, `data_alteracao`)
					VALUES (?, ?, ?, ?)";
		if ($stmt = $mysqli->prepare($query)){
			$stmt->bind_param('ssis', $nome, $link, $idusuario_alteracao, $data_alteracao);
			$stmt->execute();
		}
		if ($stmt->affected_rows == 1){
			header("location: ../index_admin.php?link=80&add=1");
			die("");
		} else {
			header("location: ../index_admin.php?link=80&add=0");
			die("");
		}
		$stmt->close();
	}

	$mysqli->close();
?>