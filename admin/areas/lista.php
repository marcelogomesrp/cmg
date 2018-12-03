<?php
	session_start();
	if (!isset($_SESSION['userid'])){
		header("location: http://$_SERVER[HTTP_HOST]"."/cmg/admin/login.php");
		die("");
	} else if ($_SESSION['userareas'] != 1){
		die("");
	}
	ini_set("allow_url_fopen", 1);
	$url = "http://$_SERVER[HTTP_HOST]"."/cmg/admin/areas/list.php";
	$json = json_decode(file_get_contents($url), true);
?>
<div class="text-center">
	<h2>ÁREAS</h2>
</div>
<div class="container-fluid">
	<div class="table-responsive">
		<table class="table table-hover table-striped">
			<thead>
				<tr>
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
					foreach ($json as $areas) {
						echo '<tr>
								<td>';
						echo $areas['nome'];
						echo '</td><td>';
						echo $areas['descricao'];
						echo '</td><td>';
						if ($areas['ativo'] == 'on'){
							$ativo = 'checked="checked"';
						} else {
							$ativo = "";
						}
						echo '<input class="form-check-input" type="checkbox" disabled '.$ativo.'>';
						echo '</td><td>';
						$date = new DateTime($areas["data_alteracao"]);
						echo $date->format('d/m/Y');
						echo '</td><td>';
						echo "<form action='index_admin.php?link=65' method='post'>
								<input type='hidden' name='nome' value='".$areas['nome']."'>
								<input type='hidden' name='descricao' value='".$areas['descricao']."'>
								<input type='hidden' name='ativo' value='".$areas['ativo']."'>
								<input type='hidden' name='data_alteracao' value='".$areas['data_alteracao']."'>
								<input type='hidden' name='imagem' value='".$areas['imagem']."'>
								<button class='btn btn-success' type='submit' name='id' value='".$areas["id"]."'><span class='glyphicon glyphicon-pencil'></span></button>
							 </form>";
						echo '</td><td>';
						echo "<form action='areas/delete.php' method='post'><button class='btn btn-danger' type='submit' name='id' value='".$areas["id"]."'>
								<span class='glyphicon glyphicon-remove'></span>
								</button>
								</form>";
						echo '</td></tr>';
					}
				?>
			</tbody>
		</table>
	</div>
</div>
<a class="btn btn-warning" href="index_admin.php?link=63" type="button"><span class="glyphicon glyphicon-plus"></span></a><br/><br/>
<?php
	if(isset($_GET['edit'])) {
		if ($_GET['edit'] == 1){
			echo 'Área alterada com sucesso!';
		} else {
			echo 'Erro ao alterar a área';
		}
	}
	if(isset($_GET['delete'])) {
		if ($_GET['delete'] == 1){
			echo 'Área apagada com sucesso!';
		} else {
			echo 'Erro ao apagar a área';
		}
	}
	if(isset($_GET['add'])) {
		if ($_GET['add'] == 1){
			echo 'Área adicionada com sucesso!';
		} else if ($_GET['add'] == 2) {
			echo 'A imagem é muito pequena. Tente enviar uma imagem maior.';
		} else {
			echo 'Erro ao gravar a área';
		}
	}
?>