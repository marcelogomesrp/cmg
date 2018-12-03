<?php
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		session_start();
		if (!isset($_SESSION['userid'])){
			header("location: http://$_SERVER[HTTP_HOST]"."/cmg/admin/login.php");
			die("");
		} else if ($_SESSION['userservicos'] != 1){
			header("location: ../index_admin.php?link=20&add=0");
			die("");
		}
		require ('../DbConnection.php');
		insertServicos();
	} else {
		exit();
	}

	function insertServicos(){
		global $mysqli;
		$missao = $_POST["missao"];
		$cadamostra = $_POST["cadamostra"];
		$orientcoleta = $_POST["orientcoleta"];
		$servicos = $_POST["servicos"];
		$institucional = $_POST["institucional"];
		
		$query = "INSERT INTO `servicos`
					(`missao`, `cadamostra`, `orientcoleta`, `servicos`, `institucional`)
					VALUES (?, ?, ?, ?, ?)";
		if ($stmt = $mysqli->prepare($query)){
			$stmt->bind_param('sssss', $missao, $cadamostra, $orientcoleta, $servicos, $institucional);
			$stmt->execute();
		}
		if ($stmt->affected_rows == 1){
			header("location: ../index_admin.php?link=20&add=1");
			die("");
		} else {
			header("location: ../index_admin.php?link=20&add=0");
			die("");
		}
		$stmt->close();
	}

	$mysqli->close();
?>