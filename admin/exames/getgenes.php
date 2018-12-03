<?php
	if($_SERVER["REQUEST_METHOD"]=="GET"){
		require ('../DbConnection.php');
		getGenes();
	} else {
		exit();
	}

	function getGenes(){
		global $mysqli;

		$query = "SELECT id, nome
					FROM genes
					ORDER BY nome ASC";

		if ($stmt = $mysqli->prepare($query)){
			$stmt->execute();
			$stmt->store_result();
			$genes = array();
			$stmt->bind_result($idgene, $nome);
			while($stmt->fetch()){
				$genes[]=array('idgene'=>$idgene, 'nome'=>$nome);
			}
			$stmt->close();
		}
		$mysqli->close();

		header('Content-Type: application/json');
		echo json_encode($genes);
	}
?>