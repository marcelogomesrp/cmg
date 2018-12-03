<?php
	if (isset($_FILES["file"])) {
		// if there was an error uploading the file
		if ($_FILES["file"]["error"] > 0) {
			echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
			header("location: ../index_admin.php?link=80&add=0");
			die("");
		}
		else {
			// Print file details
			echo "Upload: " . $_FILES["file"]["name"] . "<br />";
			echo "Type: " . $_FILES["file"]["type"] . "<br />";
			echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
			echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

			// if file already exists
			// if (file_exists("csv/" . $_FILES["file"]["name"])) {
			// 	echo $_FILES["file"]["name"] . " already exists. ";
			// }
			// else {
				// Store file in directory "upload" with the name of "uploaded_file.txt"
				$storagename = "uploaded_file.txt";
				move_uploaded_file($_FILES["file"]["tmp_name"], "csv/" . $storagename);
				echo "Stored in: " . "csv/" . $_FILES["file"]["name"] . "<br />";
				header("location: csvparser.php");
				die("");
			// }
		}
	} else {
		echo "No file selected <br />";
		header("location: ../index_admin.php?link=80&add=0");
		die("");
	}
?>