<?php
	session_start();
	if (!isset($_SESSION['userid'])){
		header("location: http://$_SERVER[HTTP_HOST]"."/cmg/admin/login.php");
		die("");
	} else if ($_SESSION['userpatrocinadores'] != 1){
		die("");
	}
	ini_set("allow_url_fopen", 1);
	$url = "http://$_SERVER[HTTP_HOST]"."/cmg/admin/patrocinadores/list.php";
	$json = json_decode(file_get_contents($url), true);
?>
<div class="text-center">
	<h2>PATROCINADORES</h2>
</div>
<div class="container-fluid">
	<div class="table-responsive">
		<table class="table table-hover table-striped">
			<thead>
				<tr>
					<th>Nome</th>
					<th>Link</th>
					<th>Editar</th>
					<th>Apagar</th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach ($json as $patrocinadores) {
						echo '<tr>
								<td>';
						echo $patrocinadores['nome'];
						echo '</td><td>';
						echo $patrocinadores['link'];
						echo '</td><td>';
						echo "<form action='index_admin.php?link=15' method='post'>
								<input type='hidden' name='nome' value='".$patrocinadores['nome']."'>
								<input type='hidden' name='link' value='".$patrocinadores['link']."'>
								<input type='hidden' name='imagem' value='".$patrocinadores['imagem']."'>
								<button class='btn btn-success' type='submit' name='id' value='".$patrocinadores["id"]."'><span class='glyphicon glyphicon-pencil'></span></button>
							 </form>";
						echo '</td><td>';
						echo "<form action='patrocinadores/delete.php' method='post'><button class='btn btn-danger' type='submit' name='id' value='".$patrocinadores["id"]."'>
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
<a class="btn btn-warning" href="index_admin.php?link=13" type="button"><span class="glyphicon glyphicon-plus"></span></a><br/><br/>
<?php
	if(isset($_GET['edit'])) {
		if ($_GET['edit'] == 1){
			echo 'Patrocinador alterado com sucesso!';
		} else {
			echo 'Erro ao alterar o patrocinador';
		}
	}
	if(isset($_GET['delete'])) {
		if ($_GET['delete'] == 1){
			echo 'Patrocinador apagado com sucesso!';
		} else {
			echo 'Erro ao apagar o patrocinador';
		}
	}
	if(isset($_GET['add'])) {
		if ($_GET['add'] == 1){
			echo 'Patrocinador adicionado com sucesso!';
		} else {
			echo 'Erro ao gravar o patrocinador';
		}
	}
?>