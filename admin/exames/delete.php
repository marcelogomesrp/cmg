<?php
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		session_start();
		if (!isset($_SESSION['userid'])){
			header("location: http://$_SERVER[HTTP_HOST]"."/cmg/admin/login.php");
			die("");
		} else if ($_SESSION['userexames'] != 1){
			header("location: ../index_admin.php?link=70&delete=0");
			die("");
		}
		require ('../DbConnection.php');
		deleteExames();
	} else {
		exit();
	}

	function deleteExames(){
		global $mysqli;
		$id = $_POST["id"];
		
		$query = "DELETE FROM `exames`
					WHERE `id` = ?";
		if ($stmt = $mysqli->prepare($query)){
			$stmt->bind_param('i', $id);
			$stmt->execute();
		}
		
		if ($stmt->affected_rows == 1){
			deleteExamesGenes();
		} else {
			header("location: ../index_admin.php?link=70&delete=0");
			die("");
		}
		$stmt->close();
	}

	function deleteExamesGenes(){
		global $mysqli;
		$id = $_POST["id"];
		
		$query = "DELETE FROM `genes_exames`
					WHERE `idexame` = ?";
		if ($stmt = $mysqli->prepare($query)){
			$stmt->bind_param('i', $id);
			$stmt->execute();
		}
		
		if ($stmt->affected_rows > 0){
			header("location: ../index_admin.php?link=70&delete=1");
			die("");
		} else {
			header("location: ../index_admin.php?link=70&delete=0");
			die("");
		}
		$stmt->close();
	}

	$mysqli->close();
?>