<?php
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		session_start();
		if (!isset($_SESSION['userid'])){
			header("location: http://$_SERVER[HTTP_HOST]"."/cmg/admin/login.php");
			die("");
		} else if ($_SESSION['usergenes'] != 1){
			header("location: ../index_admin.php?link=80&delete=0");
			die("");
		}
		require ('../DbConnection.php');
		deleteGenes();
	} else {
		exit();
	}

	function deleteGenes(){
		global $mysqli;
		$id = $_POST["id"];
		
		$query = "DELETE FROM `genes`
					WHERE `id` = ?";
		if ($stmt = $mysqli->prepare($query)){
			$stmt->bind_param('i', $id);
			$stmt->execute();
		}
		
		if ($stmt->affected_rows == 1){
			header("location: ../index_admin.php?link=80&delete=1");
			die("");
		} else {
			header("location: ../index_admin.php?link=80&delete=1");
			die("");
		}
		$stmt->close();
	}
	$mysqli->close();
?>