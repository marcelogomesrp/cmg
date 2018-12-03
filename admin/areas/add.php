<?php
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		session_start();
		if (!isset($_SESSION['userid'])){
			header("location: http://$_SERVER[HTTP_HOST]"."/cmg/admin/login.php");
			die("");
		} else if ($_SESSION['userareas'] != 1){
			header("location: ../index_admin.php?link=60&add=0");
			die("");
		}
		require ('../DbConnection.php');
		if(!file_exists($_FILES['imagem']['tmp_name']) || !is_uploaded_file($_FILES['imagem']['tmp_name'])) {
			insertAreas("");
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

		resize_image($imgname);
	}

	function resize_image($imgname){
		$filename = 'imagens/'.$imgname.'.jpg';

		// Set a maximum height and width
		$width = 240;
		$height = 240;

		// Get new dimensions
		list($width_orig, $height_orig) = getimagesize($filename);

		if($width_orig < $width or $height_orig < $height){
			header("location: ../index_admin.php?link=60&add=2");
			die("");
		}
		$ratio = max($width/$width_orig, $height/$height_orig);

		// Rotate the original image
		if ($width > $width_orig){
			$y = ($height_orig - $height / $ratio) / 2;
			$height_orig = $height / $ratio;
			// Resample
			$image_p = imagecreatetruecolor($width, $height);
			$image = imagecreatefromjpeg($filename);
			imagecopyresampled($image_p, $image, 0, 0, 0, $y, $width, $height, $width_orig, $height_orig);
		}
		else if ($height > $height_orig){
			$x = ($width_orig - $width / $ratio) / 2;
			$width_orig = $width / $ratio;
			// Resample
			$image_p = imagecreatetruecolor($width, $height);
			$image = imagecreatefromjpeg($filename);
			imagecopyresampled($image_p, $image, 0, 0, $x, 0, $width, $height, $width_orig, $height_orig);
		} else {
			$x = ($width_orig - $width / $ratio) / 2;
			$y = ($height_orig - $height / $ratio) / 2;
			$width_orig = $width / $ratio;
			$height_orig = $height / $ratio;
			$image_p = imagecreatetruecolor($width, $height);
			$image = imagecreatefromjpeg($filename);
			imagecopyresampled($image_p, $image, 0, 0, $x, $y, $width, $height, $width_orig, $height_orig);
		}

		$exif = exif_read_data($_FILES['imagem']['tmp_name']);
		if (!empty($exif['Orientation'])) {
			switch($exif['Orientation'])
			{
				case 3:
					$image_p = imagerotate($image_p, 180, null);
				break;
				case 6:
					$image_p = imagerotate($image_p, 270, null);
				break;
				case 8:
					$image_p = imagerotate($image_p, 90, null);
				break;
			}
		}
		// Output
		imagejpeg($image_p, 'imagens/'.$imgname.'_crop.jpg', 100);
		insertAreas($imgname);
	}

	function insertAreas($imgname){
		global $mysqli;
		$nome = $_POST["nome"];
		session_start();
		$idusuario_alteracao = $_SESSION['userid'];
		$data_alteracao = date('Y-m-d H:i:s');
		$descricao = $_POST["descricao"];
		if (isset($_POST["ativo"])){
			$ativo = "on";
		} else {
			$ativo = "off";
		}
		
		$query = "INSERT INTO `areas`
					(`nome`, `idusuario_alteracao`, `data_alteracao`, `descricao`, `ativo`, `imagem`)
					VALUES (?, ?, ?, ?, ?, ?)";
		if ($stmt = $mysqli->prepare($query)){
			$stmt->bind_param('sissss', $nome, $idusuario_alteracao, $data_alteracao, $descricao, $ativo, $imgname);
			$stmt->execute();
		}
		if ($stmt->affected_rows == 1){
			header("location: ../index_admin.php?link=60&add=1");
			die("");
		} else {
			header("location: ../index_admin.php?link=60&add=0");
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