<?php
	if(isset($_POST["id"])){
		$id = $_POST["id"];
		$pedidoexame = $_POST["pedidoexame"];
		$documentos = $_POST["documentos"];
		$solicitacaoservico = $_POST["solicitacaoservico"];
		$agendamentodeconsultoria = $_POST["agendamentodeconsultoria"];
	} else {
		header("location: ../index_admin.php?link=30&edit=0");
		die();
	}
?>
<div class="container-fluid">
	<div class="text-center">
		<h2>ANALISE SEU EXAME</h2>
	</div>
	<form class="form-horizontal" action="analiseseuexame/alter.php" method="post" >
		<input type="hidden" name="id" value="<?php echo $id ?>">
		<div class="form-group">
			 <label class="control-label col-sm-2" for="pedidoexame">Pedido de Exame Externo:</label>
			<div class="col-sm-10">
			 <input class="form-control" type="text" name="pedidoexame" value="<?php echo $pedidoexame ?>">   
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="documentos">Documentos:</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="documentos" value="<?php echo $documentos ?>">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="solicitacaoservico">Serviço de Análise Genômica:</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="solicitacaoservico" value="<?php echo $solicitacaoservico ?>">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="agendamentodeconsultoria">Consultoria:</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="agendamentodeconsultoria" value="<?php echo $agendamentodeconsultoria ?>">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-12 text-left">
				<input class="btn btn-primary btn-block" type="submit" value="Alterar">
			</div>
		</div>
	</form>
</div>