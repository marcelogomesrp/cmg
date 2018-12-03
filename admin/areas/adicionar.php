<div class="container-fluid">
	<div class="text-center">
		<h2>ADICIONAR ÁREA</h2>
	</div>
	<form class="form-horizontal" enctype="multipart/form-data" action="areas/add.php" method="post" >
		<div class="form-group">
			 <label class="control-label col-sm-2" for="name">Nome:</label>
			<div class="col-sm-10">
			 <input class="form-control" type="text" name="nome">   
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="description">Descrição:</label>
			<div class="col-sm-10">
				<textarea class="form-control" name="descricao" cols="40" rows="5"></textarea>
				<!-- <input class="form-control" type="text" name="descricao"> -->
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="ativo">Ativo:</label>
			<div class="col-sm-10">
				<input class="form-check-input" type="checkbox" name="ativo" checked="checked">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="imagem">Imagem (tamanho mínimo de 240x240 pixels):</label>
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