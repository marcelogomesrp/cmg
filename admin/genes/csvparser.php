<?php
	session_start();
	if (!isset($_SESSION['userid'])){
		header("location: http://$_SERVER[HTTP_HOST]"."/cmg/admin/login.php");
		die("");
	} else {
		require ('../DbConnection.php');
		readCSV();
	}

	function readCSV(){
		$url = "http://$_SERVER[HTTP_HOST]"."/cmg/admin/genes/csv/uploaded_file.txt";
		$csvstring = file_get_contents($url);

		session_start();
		$idusuario_alteracao = $_SESSION['userid'];
		$data_alteracao = date('Y-m-d H:i:s');

		$query = "INSERT INTO `genes`
					(`nome`, `link`, `idusuario_alteracao`, `data_alteracao`)
					VALUES ";

		$i = 0;
		// Parse the rows
		$data = str_getcsv($csvstring, "\n");
		foreach($data as &$row){
			$i++;
			// Parse the items in rows
			$row = str_getcsv($row, ";");
			if ($i == 2){
				$query .= "('" . $row[0] . "','" . $row[1] . "'," . $idusuario_alteracao . ",'" . $data_alteracao . "')";
			} else if ($i > 2){
				$query .= ", ('" . $row[0] . "','" . $row[1] . "'," . $idusuario_alteracao . ",'" . $data_alteracao . "')";
			}
		}
		
		insertData($query);
	}

	function insertData($query){
		global $mysqli;
		
		if ($stmt = $mysqli->prepare($query)){
			$stmt->execute();
		}
		if ($stmt->affected_rows > 1){
			header("location: ../index_admin.php?link=80&add=1");
			die("");
		} else {
			header("location: ../index_admin.php?link=80&add=0");
			die("");
		}
		$stmt->close();
	}

	$mysqli->close();

?>