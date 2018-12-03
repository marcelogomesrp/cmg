<?php
	if(isset($_POST["id"])){
		$id = $_POST["id"];
		$missao = $_POST["missao"];
		$cadamostra = $_POST["cadamostra"];
		$orientcoleta = $_POST["orientcoleta"];
		$servicos = $_POST["servicos"];
		$institucional = $_POST["institucional"];
	} else {
		header("location: ../index_admin.php?link=20&edit=0");
		die("");
	}
?>
<!-- include libraries(jQuery, bootstrap) -->
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 

<!-- include summernote css/js-->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/lang/summernote-pt-BR.js"></script>


<div class="container-fluid">
	<div class="text-center">
		<h2>ALTERAR SERVIÇOS</h2>
	</div>

	<script>
		$(document).ready(function() {
			$('#missao').summernote({
				lang: 'pt-BR',
				height: 160
			});
			$('#cadamostra').summernote({
				lang: 'pt-BR',
				height: 160
			});
			$('#orientcoleta').summernote({
				lang: 'pt-BR',
				height: 160
			});
			$('#servicos').summernote({
				lang: 'pt-BR',
				height: 160
			});
			$('#institucional').summernote({
				lang: 'pt-BR',
				height: 160
			});

			$('#missao3').summernote({
				lang: 'pt-BR',
				height: 160
			});

			$('#form').submit(function() {
				var missaoStr = $('#missao').summernote('code');
				var cadamostraStr = $('#cadamostra').summernote('code');
				var orientcoletaStr = $('#orientcoleta').summernote('code');
				var servicosStr = $('#servicos').summernote('code');
				var institucionalStr = $('#institucional').summernote('code');

				document.getElementById("missaoInput").value = missaoStr;
				document.getElementById("cadamostraInput").value = cadamostraStr;
				document.getElementById("orientcoletaInput").value = orientcoletaStr;
				document.getElementById("servicosInput").value = servicosStr;
				document.getElementById("institucionalInput").value = institucionalStr;

				return true;
			});
		});
	</script>
	
	<form class="form-horizontal" action="servicos/alter.php" method="post" id="form">
		<input type="hidden" name="id" value="<?php echo $id ?>">
		<div class="form-group">
			 <label class="control-label col-sm-2" for="missao">Missão:</label>
			<div class="col-sm-10">
				<input type="hidden" name="missao" id="missaoInput2">
				<div id="missao"><?php echo $missao ?></div>
			</div>
		</div>

<!--
                <div class="form-group">
                         <label class="control-label col-sm-2" for="missao3">Teste:</label>
                        <div class="col-sm-10">
                                <input type="hidden" name="missao3" id="missaoInput3">
                                <div id="missao3"><?php echo $missao ?></div>
                        </div>
                </div>
-->


		<div class="form-group">
			<label class="control-label col-sm-2" for="cadamostra">Cadastro de Amostra:</label>
			<div class="col-sm-10">
				<input type="hidden" name="cadamostra" id="cadamostraInput">
				<div id="cadamostra"><?php echo $cadamostra ?></div>
				
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="orientcoleta">Orientação de Coleta:</label>
			<div class="col-sm-10">
				<input type="hidden" name="orientcoleta" id="orientcoletaInput">
				<div id="orientcoleta"><?php echo $orientcoleta ?></div>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="active">Serviços:</label>
			<div class="col-sm-10">
				<input type="hidden" name="servicos" id="servicosInput">
				<div id="servicos"><?php echo $servicos ?></div>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="active">Institucional:</label>
			<div class="col-sm-10">
				<input type="hidden" name="institucional" id="institucionalInput">
				<div id="institucional"><?php echo $institucional ?></div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-12 text-left">
				<input class="btn btn-primary btn-block" type="submit" value="Alterar">
			</div>
		</div>
	</form>
</div>
