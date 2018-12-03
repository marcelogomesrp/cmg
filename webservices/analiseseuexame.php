<?php
	if($_SERVER["REQUEST_METHOD"]=="GET"){
		require ('DbConnection.php');
		getAnaliseSeuExame();
	} else {
		exit();
	}

	function getAnaliseSeuExame(){
		global $mysqli;

		$query = "SELECT pedidoexame, documentos, solicitacaoservico, agendamentodeconsultoria
					FROM analiseseuexame";

		if ($stmt = $mysqli->prepare($query)){
			$stmt->execute();
			$stmt->store_result();
			$analiseseuexame = array();
			$stmt->bind_result($pedidoexame, $documentos, $solicitacaoservico, $agendamentodeconsultoria);
			$stmt->fetch();
			$analiseseuexame=array('pedidoexame'=>$pedidoexame, 'documentos'=>$documentos, 'solicitacaoservico'=>$solicitacaoservico, 'agendamentodeconsultoria'=>$agendamentodeconsultoria);
			$stmt->close();
		}
		$mysqli->close();

		header('Content-Type: application/json');
		echo json_encode($analiseseuexame);
	}
?>