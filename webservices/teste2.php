<?php


require ('DbConnection.php');



		global $mysqli;

		$query = "SELECT missao, cadamostra, orientcoleta, servicos, institucional
					FROM servicos";

#$mysqli->set_charset("utf8");

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
?>
