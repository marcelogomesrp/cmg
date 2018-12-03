<?php
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		session_start();
		if (!isset($_SESSION['userid'])){
			header("location: http://$_SERVER[HTTP_HOST]"."/cmg/admin/login.php");
			die("");
		} else if ($_SESSION['userareas'] != 1){
			header("location: ../index_admin.php?link=60&delete=0");
			die("");
		}
		require ('../DbConnection.php');
		deleteAreas();
	} else {
		exit();
	}

	function deleteAreas(){
		global $mysqli;
		$id = $_POST["id"];
		
		$query = "DELETE FROM `areas`
					WHERE `id` = ?";
		if ($stmt = $mysqli->prepare($query)){
			$stmt->bind_param('i', $id);
			$stmt->execute();
		}
		
		if ($stmt->affected_rows == 1){
			header("location: ../index_admin.php?link=60&delete=1");
			die("");
		} else {
			header("location: ../index_admin.php?link=60&delete=1");
			die("");
		}
		$stmt->close();
	}
	$mysqli->close();
?>