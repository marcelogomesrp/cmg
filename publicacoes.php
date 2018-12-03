
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="CMG - Laboratorio">
	<meta name="author" content="Diet Code App Studio">

	<title>CMG - Labs</title>
	<link rel="shortcut icon" type="image/x-icon" href="public/img/favicon.png">
	<!-- Bootstrap core CSS -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom fonts for this template -->
	<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

	<!-- Plugin CSS -->
	<link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="css/creative.min.css" rel="stylesheet">

	<!-- Temporary navbar container fix -->
	<style>
	.navbar-toggler {
		z-index: 1;
	}
	
	@media (max-width: 576px) {
		nav > .container {
			width: 100%;
		}
	}
	</style>

	<?php

		$urlPublicacoes = "http://$_SERVER[HTTP_HOST]"."/cmg/webservices/publicacoes-list.php";
		$jsonPublicacoes = json_decode(file_get_contents($urlPublicacoes), true);

	?>

</head>
<body id="page-top">
<!--     Navigation -->
		<nav class="navbar fixed-top navbar-toggleable-md navbar-light navbar-shrink " id="mainNav">
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarExample" aria-controls="navbarExample" aria-expanded="false" aria-label="Toggle navigation" style="margin:3%;">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="container">
				<a class="navbar-brand" href="#page-top">
					<img id="logo" class="logo_cinza img-responsive" style="max-width:110px; max-height:70px; width: auto; height: auto;" >
				</a>
			<div class="collapse navbar-collapse" id="navbarExample">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" id="pink" href="index.php">Voltar</a>
					</li>
				</ul>
			</div>
			</div>
		</nav>
	<section class="row carregarMore" style="margin-top:3%;">
		<div class="col-lg-12 text-center">
			<h2 class="section-heading">PUBLICAÇÕES</h2>
			<hr class="primary">
		</div>

		<?php
			$i = 1;
			foreach ($jsonPublicacoes as $publicacao){
				echo '<div class="col-lg-4 align-center">';
				//echo '<a class="del-style-link" href="#" data-toggle="modal" data-target="#modal_titulo';
				echo '<a class="del-style-link" href="' . $publicacao['link'] .'" data-toggle="modalD" data-target="#modal_titulo';
				echo $i;
				echo '">';
				$imgname = 'admin/publicacoes/imagens/'.$publicacao['imagem'].'_crop.jpg';
				echo '<img src="' . $imgname . '" class="col-lg-12 img-responsive">';
				echo '<p class="col-lg-12  text-justify" style="top:5px;">';
				echo $publicacao['titulo'];
				//echo 'marcelo';
				//echo $publicacao['link'];
				echo '</p></a></div>';
				$i++;
			}
		?>

		<!-- <div class="col-lg-4 align-center ">
			<a class="del-style-link" href="#" data-toggle="modal" data-target="#modal">
				<img src="" class="col-lg-12 img-responsive">
				<p class="col-lg-12  text-justify">titulo completo</p>
			</a>
		</div>
		<div class="col-lg-12 text-center">
			<a class="btn btn-primary" onclick="carregarMais()" role="button">carregar mais...</a>
		</div> -->
	</section>

	
	<!-- <input type="hidden" id="contador" value="6"> -->
	
	<script>
		function carregarMais(){
			var inicial = parseInt($("#contador").val());

			$("#contador").val(inicial+3);
			$.ajax({
			url: "publicacoesCarregarMais/"+inicial,
			method: "GET",
			cache: false,
			success: function(html){

				if (html != "")
				{
				$(".carregarMore").append(html);

				}
			}
			});   
		}
	</script>

		<?php
			$i = 1;
			foreach ($jsonPublicacoes as $publicacao){
				echo '<div class="modal fade" id="modal_titulo';
				echo $i;
				echo '" role="dialog" data-backdrop="static">';
				echo '<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div style="padding:10px;">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<div class="col-lg-12 text-center">';
				$imgname = 'admin/publicacoes/imagens/'.$publicacao['imagem'].'_crop.jpg';
				echo '<img src="' . $imgname . '" class="col-lg-12 img-responsive" style="padding-bottom:2%;">';
				echo '<h1 class="col-lg-12 text-justify">';
				echo $publicacao['titulo'];
				echo '</h1>';
				echo '<p class="col-lg-12 text-justify">';
				echo $publicacao['descricao'];
				echo '</p>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
							</div>
						</div>
					</div>
				</div>';
				$i++;
			}
		?>

		<!-- <div class="modal fade" id="modal" role="dialog">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div style="padding:10px;">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<div class="col-lg-12 text-center">
							<img src="publicacoes/.jpg" class="col-lg-12 img-responsive" style="padding-bottom:2%;">
							<h1 class="col-lg-12 text-justify">titulo</h1>
							<p class="col-lg-12 text-justify">descricao</p>
						</div>
					</div>
				<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				</div>
				</div>
			</div>
		</div> -->
		<footer class="container-fluid text-center bg-dark" style="botton:">
			<a href="#myPage" title="To Top">
				<span class="glyphicon glyphicon-chevron-up"></span>
			</a>
			<p>&copy; Copyright 2017 - <a href="http://www.google.com.br" title="Acesse Nosso Site">Diet Code</a> | Todos os direitos reservados.</p>
		</footer>
		<!-- Bootstrap core JavaScript -->
		<script src="vendor/jquery/jquery.min.js"></script>

		<script src="vendor/tether/tether.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<!-- Plugin JavaScript -->
		<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
		<script src="vendor/scrollreveal/scrollreveal.min.js"></script>
		<script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
		<!-- Custom scripts for this template -->
		<script src="js/creative.min.js"></script>
	
	
	
