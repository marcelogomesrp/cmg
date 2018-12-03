<?php
	if($_SERVER["REQUEST_METHOD"]=="GET"){
		require ('../DbConnection.php');
		getAgendas();
	} else {
		exit();
	}

	function getAgendas(){
		global $mysqli;

		$query = "SELECT `id`, `nome`, `descricao`, `data`
					FROM `agenda`
					ORDER BY `data` DESC";

		if ($stmt = $mysqli->prepare($query)){
			//$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->store_result();
			$agendas = array();
			$stmt->bind_result($id, $nome, $descricao, $data);
			while($stmt->fetch()){
				$agendas[]=array('id'=>$id, 'nome'=>$nome, 'descricao'=>$descricao, 'data'=>$data);
			}
			$stmt->close();
		}
		$mysqli->close();

		header('Content-Type: application/json');
		echo json_encode($agendas);
	}
?>