<?php
	session_start();
	if (!isset($_SESSION['userid'])){
		header("location: http://$_SERVER[HTTP_HOST]"."/cmg/admin/login.php");
		die("");
	} else if ($_SESSION['userexames'] != 1){
		die("");
	}
	ini_set("allow_url_fopen", 1);
	$url = "http://$_SERVER[HTTP_HOST]"."/cmg/admin/exames/list.php";
	$json = json_decode(file_get_contents($url), true);
?>
<div class="text-center">
	<h2>EXAMES</h2>
</div>
	<div class="container-fluid">
		<div class="table-responsive">
			<table class="table table-hover table-striped">
				<thead>
					<tr>
						<th>Área</th>
						<th>Nome</th>
						<th>Descricão</th>
						<th>Ativo</th>
						<th>Data de Modificação</th>
						<th>Editar</th>
						<th>Apagar</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($json as $exames) {
					?>
						<tr>
							<td><?php echo $exames['area'];?></td>
							<td><?php echo $exames['nome'];?></td>
							<td><?php echo $exames['descricao'];?></td>
							<td><?php
									if ($exames['ativo'] == 'on'){
										$ativo = 'checked="checked"';
									} else {
										$ativo = "";
									}
								echo '<input class="form-check-input" type="checkbox" disabled '.$ativo.'>';?>
							</td>
							<td>
								<?php $date = new DateTime($exames["data_alteracao"]);
								echo $date->format('d/m/Y');?>
							</td>
							<td>
							<?php echo "<form action='index_admin.php?link=75' method='post'>
								<input type='hidden' name='area' value='".$exames['idarea']."'>
								<input type='hidden' name='nome' value='".$exames['nome']."'>
								<input type='hidden' name='descricao' value='".$exames['descricao']."'>
								<input type='hidden' name='ativo' value='".$exames['ativo']."'>
								<input type='hidden' name='data_alteracao' value='".$exames['data_alteracao']."'>
								<button class='btn btn-success' type='submit' name='id' value='".$exames["id"]."'><span class='glyphicon glyphicon-pencil'></span></button>
							 </form>";?>
							</td>
							<td>
								<?php echo "<form action='exames/delete.php' method='post'><button class='btn btn-danger' type='submit' name='id' value='".$exames["id"]."'>
								<span class='glyphicon glyphicon-remove'></span>
								</button>
								</form>";?>
							</td>
						</tr>
					<?php
                            
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
<a class="btn btn-warning" href="index_admin.php?link=73" type="button"><span class="glyphicon glyphicon-plus"></span></a><br/><br/>
<?php
	if(isset($_GET['edit'])) {
		if ($_GET['edit'] == 1){
			echo 'Exame alterado com sucesso!';
		} else {
			echo 'Erro ao alterar o exame';
		}
	}
	if(isset($_GET['delete'])) {
		if ($_GET['delete'] == 1){
			echo 'Exame apagado com sucesso!';
		} else {
			echo 'Erro ao apagar o exame';
		}
	}
	if(isset($_GET['add'])) {
		if ($_GET['add'] == 1){
			echo 'Exame adicionado com sucesso!';
		} else {
			echo 'Erro ao gravar o exame';
		}
	}
?>