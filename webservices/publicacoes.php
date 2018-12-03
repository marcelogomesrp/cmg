<?php
	if($_SERVER["REQUEST_METHOD"]=="GET"){
		require ('DbConnection.php');
		getPublicacoes();
	} else {
		exit();
	}

	function getPublicacoes(){
		global $mysqli;

		$query = "SELECT id, titulo, link, descricao, imagem
					FROM publicacoes
					ORDER BY id DESC
					LIMIT 0, 3";

		if ($stmt = $mysqli->prepare($query)){
			$stmt->execute();
			$stmt->store_result();
			$publicacoes = array();
			$stmt->bind_result($id, $titulo, $link, $descricao, $imagem);
			while($stmt->fetch()){
				$publicacoes[]=array('id'=>$id, 'titulo'=>$titulo, 'link'=>$link, 'descricao'=>$descricao, 'imagem'=>$imagem);
			}
			$stmt->close();
		}
		$mysqli->close();

		header('Content-Type: application/json');
		echo json_encode($publicacoes);
	}
?>