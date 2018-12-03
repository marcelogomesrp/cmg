<!DOCTYPE html>
<html lang="pt-br">
   <?php
      ini_set("allow_url_fopen", 1);
      
      $urlServicos = "http://$_SERVER[HTTP_HOST]"."/cmg/webservices/servicos.php";
      $jsonServicos = json_decode(file_get_contents($urlServicos), true);
      
      $urlAnaliseSeuExame = "http://$_SERVER[HTTP_HOST]"."/cmg/webservices/analiseseuexame.php";
      $jsonAnaliseSeuExame = json_decode(file_get_contents($urlAnaliseSeuExame), true);
      
      $urlAgenda = "http://$_SERVER[HTTP_HOST]"."/cmg/webservices/agenda.php";
      $jsonAgenda = json_decode(file_get_contents($urlAgenda), true);
      
      $urlAgendaCount = "http://$_SERVER[HTTP_HOST]"."/cmg/webservices/agendaCount.php";
      $jsonAgendaCount = json_decode(file_get_contents($urlAgendaCount), true);
      
      $urlPublicacoes = "http://$_SERVER[HTTP_HOST]"."/cmg/webservices/publicacoes.php";
      $jsonPublicacoes = json_decode(file_get_contents($urlPublicacoes), true);
      
      $urlAreas = "http://$_SERVER[HTTP_HOST]"."/cmg/webservices/areas.php";
      $jsonAreas = json_decode(file_get_contents($urlAreas), true);
      
      $urlPatrocinadores = "http://$_SERVER[HTTP_HOST]"."/cmg/webservices/patrocinadores.php";
      $jsonPatrocinadores = json_decode(file_get_contents($urlPatrocinadores), true);
      
      $urlContatos = "http://$_SERVER[HTTP_HOST]"."/cmg/webservices/contatos.php";
      $jsonContatos = json_decode(file_get_contents($urlContatos), true);
      
      ?>
   <head>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>    
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="CMG - Laboratorio">
      <meta name="author" content="Diet Code">
      <title>CMG - Labs</title>
	  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
	  
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
		
      <!-- Custom fonts for this template -->
      <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
      <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
      <!-- Plugin CSS -->
      <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">
      <!-- Custom styles for this template -->
    	<link href="css/creative.min.css" rel="stylesheet">
	  <link href="css/cmg.css" rel="stylesheet">
	  
	  
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
         .mySlides {display:none}
         .cmg-left, .cmg-right, .cmg-badge {cursor:pointer}
         .cmg-badge {height:13px;width:13px;padding:0}
      </style>
   </head>
   <body id="page-top">
      <script type="text/javascript">
         function pagina(page){
         	$.getJSON('webservices/agenda.php?p='+page, function(data) {
         		var html = "";
         		for (i = 0 ; i < data.length; i++){
         			html += '<button class="accordion"><strong>';
         			html += data[i]['nome'];
         			html += '</strong> - ';
         			var d = data[i]['data'].split("-");
         			html += d[2] + "/" + d[1] + "/" + d[0];
         			html += ' <span>USP Ribeirão Preto</span></button>';
         			html += '<div class="panel"><p>';
         			html += data[i]['descricao'];
         			html += '</p></div>';
         		}
         		document.getElementById('agendaConteudo').innerHTML = html;
         		var acc = document.getElementsByClassName("accordion");
         		var i;
         		for (i = 0; i < acc.length; i++) {
         			acc[i].onclick = function(){
         				this.classList.toggle("active");
         				var panel = this.nextElementSibling;
         				if (panel.style.display === "block") {
         					panel.style.display = "none";
         				} else {
         					panel.style.display = "block";
         				}
         			}
         		}
         		var pg = document.getElementsByClassName("pag-bordered");
         		for (j = 0; j < acc.length; j++) {
         			i = j + 1;
         			if (j == page){
         				pg[j].innerHTML = "<span class='active'>" + i + "</span>";
         			} else {
         				pg[j].innerHTML = "<span>" + i + "</span>";
         			}
         		}
         	});
         }
      </script>
      <!-- Navigation -->
      <nav class="navbar fixed-top navbar-toggleable-md navbar-light navbar-shrink " id="mainNav">
         <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarExample" aria-controls="navbarExample" aria-expanded="false" aria-label="Toggle navigation" style="margin:3%;">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="container" id="top">
            <a class="navbar-brand" href="#page-top">
            <img id="logo" src="img/icone.png" class="logo_cinza mini_logo " >
            </a>
            <div class="collapse navbar-collapse" id="navbarExample">
               <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                     <a class="nav-link scroll " id="pink" href="#services">Serviços</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link  scroll" id="blue" href="#portfolio">Exames</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link scroll " id="yellow" href="#agenda">Agenda</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link scroll" id="green" href="#publications">Publicações</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link scroll " id="violet" href="#contact">Contato</a>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
