<?php
	if($_SERVER["REQUEST_METHOD"]=="GET"){
		require ('../DbConnection.php');
		getPatrocinadores();
	} else {
		exit();
	}

	function getPatrocinadores(){
		global $mysqli;

		$query = "SELECT id, nome, link, imagem
					FROM patrocinadores
					ORDER BY nome ASC";

		if ($stmt = $mysqli->prepare($query)){
			//$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->store_result();
			$patrocinadores = array();
			$stmt->bind_result($id, $nome, $link, $imagem);
			while($stmt->fetch()){
				$patrocinadores[]=array('id'=>$id, 'nome'=>$nome, 'link'=>$link, 'imagem'=>$imagem);
			}
			$stmt->close();
		}
		$mysqli->close();

		header('Content-Type: application/json');
		echo json_encode($patrocinadores);
	}
?>