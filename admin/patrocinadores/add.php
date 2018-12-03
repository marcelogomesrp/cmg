<?php
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		session_start();
		if (!isset($_SESSION['userid'])){
			header("location: http://$_SERVER[HTTP_HOST]"."/cmg/admin/login.php");
			die("");
		} else if ($_SESSION['userpatrocinadores'] != 1){
			header("location: ../index_admin.php?link=10&add=0");
			die("");
		}
		require ('../DbConnection.php');
		if(!file_exists($_FILES['imagem']['tmp_name']) || !is_uploaded_file($_FILES['imagem']['tmp_name'])) {
			insertPatrocinadores("");
		} else{
			data_uri($_FILES['imagem']['tmp_name'],'image/jpg');
		}
	} else {
		exit();
	}

	function data_uri($file, $mime)
	{
		$contents = file_get_contents($file);
		$base64 = base64_encode($contents);
		$imgString = 'data:' . $mime . ';base64,' . $base64;
		$data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imgString));
		$imgname = 'img_'.generateRandomString(12);
		$h = fopen('imagens/'.$imgname.'.jpg', 'w');
		fwrite($h, $data);
		fclose($h);

		insertPatrocinadores($imgname);
	}

	function insertPatrocinadores($imgname){
		global $mysqli;
		$nome = $_POST["nome"];
		$link = $_POST["link"];
		
		$query = "INSERT INTO `patrocinadores`
					(`nome`, `link`, `imagem`)
					VALUES (?, ?, ?)";
		if ($stmt = $mysqli->prepare($query)){
			$stmt->bind_param('sss', $nome, $link, $imgname);
			$stmt->execute();
		}
		if ($stmt->affected_rows == 1){
			header("location: ../index_admin.php?link=10&add=1");
			die("");
		} else {
			header("location: ../index_admin.php?link=10&add=0");
			die("");
		}
		$stmt->close();
	}

	function generateRandomString($length) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	$mysqli->close();
?>