<!--
	<header class="masthead container-fluid">
                  <img src="img/logo_cmg.png" class="logo-edit"> 
      </header>
-->
<!-- <div class="container-fluid" style="min-height: 600px"> -->
<div class="container-fluid" >
<div class="row">
<!--	<div class="col-md-6"> -->
<!--	<img src="img/logo_cmg.png" class="img-fluid"> 
	logo
	</div> -->

	<div class="col-md-4">
	<img src="img/logoM1.jpg" class="img-fluid"> 
	</div>
	<div class="col-md-8">
	<img class="img-fluid"  src="img/headerM1.jpg"> 
	
	</div>
</div>
	<!--
<div class="d-lg-none">
valor A</div>
<div class="d-none d-lg-block">
<img src="img/logo_cmg.png" class="logo-edit">
Valor B</div>
-->
</div>

      <section id="services" style="border-bottom: 1px solid #DDDDDD; background-color: #eee; margin-top: 20px;" class="bg-gray">
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-2 col-md-6 text-center">
                  <div class="service-box">
                     <a class="del-style-link fa fa-3x fa-building text-primary sr-icons" href="#" data-toggle="modal" data-target="#modalInstitucional">
                        <h4 class="margin-space">Institucional</h4>
                     </a>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 text-center">
                  <div class="service-box">
                     <a class="del-style-link fa fa-3x fa-users text-primary sr-icons" href="#" data-toggle="modal" data-target="#modalMissao">
                        <h4 class="margin-space">Missão</h4>
                     </a>
                  </div>
               </div>
               <div class="col-lg-2 col-md-6 text-center">
                  <div class="service-box">
                     <a class="del-style-link fa fa-3x fa-paper-plane text-primary sr-icons" href="#" data-toggle="modal" data-target="#modalInfo">
                        <h4 class="margin-space">Cadastro de Amostra</h4>
                     </a>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 text-center">
                  <div class="service-box">
                     <a class="del-style-link fa fa-3x fa-newspaper-o text-primary sr-icons" href="#" data-toggle="modal" data-target="#modalOrientacao">
                        <h4 class="margin-space">Orientação de Coleta</h4>
                     </a>
                  </div>
               </div>
               <div class="col-lg-2 col-md-6 text-center">
                  <div class="service-box">
                     <a class="del-style-link fa fa-3x fa-medkit text-primary sr-icons" href="#" data-toggle="modal" data-target="#modalServico">
                        <h4 class="margin-space">Serviços</h4>
                     </a>
                  </div>
               </div>
               <!--###### MODAL INSTITUCIONAL ######## -->
               <div class="modal fade" id="modalInstitucional" role="dialog" data-backdrop="static">
                  <div class="modal-dialog modal-lg">
                     <!-- Modal content-->
                     <div class="modal-content">
                        <div class="modal-header">
                           <h4 class="modal-title">Institucional</h4>
                           <button type="button" class="close" data-dismiss="modal" onClick="">&times;</button>
                        </div>
                        <div class="modal-body">
                           <div class="text-justify">
                              <?php
                                 echo $jsonServicos['institucional']
                                 ?>
                           </div>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-default" data-dismiss="modal" onClick="">Fechar</button>
                        </div>
                     </div>
                  </div>
               </div>
               <!--                #####MODAL MISSAO -->
               <div class="modal fade" id="modalMissao" role="dialog" data-backdrop="static">
                  <div class="modal-dialog modal-lg">
                     <!-- Modal content-->
                     <div class="modal-content">
                        <div class="modal-header">
                           <h4 class="modal-title">Missão</h4>
                           <button type="button" class="close" data-dismiss="modal" onClick="">&times;</button>
                        </div>
                        <div class="modal-body">
                           <p class="text-justify">
                              <?php
                                 echo $jsonServicos['missao']
                                 ?>
                           </p>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-default" data-dismiss="modal" onClick="">Fechar</button>
                        </div>
                     </div>
                  </div>
               </div>
               <!--##### MODAL CADASTRO DE AMOSTRA ######## -->
               <div class="modal fade" id="modalInfo" role="dialog" data-backdrop="static">
                  <div class="modal-dialog modal-lg">
                     <!-- Modal content-->
                     <div class="modal-content">
                        <div class="modal-header">
                           <h4 class="modal-title">Cadastro de Amostras</h4>
                           <button type="button" class="close" data-dismiss="modal" onClick="">&times;</button>
                        </div>
                        <div class="modal-body">
                           <p class="text-justify">
                              <?php
                                 echo $jsonServicos['cadamostra']
                                 ?>
                           </p>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-default" data-dismiss="modal" onClick="">Fechar</button>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- #####MODAL ORIENTACAO ############ -->
               <div class="modal fade" id="modalOrientacao" role="dialog" data-backdrop="static">
                  <div class="modal-dialog modal-lg">
                     <!-- Modal content-->
                     <div class="modal-content">
                        <div class="modal-header">
                           <h4 class="modal-title">Orientação de Coleta</h4>
                           <button type="button" class="close" data-dismiss="modal" onClick="">&times;</button>
                        </div>
                        <div class="modal-body">
                           <p class="text-justify">
                              <?php
                                 echo $jsonServicos['orientcoleta']
                                 ?>
                           </p>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-default" data-dismiss="modal" onClick="">Fechar</button>
                        </div>
                     </div>
                  </div>
               </div>
               <!--#####MODAL SERVICOS ######## -->
               <div class="modal fade" id="modalServico" role="dialog" data-backdrop="static">
                  <div class="modal-dialog modal-lg">
                     <!-- Modal content-->
                     <div class="modal-content">
                        <div class="modal-header">
                           <h4 class="modal-title">Serviços</h4>
                           <button type="button" class="close" data-dismiss="modal" onClick="">&times;</button>
                        </div>
                        <div class="modal-body">
                           <p class="text-justify">
                              <?php
                                 echo $jsonServicos['servicos']
                                 ?>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-default" data-dismiss="modal" onClick="">Fechar</button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="" id="portfolio">
         <div class="container-fluid text-center bg-gray">
            <div class="row">           
               <?php
                  foreach ($jsonAreas as $area){
                  	echo '<div class="col-lg-4">
                  	<a class="" href="#" data-toggle="modal" data-target="#modal_area_'.$area['id'].'" >';
                  	echo '<img src="admin/areas/imagens/';
                  	echo $area['imagem'];
                  	echo '_crop.jpg" class="img-circle" width="240" height="240">';
                  	echo '<h2 class="margin-space">';
                  	echo $area['nome'];
                  	echo '</h2></a></div>';
                  }
                  ?>
            </div>
         </div>
      </section>
      <?php
         foreach ($jsonAreas as $area){
         	echo '<div class="modal fade" id="modal_area_'.$area['id'].'" role="dialog" data-backdrop="static">';
         	echo '<div class="modal-dialog modal-lg">
         		<!-- Modal content-->
         			<div class="modal-content">
         				<div class="modal-header">
         					<h4 class="modal-title">';
         	echo $area['nome'];
         	echo '</h4>
         			<button type="button" class="close" data-dismiss="modal" onClick="">&times;</button>
         		</div>
         		<div class="modal-body">';
         
         		$urlExames = "http://$_SERVER[HTTP_HOST]"."/cmg/webservices/exames.php?id=".$area['id'];
         		$jsonExames = json_decode(file_get_contents($urlExames), true);
         		foreach ($jsonExames as $exame){
         			echo '<button class="accordion"><strong>';
         			echo $exame['nome'];
         			echo '</strong></button>
         			<div class="panel">
         				<p class="text-justify">';
         			echo $exame['descricao'];
         			echo '<br><br><a><strong><u>Genes Analisados</u></strong></a><br><br>';
         			$urlGenesExames = "http://$_SERVER[HTTP_HOST]"."/cmg/webservices/genes.php?id=".$exame['id'];
         			$jsonGenesExames = json_decode(file_get_contents($urlGenesExames), true);
         			foreach ($jsonGenesExames as $gene) {
         				echo '<a href="' . $gene['link'] . '">' . $gene['nome'] . '</a> ';
         			}
         			echo '<br><br><a href="#" class="del-style-link btn-exam"><strong>Pedir este Exame</strong></a>
         				</p>
         			</div>';
         		}
         		echo '</div>
         		<div class="modal-footer">
         			<button type="button" class="btn btn-default" data-dismiss="modal" onClick="">Fechar</button>
         		</div>
         	</div>
         </div>
         </div>';
         }
         ?>
      <section id="exames" class="call-to-action bg-dark">
         <div class="container">
            <div class="row">
               <div class="col-lg-3 col-md-6 text-center">
                  <div class="service-box">
                     <a class="del-style-link" href=<?php echo $jsonAnaliseSeuExame['pedidoexame'] ?>>
                        <i class="fa fa-3x fa-file-pdf-o text-primary sr-icons"></i>
                        <p class="margin-space text-white">Pedido de Exame Externo</p>
                     </a>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 text-center">
                  <div class="service-box">
                     <a class="del-style-link" href=<?php echo $jsonAnaliseSeuExame['documentos'] ?>>
                        <i class="fa fa-3x fa-file-pdf-o text-primary sr-icons"></i>
                        <p class="margin-space text-white">Documentos</p>
                     </a>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 text-center">
                  <div class="service-box">
                     <a class="del-style-link" href=<?php echo $jsonAnaliseSeuExame['solicitacaoservico'] ?>>
                        <i class="fa fa-3x fa-newspaper-o text-primary sr-icons"></i>
                        <p class="margin-space text-white">Serviço de Análise Genômica</p>
                     </a>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 text-center">
                  <div class="service-box text-white">
                     <a class="del-style-link" href=<?php echo $jsonAnaliseSeuExame['agendamentodeconsultoria'] ?>>
                        <i class="fa fa-3x fa-address-book-o text-primary sr-icons text-white"></i>
                        <p class="margin-space text-white">Consultoria</p>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="bg-white" id="agenda">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 text-center">
                  <h2 class="section-heading text-primary">NOSSA AGENDA</h2>
               </div>
               <div class="col-lg-10 area-agenda" id="agendaConteudo">
                  <?php
                     foreach ($jsonAgenda as $agenda){
                     	echo '<button class="accordion text-left"><strong>';
                     	echo $agenda['nome'];
                     	echo '</strong> - ';
                     	$date = new DateTime($agenda["data"]);
                     	echo $date->format('d/m/Y');
                     	echo ' <span>USP Ribeirão Preto</span></button><div class="panel"><p>';
                     	echo $agenda['descricao'];
                     	echo '</p></div>';
                     }
                     ?>
               </div>
            </div>
         </div>
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-4"></div>
               <div class="col-lg-4">
                  <div class="paginacao">
                     <a onclick="pagina(0)" class="pag-bordered"><span class="active">1</span></a>
                     <?php
                        foreach ($jsonAgendaCount as $agendaCount){
                        	$pages = $agendaCount['qtde'];
                        	$pages = ceil($pages/3);
                        }
                        for ($i = 2; $i <= $pages; $i++){
                        	$j = $i - 1;
                        	echo '<a onclick="pagina('.$j.')" class="pag-bordered"><span>'.$i.'</span></a>';
                        }
                        ?>
                     <!-- <a href="#" class="pag-bordered" aria-label="Previous"><span>❮</span></a> -->	
                     <!-- <a href="#" class="pag-bordered"><span>2</span></a>
                        <a href="#" class="pag-bordered"><span>3</span></a>
                        <a href="#" class="pag-bordered" aria-label="Next"><span>❯</span></a> -->
                  </div>
               </div>
               <div class="col-lg-4"></div>
            </div>
         </div>
      </section>
      <section id="publications">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 text-center">
                  <h2 class="section-heading text-primary">NOTÍCIAS</h2>
               </div>
               <!-- INICIO CAROUSEL -->
               <div class="col-md-12 p-2 " >
                  <div id="demo" class="carousel slide" data-ride="carousel">
                     <ul class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                     </ul>
                     <div class="carousel-inner" role="listbox">
                           <div class="carousel-item active">
						   <a class="del-style-link w-100" href="#" data-toggle="modal" data-target="#modal_titulo1">
                               <img class="w-100" src=<?php  $imgname = 'admin/publicacoes/imagens/'.$jsonPublicacoes[0]['imagem'].'_crop.jpg'; echo $imgname ?>  alt="CMG USP">
                              <div class="carousel-caption">
                                 <h3 class="text-muted"><?php echo $jsonPublicacoes[0]['titulo'] ?></h3>
							  </div>
							</a>
                           </div>
                           <div class="carousel-item">
						   <a class="del-style-link w-100" href="#" data-toggle="modal" data-target="#modal_titulo2">
                              <img class="w-100 " src=<?php $imgname = 'admin/publicacoes/imagens/'.$jsonPublicacoes[1]['imagem'].'_crop.jpg'; echo $imgname  ?>  alt="CMG USP" >
                              <div class="carousel-caption">
                                 <h3 class="text-muted"><?php echo $jsonPublicacoes[1]['titulo'] ?></h3>
							  </div>
						</a>
                           </div>
                        
                        
                           <div class="carousel-item">
						   <a class="del-style-link w-100" href="#" data-toggle="modal" data-target="#modal_titulo2">
                              <img class="w-100" src=<?php  $imgname = 'admin/publicacoes/imagens/'.$jsonPublicacoes[2]['imagem'].'_crop.jpg'; echo $imgname  ?>  alt="CMG USP" >
                              <div class="carousel-caption">
                                 <h3 class="text-muted"><?php echo $jsonPublicacoes[2]['titulo'] ?></h3>
							  </div>
					</a>
                           </div>
                        
                     </div>
                     <a class="carousel-control-prev" href="#demo" role="button" target="_self" data-slide="prev">
                     <span class="carousel-control-prev-icon"></span>
                     </a>
                     <a class="carousel-control-next" href="#demo" role="button" target="_self" data-slide="next">
                     <span class="carousel-control-next-icon"></span>
                     </a>
                  </div>
               </div>
               <!-- FIM CAROUSEL -->
            </div>
         </div>
         <!-- INICIO MODAL 1-->
         <div class="modal fade" id="modal_titulo1" role="dialog" data-backdrop="static">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div style="padding:10px;">
                     <button type="button" class="close" data-dismiss="modal" onClick="">&times;</button>
                  </div>
                  <div class="modal-body">
                     <div class="col-lg-12 text-center">
                        <img src=<?php $imgname = 'admin/publicacoes/imagens/'.$jsonPublicacoes[0]['imagem'].'_crop.jpg'; echo $imgname ?> class="col-lg-12 img-responsive" style="padding-bottom:2%;">
                        <h1 class="col-lg-12 text-justify"><?php echo $jsonPublicacoes[0]['titulo'] ?></h1>
                        <p class="col-lg-12 text-justify"><?php echo $jsonPublicacoes[0]['descricao'] ?></p>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal" onClick="">Fechar</button>
                  </div>
               </div>
            </div>
         </div>
         <!-- FIM MODAL 1-->
         <!-- INICIO MODAL 2-->
         <div class="modal fade" id="modal_titulo2" role="dialog" data-backdrop="static">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div style="padding:10px;">
                     <button type="button" class="close" data-dismiss="modal" onClick="">&times;</button>
                  </div>
                  <div class="modal-body">
                     <div class="col-lg-12 text-center">
                        <img src=<?php $imgname = 'admin/publicacoes/imagens/'.$jsonPublicacoes[1]['imagem'].'_crop.jpg'; echo $imgname ?> class="col-lg-12 img-responsive" style="padding-bottom:2%;">
                        <h1 class="col-lg-12 text-justify"><?php echo $jsonPublicacoes[1]['titulo'] ?></h1>
                        <p class="col-lg-12 text-justify"><?php echo $jsonPublicacoes[1]['descricao'] ?></p>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal" onClick="">Fechar</button>
                  </div>
               </div>
            </div>
         </div>
         <!-- FIM MODAL 2-->
         <!-- INICIO MODAL 3-->
         <div class="modal fade" id="modal_titulo3" role="dialog" data-backdrop="static">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div style="padding:10px;">
                     <button type="button" class="close" data-dismiss="modal" onClick="">&times;</button>
                  </div>
                  <div class="modal-body">
                     <div class="col-lg-12 text-center">
                        <img src=<?php $imgname = 'admin/publicacoes/imagens/'.$jsonPublicacoes[2]['imagem'].'_crop.jpg'; echo $imgname ?> class="col-lg-12 img-responsive" style="padding: 2%; max-width: 400px; max-height: 420px; width: auto; height: auto;">
                        <h1 class="col-lg-12 text-justify"><?php echo $jsonPublicacoes[2]['titulo'] ?></h1>
                        <p class="col-lg-12 text-justify"><?php echo $jsonPublicacoes[2]['descricao'] ?></p>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal" onClick="">Fechar</button>
                  </div>
               </div>
            </div>
         </div>
         <!-- FIM MODAL 3-->
         <div class="col-lg-12 text-center">
            <a class="btn btn-primary" href="publicacoes.php">ler mais ...</a>
         </div>
      </section>
      <section id="sponsors" style=" min-height: 35%; max-height: auto;">
         <div class="container-fluid text-center">
            <div class="row">
               <div class="col-lg-12 text-center">
                  <h2 class="section-heading text-primary">APOIO</h2>
                  <!--                <hr class="light">-->
               </div>
               <div class="col-lg-12 text-center" style="padding:4%;">
                  <?php
                     foreach ($jsonPatrocinadores as $patrocinador) {
                     	echo '<label class="col-lg-3 col-md-3 col-sm-6 col-xs-6">';
                     	echo '<a class="del-style-link " href="'.$patrocinador["link"].'">';
                     	echo '<img src="admin/patrocinadores/imagens/' . $patrocinador['imagem'] . '.jpg" class="img-responsive" style="padding: 2%;max-width: 200px; max-height: 220px; width: auto; height: auto; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale;"></a></label>';
                     }
                     ?>
               </div>
            </div>
         </div>
      </section>
      <section id="contact">
         <div class="container">
            <div class="row">
               <div class="col-sm-12 text-center">
                  <h2 class="section-heading">ENTRE EM CONTATO</h2>
                  <!--                    <hr class="primary">-->
                  <p>Está pronto para realizar seu exame conosco? Isso é ótimo!<br>Contate-nos e teremos o maior prazer em cuidar de você.</p>
               </div>
               <?php
                  foreach ($jsonContatos as $contato) {
                  	echo '<div class="col-sm-4 text-center">';
                  	echo '<p>' . $contato["setor"] . '</p>';
                  	if ($contato["telefone1"] != null || $contato["telefone2"] != null || $contato["telefone3"] != null){
                  		echo '<i class="fa fa-phone fa-3x sr-contact"></i>';
                  	}
                  	if ($contato["telefone1"] != null){
                  		echo '<p>' . $contato["telefone1"] . '</p>';
                  	}
                  	if ($contato["telefone2"] != null){
                  		echo '<p>' . $contato["telefone2"] . '</p>';
                  	}
                  	if ($contato["telefone3"] != null){
                  		echo '<p>' . $contato["telefone3"] . '</p>';
                  	}
                  	if ($contato["email1"] != null || $contato["email2"] != null || $contato["email3"] != null){
                  		echo '<i class="fa fa-envelope-o fa-3x sr-contact"></i>';
                  	}
                  	if ($contato["email1"] != null){
                  		echo '<p><a href="mailto:' . $contato["email1"] . '">' . $contato["email1"] . '</p>';
                  	}
                  	if ($contato["email2"] != null){
                  		echo '<p><a href="mailto:' . $contato["email2"] . '">' . $contato["email2"] . '</p>';
                  	}
                  	if ($contato["email3"] != null){
                  		echo '<p><a href="mailto:' . $contato["email3"] . '">' . $contato["email3"] . '</p>';
                  	}
                  	echo '</div>';
                  }
                  ?>
            </div>
         </div>
      </section>
      <footer class="container-fluid text-center bg-dark" style="botton:">
         <a href="#myPage" title="To Top">
         <span class="glyphicon glyphicon-chevron-up"></span>
         </a>
         <p>&copy; Copyright 2018 - Todos os direitos reservados.</p>
      </footer>
	  <!-- Plugin JavaScript  -->
      <script src="vendor/jquery-easing/jquery.easing.min.js"></script> 
      <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
      <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script> 
      <!-- Custom scripts for this template -->
	  
	  <script src="js/creative.js"></script>
	  
      <script>
         var acc = document.getElementsByClassName("accordion");
         var i;
         for (i = 0; i < acc.length; i++) {
         	acc[i].onclick = function(){
         		this.classList.toggle("active");
         		var panel = this.nextElementSibling;
         		if (panel.style.display === "block") {
         			panel.style.display = "none";
         		} else {
         			panel.style.display = "block";
         		}
         	}
         }
	  </script>
	  <script type="text/javascript">
		function desliza(element, speed){
			var href = element.attr('href');
			var top = $(href).offset().top;
			$("html", "body").animate({scrollTop: top}, speed);
		} 
		$(function(){
			$(".scroll").click(function(e){
				e.preventDefault();
				desliza($(this),500);
			});

		});

		 </script>
      <script >
         $('.carousel').carousel();
	  </script>
	  
   </body>
</html>
