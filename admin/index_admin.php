<!DOCTYPE html>
<html lang="PT-br">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title> CMG </title>
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

	<?php
		require 'users/checksession.php';
	?>

</head>

	<body>
		   <div id="wrapper">
		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="admin/index.php">CMG - Administração</a>
			</div>
			<!-- /.navbar-header -->
			<ul class="nav navbar-top-links navbar-right">
				<!-- /.dropdown -->
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-user">
						<li><a href="index_admin.php?link=3"><i class="fa fa-user fa-fw"></i> Painel Usuário</a>
						</li>

						<li class="divider"></li>
						<li>

								<a href="sair.php"
									onclick="event.preventDefault();
											 document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i> Sair</a>


							<form id="logout-form" action="sair.php" method="POST" style="display: none;">
								{{ csrf_field() }}
							</form>
						</li>
					</ul>
					<!-- /.dropdown-user -->
				</li>
				<!-- /.dropdown -->
			</ul>
			<!-- /.navbar-top-links -->

			<div class="navbar-default sidebar" role="navigation">
				<div class="sidebar-nav navbar-collapse">
					<ul class="nav" id="side-menu">

						<li>
							<a href="index_admin.php?link=2"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
						</li>

						<?php
							if ($_SESSION['userpatrocinadores'] == 1){
								echo '<li>
									<a href="index_admin.php?link=10"><i class="fa fa-child fa-fw"></i> Patrocinadores</a>
									</li>';
							}
						?>

						<?php
							if ($_SESSION['userservicos'] == 1){
								echo '<li>
									<a href="index_admin.php?link=20"><i class="fa fa-location-arrow fa-fw"></i> Serviços</a>
									</li>';
							}
						?>

						<?php
							if ($_SESSION['useranaliseseuexame'] == 1){
								echo '<li>
									<a href="index_admin.php?link=30"><i class="fa fa-file-pdf-o fa-fw"></i> Analise seu Exame</a>
									</li>';
							}
						?>

						<?php
							if ($_SESSION['userpublicacoes'] == 1){
								echo '<li>
									<a href="index_admin.php?link=40"><i class="fa fa-newspaper-o"></i> Publicações</a>
									</li>';
							}
						?>

						<?php
							if ($_SESSION['useragenda'] == 1){
								echo '<li>
									<a href="index_admin.php?link=50"><i class="fa fa-calendar fa-fw"></i> Agenda</a>
									</li>';
							}
						?>

						<?php
							if ($_SESSION['userareas'] == 1){
								echo '<li>
									<a href="index_admin.php?link=60"><i class="fa fa-table fa-fw"></i> Áreas</a>
									</li>';
							}
						?>

						<?php
							if ($_SESSION['userexames'] == 1){
								echo '<li>
									<a href="index_admin.php?link=70"><i class="fa fa-edit fa-fw"></i> Exames</a>
									</li>';
							}
						?>

						<?php
							if ($_SESSION['usergenes'] == 1){
								echo '<li>
									<a href="index_admin.php?link=80"><i class="fa fa-database fa-fw"></i> Genes Analisados</a>
									</li>';
							}
						?>

						<?php
							if ($_SESSION['usercontatos'] == 1){
								echo '<li>
									<a href="index_admin.php?link=100"><i class="fa fa-users fa-fw"></i> Contatos</a>
									</li>';
							}
						?>

						<?php
							if ($_SESSION['useradmin'] == 1){
								echo '<li>
									<a href="index_admin.php?link=90"><i class="fa fa-users fa-fw"></i> Usuários</a>
									</li>';
							}
						?>

					</ul>
				</div>
				<!-- /.sidebar-collapse -->
			</div>

			<!-- /.navbar-static-side -->
		</nav>
		<!-- /#page-wrapper -->
		<div id="page-wrapper">
			<div class="container-fluid">
				<?php 
					include_once('main.php');
				?>
			</div>
		</div>
	</div>


	</body>

	<script type="text/javascript">
		$('#datepicker').datepicker({
			//formato da data
			format: 'dd/mm/yyyy',
			//idioma da data
			language: "pt-BR",
			//proxima linha nega a escolha de dias anteriores, somentes datas futuras
			startDate: '+0d',
		
	});
	</script>


</html>

<script>
$(document).on('click', '.panel-heading span.clickable', function(e){
	var $this = $(this);
	if(!$this.hasClass('panel-collapsed')) {
		$this.parents('.panel').find('.panel-body').slideUp();
		$this.addClass('panel-collapsed');
		$this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
	} else {
		$this.parents('.panel').find('.panel-body').slideDown();
		$this.removeClass('panel-collapsed');
		$this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
	}
})

$(".confirm_delete").confirm(
		{
			text: "Deseja realmente apagar?",
			title: "ATENÇÃO",
			confirmButton: "QUERO APAGAR",
			cancelButton: "Não",
			post: false,
			confirmButtonClass: "btn-danger",
			cancelButtonClass: "btn-default",
			dialogClass: "modal-dialog modal-sm" // Bootstrap classes for large modal
		}
);

$('.summernote').summernote({
	  height: 300,                 // set editor height
	  minHeight: null,             // set minimum height of editor
	  maxHeight: null,             // set maximum height of editor
	  focus: true                  // set focus to editable area after initializing summernote
	});
</script>
