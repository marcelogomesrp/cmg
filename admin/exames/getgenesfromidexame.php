<?php
	if($_SERVER["REQUEST_METHOD"]=="GET"){
		require ('../DbConnection.php');
		getGenesExames();
	} else {
		exit();
	}

	function getGenesExames(){
		global $mysqli;
		$id = $_GET['id'];

		$query = "SELECT G.id, G.nome, GE.idexame
					FROM
					(
						SELECT id, nome
						FROM genes
					) AS G
					LEFT OUTER JOIN
					(
						SELECT idgene, idexame
						FROM genes_exames
						WHERE idexame = ?
					) AS GE
					ON G.id = GE.idgene
					ORDER BY nome ASC";

		if ($stmt = $mysqli->prepare($query)){
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->store_result();
			$genes_exames = array();
			$stmt->bind_result($idgene, $nome, $idexame);
			while($stmt->fetch()){
				$genes_exames[]=array('idgene'=>$idgene, 'nome'=>$nome, 'idexame'=>$idexame);
			}
			$stmt->close();
		}
		$mysqli->close();

		header('Content-Type: application/json');
		echo json_encode($genes_exames);
	}
?>