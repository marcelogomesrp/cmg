<?php
	if($_SERVER["REQUEST_METHOD"]=="GET"){
		require ('DbConnection.php');
		getAreas();
	} else {
		exit();
	}

	function getAreas(){
		global $mysqli;

		$query = "SELECT id, nome, descricao, imagem
					FROM areas
					WHERE ativo = 'on'
					ORDER BY nome ASC";

		if ($stmt = $mysqli->prepare($query)){
			$stmt->execute();
			$stmt->store_result();
			$areas = array();
			$stmt->bind_result($id, $nome, $descricao, $imagem);
			while($stmt->fetch()){
				$areas[]=array('id'=>$id, 'nome'=>$nome, 'descricao'=>$descricao, 'imagem'=>$imagem);
			}
			$stmt->close();
		}
		$mysqli->close();

		header('Content-Type: application/json');
		echo json_encode($areas);
	}
?>