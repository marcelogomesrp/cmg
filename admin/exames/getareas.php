<?php
	if($_SERVER["REQUEST_METHOD"]=="GET"){
		require ('../DbConnection.php');
		getAreas();
	} else {
		exit();
	}

	function getAreas(){
		global $mysqli;

		//WHERE ativo = 'on'
		$query = "SELECT id, nome
					FROM areas
					ORDER BY nome ASC";

		if ($stmt = $mysqli->prepare($query)){
			$stmt->execute();
			$stmt->store_result();
			$areas = array();
			$stmt->bind_result($idarea, $nome);
			while($stmt->fetch()){
				$areas[]=array('idarea'=>$idarea, 'nome'=>$nome);
			}
			$stmt->close();
		}
		$mysqli->close();

		header('Content-Type: application/json');
		echo json_encode($areas);
	}
?>