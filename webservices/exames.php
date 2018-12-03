<?php
	if($_SERVER["REQUEST_METHOD"]=="GET"){
		require ('DbConnection.php');
		getExames();
	} else {
		exit();
	}

	function getExames(){
		global $mysqli;
		$id = $_GET["id"];

		$query = "SELECT exames.id, exames.idarea, areas.nome AS area, exames.nome AS nome, exames.descricao, exames.idusuario_alteracao, exames.data_alteracao, exames.ativo
					FROM exames
					LEFT OUTER JOIN areas ON areas.id = exames.idarea
					WHERE areas.id = ?
					ORDER BY areas.nome ASC, exames.nome ASC";

		if ($stmt = $mysqli->prepare($query)){
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->store_result();
			$exames = array();
			$stmt->bind_result($id, $idarea, $area, $nome, $descricao, $idusuario_alteracao, $data_alteracao, $ativo);
			while($stmt->fetch()){
				$exames[]=array('id'=>$id, 'idarea'=>$idarea, 'area'=>$area, 'nome'=>$nome, 'descricao'=>$descricao, 'idusuario_alteracao'=>$idusuario_alteracao, 'data_alteracao'=>$data_alteracao, 'ativo'=>$ativo);
			}
			$stmt->close();
		}
		$mysqli->close();

		header('Content-Type: application/json');
		echo json_encode($exames);
	}
?>