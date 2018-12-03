<div class="container-fluid">
	<div class="text-center">
		<h2>ADICIONAR PATROCINADOR</h2>
	</div>
	<form class="form-horizontal" enctype="multipart/form-data" action="patrocinadores/add.php" method="post" >
		<div class="form-group">
			<label class="control-label col-sm-2" for="name">Nome:</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="nome">   
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="link">Link:</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="link">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="imagem">Imagem:</label>
			<div class="col-sm-10">
				<input class="form-control" name="imagem" type="file" />
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-12 text-left">
				<input class="btn btn-primary btn-block" type="submit" value="Adicionar">
			</div>
		</div>
	</form>
</div>