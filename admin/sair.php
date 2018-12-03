<?php
	session_start();
	session_unset();
	session_destroy();
	header("location: http://$_SERVER[HTTP_HOST]"."/cmg/admin/login.php");
	die("");
?>