<?php
	if($_SERVER["REQUEST_METHOD"]=="GET"){
		require ('../DbConnection.php');
		getGenes();
	} else {
		exit();
	}

	function getGenes(){
		global $mysqli;

		$query = "SELECT id, nome, link, idusuario_alteracao, data_alteracao
					FROM genes
					ORDER BY nome ASC";

		if ($stmt = $mysqli->prepare($query)){
			//$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->store_result();
			$genes = array();
			$stmt->bind_result($id, $nome, $link, $idusuario_alteracao, $data_alteracao);
			while($stmt->fetch()){
				$genes[]=array('id'=>$id, 'nome'=>$nome, 'link'=>$link, 'idusuario_alteracao'=>$idusuario_alteracao, 'data_alteracao'=>$data_alteracao);
			}
			$stmt->close();
		}
		$mysqli->close();

		header('Content-Type: application/json');
		echo json_encode($genes);
	}
?>