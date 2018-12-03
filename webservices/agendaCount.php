<?php
	if($_SERVER["REQUEST_METHOD"]=="GET"){
		require ('DbConnection.php');
		getAgendas();
	} else {
		exit();
	}

	function getAgendas(){
		global $mysqli;

		$query = "SELECT count(id) as qtde
					FROM `agenda`
					WHERE `data` >= CURDATE() 
					ORDER BY `data` ASC";

		if ($stmt = $mysqli->prepare($query)){
			$stmt->execute();
			$stmt->store_result();
			$agendas = array();
			$stmt->bind_result($qtde);
			while($stmt->fetch()){
				$agendas[]=array('qtde'=>$qtde);
			}
			$stmt->close();
		}
		$mysqli->close();

		header('Content-Type: application/json');
		echo json_encode($agendas);
	}
?>