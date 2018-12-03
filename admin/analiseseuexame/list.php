<?php
	if($_SERVER["REQUEST_METHOD"]=="GET"){
		require ('../DbConnection.php');
		getAnaliseSeuExame();
	} else {
		exit();
	}

	function getAnaliseSeuExame(){
		global $mysqli;

		$query = "SELECT id, pedidoexame, documentos, solicitacaoservico, agendamentodeconsultoria
					FROM analiseseuexame
					ORDER BY id DESC";

		if ($stmt = $mysqli->prepare($query)){
			//$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->store_result();
			$analiseseuexame = array();
			$stmt->bind_result($id, $pedidoexame, $documentos, $solicitacaoservico, $agendamentodeconsultoria);
			while($stmt->fetch()){
				$analiseseuexame[]=array('id'=>$id, 'pedidoexame'=>$pedidoexame, 'documentos'=>$documentos, 'solicitacaoservico'=>$solicitacaoservico, 'agendamentodeconsultoria'=>$agendamentodeconsultoria);
			}
			$stmt->close();
		}
		$mysqli->close();

		header('Content-Type: application/json');
		echo json_encode($analiseseuexame);
	}
?>