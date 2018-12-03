<?php
	session_start();
	if (!isset($_SESSION['userid'])){
		header("location: http://$_SERVER[HTTP_HOST]"."/cmg/admin/login.php");
		die("");
	}
	ini_set("allow_url_fopen", 1);
	$url = "http://$_SERVER[HTTP_HOST]"."/cmg/admin/dashboard/list.php";
	$json = json_decode(file_get_contents($url), true);
?>
<div class="text-center">
	<h2>DASHBOARD</h2>
</div>


<?php
	foreach ($json as $dashboard) {
?>
		<!-- JANELA DOS PATROCINADORES -->
			<div class="col-lg-3 col-md-6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-child fa-5x"></i>
							</div>
							<div class="col-xs-9 text-right">
								<div class="huge">
								<?php if ($_SESSION['userpatrocinadores'] == 1){ echo $dashboard['patrocinadores']; } ?>
								</div>
								<div>Patrocinadores</div>
							</div>
						</div>
					</div>
					<a href="index_admin.php?link=10">
						<div class="panel-footer">
							<span class="pull-left">Ver detalhes</span>
							<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
							<div class="clearfix"></div>
						</div>
					</a>
				</div>
			</div>
		<!-- JANELA DAS PUBLICACOES -->
			<div class="col-lg-3 col-md-6">
				<div class="panel panel-green">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-book fa-5x"></i>
							</div>
							<div class="col-xs-9 text-right">
								<div class="huge"><?php if ($_SESSION['userpublicacoes'] == 1){ echo $dashboard['publicacoes']; } ?></div>
								<div>Publicaçõess</div>
							</div>
						</div>
					</div>
					<a href="index_admin.php?link=40">
						<div class="panel-footer">
							<span class="pull-left">Ver detalhes</span>
							<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
							<div class="clearfix"></div>
						</div>
					</a>
				</div>
			</div>
			<!-- JANELA DOS VISITANTES-->
			<div class="col-lg-3 col-md-6">
				<div class="panel panel-yellow">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-users fa-5x"></i>
							</div>
							<div class="col-xs-9 text-right">
								<div class="huge">
									<?php if ($_SESSION['useradmin'] == 1){ echo $dashboard['visitors']; }?>
								</div>
								<div>Visitantes</div>
							</div>
						</div>
					</div>
					<a href="">
						<div class="panel-footer">
							<span class="pull-right"><i><br></i></span>
							<div class="clearfix"></div>
						</div>
					</a>
				</div>
			</div>
		<!-- JANELA DOS GENES ANALISADOS -->
			<div class="col-lg-3 col-md-6">
				<div class="panel panel-red">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-database fa-5x"></i>
							</div>
							<div class="col-xs-9 text-right">
								<div class="huge"><?php if ($_SESSION['usergenes'] == 1){ echo $dashboard['genes'];} ?> </div>
								<div>Genes Analisados</div>
							</div>
						</div>
					</div>
					<a href="index_admin.php?link=80">
						<div class="panel-footer">
							<span class="pull-left">Ver detalhes</span>
							<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
							<div class="clearfix"></div>
						</div>
					</a>
				</div>
		</div>      
		<hr>
		<div class="text-center">
			<h2> Bem vindo ao painel de administração!</h2>
			<h4> Utilize o menu para navegar entre as seções e adicione o conteúdo necessário.</h4>
		</div>

<?php
	/*	if ($_SESSION['useragenda'] == 1){
			echo '<a href="index_admin.php?link=50">';
			echo $dashboard['agenda'] . '<br/>';
			echo 'Agendas</a><br/><br/>';
		}

		if ($_SESSION['userareas'] == 1){
			echo '<a href="index_admin.php?link=60">';
			echo $dashboard['areas'] . '<br/>';
			echo 'Áreas</a><br/><br/>';
		}

		if ($_SESSION['userexames'] == 1){
			echo '<a href="index_admin.php?link=70">';
			echo $dashboard['exames'] . '<br/>';
			echo 'Exames</a><br/><br/>';
		}

		if ($_SESSION['useradmin'] == 1){
			echo '<a href="index_admin.php?link=90">';
			echo $dashboard['users'] . '<br/>';
			echo 'Usuários</a><br/><br/>';
		}
	*/	
	}
?>