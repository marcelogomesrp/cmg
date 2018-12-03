<div class="container-fluid">
	<div class="text-center">
		<h2>ADICIONAR CONTATO</h2>
	</div>
	<form class="form-horizontal" enctype="multipart/form-data" action="contatos/add.php" method="post" >
		<div class="form-group">
			<label class="control-label col-sm-2" for="setor">Departamento:</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="setor">   
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="phone1">Telefone 1:</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="telefone1">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="phone2">Telefone 2:</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="telefone2">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="phone3">Telefone 3:</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="telefone3">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="email1">E-mail 1:</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="email1">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="email2">E-mail 2:</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="email2">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="email3">E-mail 3:</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="email3">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-12 text-left">
				<input class="btn btn-primary btn-block" type="submit" value="Adicionar">
			</div>
		</div>		
	</form>
</div>