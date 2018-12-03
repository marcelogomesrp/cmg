<?php
	if($_SERVER["REQUEST_METHOD"]=="GET"){
		require ('../DbConnection.php');
		getAreas();
	} else {
		exit();
	}

	function getAreas(){
		global $mysqli;

		$query = "SELECT id, nome, idusuario_alteracao, data_alteracao, descricao, ativo, imagem
					FROM areas
					ORDER BY nome ASC";

		if ($stmt = $mysqli->prepare($query)){
			//$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->store_result();
			$areas = array();
			$stmt->bind_result($id, $nome, $idusuario_alteracao, $data_alteracao, $descricao, $ativo, $imagem);
			while($stmt->fetch()){
				$areas[]=array('id'=>$id, 'nome'=>$nome, 'idusuario_alteracao'=>$idusuario_alteracao, 'data_alteracao'=>$data_alteracao, 'descricao'=>$descricao, 'ativo'=>$ativo, 'imagem'=>$imagem);
			}
			$stmt->close();
		}
		$mysqli->close();

		header('Content-Type: application/json');
		echo json_encode($areas);
	}
?>