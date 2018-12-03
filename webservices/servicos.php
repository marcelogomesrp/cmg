<?php
	if($_SERVER["REQUEST_METHOD"]=="GET"){
		require ('DbConnection.php');
		getServicos();
	} else {
		exit();
	}

	function getServicos(){
		global $mysqli;

		$query = "SELECT missao, cadamostra, orientcoleta, servicos, institucional
					FROM servicos";

		if ($stmt = $mysqli->prepare($query)){
			$stmt->execute();
			$stmt->store_result();
			$services = array();
			$stmt->bind_result($missao, $cadamostra, $orientcoleta, $servicos, $institucional);
			$stmt->fetch();
			$services = array('missao'=>$missao, 'cadamostra'=>$cadamostra, 'orientcoleta'=>$orientcoleta, 'servicos'=>$servicos, 'institucional'=>$institucional);
			$stmt->close();
		}
		$mysqli->close();

		header('Content-Type: application/json');
		echo json_encode($services);
	}
?>
