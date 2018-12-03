<!DOCTYPE html>
<html lang="PT-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title> CMG - LOGIN </title>
	<link rel="stylesheet" type="text/css" href="../css/app.css">
	<!-- Custom CSS -->
	<link href="../css/sb-admin-2.css" rel="stylesheet">
	<!-- Custom Fonts -->
	<link href="../css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-select.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-datepicker.css">
	<link rel="stylesheet" type="text/css" href="../css/common.css">
	<!-- jQuery -->
	<script src="../js/app.js"></script>
	<script src="../js/jquery.confirm.min.js"></script>
	<!-- Metis Menu Plugin JavaScript -->
	<script src="../js/metisMenu.min.js"></script>
	<!-- Custom Theme JavaScript -->
	<script src="../js/sb-admin-2.js"></script>
	<script src="../js/bootstrap-select.js"></script>
	<script src="../js/bootstrap-datepicker.min.js"></script>
	<script src="../locales/bootstrap-datepicker.pt-BR.min.js"></script>
	<link href="../css/summernote.css" rel="stylesheet">
	
	<script src="../js/summernote.min.js"></script>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

    
    <div class="container">
        <div class="row">
            <form class="form-signin col-lg-12" action="users/checklogin.php" method="post" >
                <h2 class="form-signin-heading text-center">Administrativo</h2>
                
                <label class="control-label" for="email">E-mail:</label>
                <input class="form-control" type="text" name="email">   
                
                <label class="control-label" for="password">Senha:</label>
                <input class="form-control" type="password" name="password">
                
                <br>
                <input class="btn btn-lg btn-primary btn-block" type="submit" value="Entrar">

            </form>
        </div>
        <div class="text-center alert-danger">
            <?php
                if(isset($_GET['s'])) {
                    if ($_GET['s'] == 0){
                        echo '<h2>E-mail ou senha incorretos</h2>';
                    }
                }
            ?>
        </div>
	</div>

</body>
</html>