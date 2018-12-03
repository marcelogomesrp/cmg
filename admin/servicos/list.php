<?php
	if($_SERVER["REQUEST_METHOD"]=="GET"){
		require ('../DbConnection.php');
		getServicos();
	} else {
		exit();
	}

	function getServicos(){
		global $mysqli;

		$query = "SELECT id, missao, cadamostra, orientcoleta, servicos, institucional
					FROM servicos";

		if ($stmt = $mysqli->prepare($query)){
			//$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->store_result();
			$services = array();
			$stmt->bind_result($id, $missao, $cadamostra, $orientcoleta, $servicos, $institucional);
			while($stmt->fetch()){
				$services[]=array('id'=>$id, 'missao'=>$missao, 'cadamostra'=>$cadamostra, 'orientcoleta'=>$orientcoleta, 'servicos'=>$servicos, 'institucional'=>$institucional);
			}
			$stmt->close();
		}
		$mysqli->close();

		header('Content-Type: application/json');
		echo json_encode($services);
	}
?>