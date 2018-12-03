<?php
	if($_SERVER["REQUEST_METHOD"]=="GET"){
		require ('DbConnection.php');
		getAgendas();
	} else {
		exit();
	}

	function getAgendas(){
		global $mysqli;
		$page = $_GET['p'];
		$page = $page * 3;
		$page2 = 3;

		$query = "SELECT `nome`, `descricao`, `data`
					FROM `agenda`
					WHERE `data` >= CURDATE() 
					ORDER BY `data` ASC
					LIMIT $page, $page2";

		if ($stmt = $mysqli->prepare($query)){
			$stmt->execute();
			$stmt->store_result();
			$agendas = array();
			$stmt->bind_result($nome, $descricao, $data);
			while($stmt->fetch()){
				$agendas[]=array('nome'=>$nome, 'descricao'=>$descricao, 'data'=>$data);
			}
			$stmt->close();
		}
		$mysqli->close();

		header('Content-Type: application/json');
		echo json_encode($agendas);
	}
?>