<?php
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		session_start();
		if (!isset($_SESSION['userid'])){
			header("location: http://$_SERVER[HTTP_HOST]"."/cmg/admin/login.php");
			die("");
		} else if ($_SESSION['userexames'] != 1){
			header("location: ../index_admin.php?link=70&add=0");
			die("");
		}
		require ('../DbConnection.php');
		insertExames();
	} else {
		exit();
	}

	function insertExames(){
		global $mysqli;
		$idarea = $_POST["area"];
		$nome = $_POST["nome"];
		session_start();
		$idusuario_alteracao = $_SESSION['userid'];
		$data_alteracao = date('Y-m-d H:i:s');
		$descricao = $_POST["descricao"];
		if (isset($_POST["ativo"])){
			$ativo = "on";
		} else {
			$ativo = "off";
		}
		
		$query = "INSERT INTO `exames`
					(`idarea`, `nome`, `descricao`, `idusuario_alteracao`, `data_alteracao`, `ativo`)
					VALUES (?, ?, ?, ?, ?, ?)";
		if ($stmt = $mysqli->prepare($query)){
			$stmt->bind_param('ississ', $idarea, $nome, $descricao, $idusuario_alteracao, $data_alteracao, $ativo);
			$stmt->execute();
			$idexame = $mysqli->insert_id;
		}
		if ($stmt->affected_rows == 1){
			insertExameGenes($idexame);
		} else {
			header("location: ../index_admin.php?link=70&add=0");
			die("");
		}
		$stmt->close();
	}

	function insertExameGenes($idexame){
		global $mysqli;

		$query = "INSERT INTO `genes_exames`
					(`idexame`, `idgene`)
					VALUES ";

		$i = 0;
		if(!empty($_POST['geneslist'])) {
			foreach($_POST['geneslist'] as $idgene) {
				$i++;
				if ($i == 1){
				$query .= "(" . $idexame . "," . $idgene . ")";
				} else if ($i > 1){
					$query .= ", (" . $idexame . "," . $idgene . ")";
				}
			}
		}

		if ($stmt = $mysqli->prepare($query)){
			$stmt->execute();
		}
		if ($stmt->affected_rows > 0){
			header("location: ../index_admin.php?link=70&add=1");
			die("");
		} else {
			header("location: ../index_admin.php?link=70&add=0");
			die("");
		}
		$stmt->close();
	}

	$mysqli->close();
?>