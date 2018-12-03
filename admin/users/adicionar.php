<div class="container-fluid">
	<div class="text-center">
		<h2>ADICIONAR USUÁRIO</h2>
	</div>
	<form class="form-horizontal" action="users/add.php" method="post" >
		<div class="form-group">
			<label class="control-label col-sm-2" for="name">Nome:</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="name">   
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="email">E-mail:</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="email">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="password">Senha:</label>
			<div class="col-sm-10">
				<input class="form-control" type="password" name="password">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="permissoes"></label>
			<div class="col-sm-10">
				<center><strong>Permissões</strong></center>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="admin">Usuário administrador:</label>
			<div class="col-sm-10">
				<input class="form-check-input" type="checkbox" name="admin">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="patrocinadores">Patrocinadores:</label>
			<div class="col-sm-10">
				<input class="form-check-input" type="checkbox" name="patrocinadores">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="servicos">Serviços:</label>
			<div class="col-sm-10">
				<input class="form-check-input" type="checkbox" name="servicos">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="analiseseuexame">Analise seu Exame:</label>
			<div class="col-sm-10">
				<input class="form-check-input" type="checkbox" name="analiseseuexame">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="publicacoes">Publicações:</label>
			<div class="col-sm-10">
				<input class="form-check-input" type="checkbox" name="publicacoes">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="agenda">Agenda:</label>
			<div class="col-sm-10">
				<input class="form-check-input" type="checkbox" name="agenda">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="areas">Áreas:</label>
			<div class="col-sm-10">
				<input class="form-check-input" type="checkbox" name="areas">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="exames">Exames:</label>
			<div class="col-sm-10">
				<input class="form-check-input" type="checkbox" name="exames">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="genes">Genes:</label>
			<div class="col-sm-10">
				<input class="form-check-input" type="checkbox" name="genes">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="contatos">Contatos:</label>
			<div class="col-sm-10">
				<input class="form-check-input" type="checkbox" name="contatos">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-12 text-left">
				<input class="btn btn-primary btn-block" type="submit" value="Adicionar">
			</div>
		</div>
	</form>
</div>