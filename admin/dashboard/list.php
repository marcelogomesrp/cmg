<?php
	if($_SERVER["REQUEST_METHOD"]=="GET"){
		require ('../DbConnection.php');
		getDashboard();
	} else {
		exit();
	}

	function getDashboard(){
		global $mysqli;

		$query = "SELECT
					(SELECT COUNT(id) FROM agenda) as agenda,
					(SELECT COUNT(id) FROM areas) as areas,
					(SELECT COUNT(id) FROM exames) as exames,
					(SELECT COUNT(id) FROM genes) as genes,
					(SELECT COUNT(id) FROM patrocinadores) as patrocinadores,
					(SELECT COUNT(id) FROM publicacoes) as publicacoes,
					(SELECT COUNT(id) FROM visitors) as visitors,
					(SELECT COUNT(id) FROM users) as users";

		if ($stmt = $mysqli->prepare($query)){
			$stmt->execute();
			$stmt->store_result();
			$dashboard = array();
			$stmt->bind_result($agenda, $areas, $exames, $genes, $patrocinadores, $publicacoes, $visitors, $users);
			while($stmt->fetch()){
				$dashboard[]=array('agenda'=>$agenda, 'areas'=>$areas, 'exames'=>$exames, 'genes'=>$genes, 'patrocinadores'=>$patrocinadores, 'publicacoes'=>$publicacoes, 'visitors'=>$visitors, 'users'=>$users);
			}
			$stmt->close();
		}
		$mysqli->close();

		header('Content-Type: application/json');
		echo json_encode($dashboard);
	}
?>