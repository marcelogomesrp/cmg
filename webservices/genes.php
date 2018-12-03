<?php
	if($_SERVER["REQUEST_METHOD"]=="GET"){
		require ('DbConnection.php');
		getExamesGenes();
	} else {
		exit();
	}

	function getExamesGenes(){
		global $mysqli;
		$id = $_GET["id"];

		$query = "SELECT genes.id, genes.nome, genes.link
					FROM genes_exames
					INNER JOIN genes ON genes_exames.idgene = genes.id
					WHERE genes_exames.idexame = ?
					ORDER BY genes.nome ASC";

		if ($stmt = $mysqli->prepare($query)){
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->store_result();
			$genes_exames = array();
			$stmt->bind_result($id, $nome, $link);
			while($stmt->fetch()){
				$genes_exames[]=array('id'=>$id, 'nome'=>$nome, 'link'=>$link);
			}
			$stmt->close();
		}
		$mysqli->close();

		header('Content-Type: application/json');
		echo json_encode($genes_exames);
	}
?>