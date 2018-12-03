<?php
	if($_SERVER["REQUEST_METHOD"]=="GET"){
		require ('../DbConnection.php');
		getContatos();
	} else {
		exit();
	}

	function getContatos(){
		global $mysqli;

		$query = "SELECT id, setor, telefone1, telefone2, telefone3, email1, email2, email3
					FROM contatos
					ORDER BY id DESC";

		if ($stmt = $mysqli->prepare($query)){
			//$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->store_result();
			$contatos = array();
			$stmt->bind_result($id, $setor, $telefone1, $telefone2, $telefone3, $email1, $email2, $email3);
			while($stmt->fetch()){
				$contatos[]=array('id'=>$id, 'setor'=>$setor, 'telefone1'=>$telefone1, 'telefone2'=>$telefone2, 'telefone3'=>$telefone3, 'email1'=>$email1, 'email2'=>$email2, 'email3'=>$email3);
			}
			$stmt->close();
		}
		$mysqli->close();

		header('Content-Type: application/json');
		echo json_encode($contatos);
	}
?>