<?php
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		session_start();
		if (!isset($_SESSION['userid'])){
			header("location: http://$_SERVER[HTTP_HOST]"."/cmg/admin/login.php");
			die("");
		} else if ($_SESSION['useradmin'] != 1){
			header("location: ../index_admin.php?link=90&delete=0");
			die("");
		}
		require ('../DbConnection.php');
		deleteUsers();
	} else {
		exit();
	}

	function deleteUsers(){
		global $mysqli;
		$id = $_POST["id"];
		
		$query = "DELETE FROM `users`
					WHERE `id` = ?";
		if ($stmt = $mysqli->prepare($query)){
			$stmt->bind_param('i', $id);
			$stmt->execute();
		}
		
		if ($stmt->affected_rows == 1){
			deletePermissions();
		} else {
			header("location: ../index_admin.php?link=90&delete=0");
			die("");
		}
		$stmt->close();
	}

	function deletePermissions(){
		global $mysqli;
		$id = $_POST["id"];
		
		$query = "DELETE FROM `permissoes`
					WHERE `userid` = ?";
		if ($stmt = $mysqli->prepare($query)){
			$stmt->bind_param('i', $id);
			$stmt->execute();
		}
		
		if ($stmt->affected_rows == 1){
			header("location: ../index_admin.php?link=90&delete=1");
			die("");
		} else {
			header("location: ../index_admin.php?link=90&delete=0");
			die("");
		}
		$stmt->close();
	}

	$mysqli->close();
?>