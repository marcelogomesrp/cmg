<?php
	if($_SERVER["REQUEST_METHOD"]=="GET"){
		require ('../DbConnection.php');
		getUsers();
	} else {
		exit();
	}

	function getUsers(){
		global $mysqli;

		$query = "SELECT id, name, email, admin, patrocinadores, servicos, analiseseuexame, publicacoes, agenda, areas, exames, genes, contatos
					FROM users
					INNER JOIN permissoes ON users.id = permissoes.userid
					ORDER BY name ASC";

		if ($stmt = $mysqli->prepare($query)){
			//$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->store_result();
			$users = array();
			$stmt->bind_result($id, $name, $email, $admin, $patrocinadores, $servicos, $analiseseuexame, $publicacoes, $agenda, $areas, $exames, $genes, $contatos);
			while($stmt->fetch()){
				$users[]=array('id'=>$id, 'name'=>$name, 'email'=>$email, 'admin'=>$admin, 'patrocinadores'=>$patrocinadores, 'servicos'=>$servicos, 'analiseseuexame'=>$analiseseuexame, 'publicacoes'=>$publicacoes, 'agenda'=>$agenda, 'areas'=>$areas, 'exames'=>$exames, 'genes'=>$genes, 'contatos'=>$contatos);
			}
			$stmt->close();
		}
		$mysqli->close();

		header('Content-Type: application/json');
		echo json_encode($users);
	}
?>