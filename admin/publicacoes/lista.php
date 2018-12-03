<?php
	session_start();
	if (!isset($_SESSION['userid'])){
		header("location: http://$_SERVER[HTTP_HOST]"."/cmg/admin/login.php");
		die("");
	} else if ($_SESSION['userpublicacoes'] != 1){
		die("");
	}
	ini_set("allow_url_fopen", 1);
	$url = "http://$_SERVER[HTTP_HOST]"."/cmg/admin/publicacoes/list.php";
	$json = json_decode(file_get_contents($url), true);
?>
<div class="text-center">
	<h2>PUBLICAÇÕES</h2>
</div>
<div class="container-fluid">
	<div class="table-responsive">
		<table class="table table-hover table-striped">
			<thead>
				<tr>
					<th>Título</th>
					<th>Link</th>
					<th>Descrição</th>
					<th>Editar</th>
					<th>Apagar</th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach ($json as $publicacoes) {
						echo '<tr>
								<td>';
						echo $publicacoes['titulo'];
						echo '</td><td>';
						echo $publicacoes['link'];
						echo '</td><td>';
						echo $publicacoes['descricao'];
						echo '</td><td>';
						echo "<form action='index_admin.php?link=45' method='post'>
								<input type='hidden' name='titulo' value='".$publicacoes['titulo']."'>
								<input type='hidden' name='link' value='".$publicacoes['link']."'>
								<input type='hidden' name='descricao' value='".$publicacoes['descricao']."'>
								<input type='hidden' name='imagem' value='".$publicacoes['imagem']."'>
								<button class='btn btn-success' type='submit' name='id' value='".$publicacoes["id"]."'><span class='glyphicon glyphicon-pencil'></span></button>
							 </form>";
						echo '</td><td>';
						echo "<form action='publicacoes/delete.php' method='post'><button class='btn btn-danger' type='submit' name='id' value='".$publicacoes["id"]."'>
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
<a class="btn btn-warning" href="index_admin.php?link=43" type="button"><span class="glyphicon glyphicon-plus"></span></a><br/><br/>
<?php
	if(isset($_GET['edit'])) {
		if ($_GET['edit'] == 1){
			echo 'Publicação alterada com sucesso!';
		} else {
			echo 'Erro ao alterar a publicação';
		}
	}
	if(isset($_GET['delete'])) {
		if ($_GET['delete'] == 1){
			echo 'Publicação apagada com sucesso!';
		} else {
			echo 'Erro ao apagar a publicação';
		}
	}
	if(isset($_GET['add'])) {
		if ($_GET['add'] == 1){
			echo 'Publicação adicionada com sucesso!';
		} else if ($_GET['add'] == 2) {
			echo 'A imagem é muito pequena. Tente enviar uma imagem maior.';
		} else {
			echo 'Erro ao gravar a publicação';
		}
	}
?>