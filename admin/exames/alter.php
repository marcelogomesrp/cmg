<?php
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		session_start();
		if (!isset($_SESSION['userid'])){
			header("location: http://$_SERVER[HTTP_HOST]"."/cmg/admin/login.php");
			die("");
		} else if ($_SESSION['userexames'] != 1){
			header("location: ../index_admin.php?link=70&edit=0");
			die("");
		}
		require ('../DbConnection.php');
		updateExames();
	} else {
		exit();
	}

	function updateExames(){
		global $mysqli;
		$idarea = $_POST["area"];
		$nome = $_POST["nome"];
		session_start();
		$idusuario_alteracao = $_SESSION["userid"];
		$data_alteracao = date('Y-m-d H:i:s');
		$descricao = $_POST["descricao"];
		if (isset($_POST["ativo"])){
			$ativo = "on";
		} else {
			$ativo = "off";
		}
		$id = $_POST["id"];

		$query = "UPDATE `exames`
					SET `idarea` = ?, `nome` = ?, `descricao` = ?, `idusuario_alteracao` = ?, `data_alteracao` = ?, `ativo` = ?
					WHERE `id` = ?";
		if ($stmt = $mysqli->prepare($query)){
			$stmt->bind_param('ississi', $idarea, $nome, $descricao, $idusuario_alteracao, $data_alteracao, $ativo, $id);
			$stmt->execute();
			if ($stmt->affected_rows == 1){
				deleteExamesGenes();
			} else {
				header("location: ../index_admin.php?link=70&edit=0");
				die("");
			}

			$stmt->close();
		}
	}

	function deleteExamesGenes(){
		global $mysqli;
		$id = $_POST["id"];
		
		$query = "DELETE FROM `genes_exames`
					WHERE `idexame` = ?";
		if ($stmt = $mysqli->prepare($query)){
			$stmt->bind_param('i', $id);
			$stmt->execute();
		}
		
		if ($stmt->affected_rows > 0){
			insertExameGenes();
		} else {
			header("location: ../index_admin.php?link=70&edit=0");
			die("");
		}
		$stmt->close();
	}

	function insertExameGenes(){
		global $mysqli;
		$id = $_POST["id"];

		$query = "INSERT INTO `genes_exames`
					(`idexame`, `idgene`)
					VALUES ";

		$i = 0;
		if(!empty($_POST['geneslist'])) {
			foreach($_POST['geneslist'] as $idgene) {
				$i++;
				if ($i == 1){
				$query .= "(" . $id . "," . $idgene . ")";
				} else if ($i > 1){
					$query .= ", (" . $id . "," . $idgene . ")";
				}
			}
		}

		if ($stmt = $mysqli->prepare($query)){
			$stmt->execute();
		}
		if ($stmt->affected_rows > 0){
			header("location: ../index_admin.php?link=70&edit=1");
			die("");
		} else {
			header("location: ../index_admin.php?link=70&edit=0");
			die("");
		}
		$stmt->close();
	}

	$mysqli->close();
	
?>
