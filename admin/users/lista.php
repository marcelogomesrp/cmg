<?php
	session_start();
	if (!isset($_SESSION['userid'])){
		header("location: http://$_SERVER[HTTP_HOST]"."/cmg/admin/login.php");
		die("");
	} else if ($_SESSION['useradmin'] != 1){
		die("");
	}
	ini_set("allow_url_fopen", 1);
	$url = "http://$_SERVER[HTTP_HOST]"."/cmg/admin/users/list.php";
	$json = json_decode(file_get_contents($url), true);
?>
<div class="text-center">
	<h2>USUÁRIOS</h2>
</div>
<div class="container-fluid">
	<div class="table-responsive">
		<table class="table table-hover table-striped">
			<thead>
				<tr>
					<th>Nome</th>
					<th>E-mail</th>
					<th>Administrador</th>
					<th>Editar</th>
					<th>Apagar</th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach ($json as $users) {
						echo '<tr>
								<td>';
						echo $users['name'];
						echo '</td><td>';
						echo $users['email'];
						echo '</td><td>';
						if ($users['admin'] == 1){
							echo "Sim";
						} else {
							echo "Não";
						}
						echo '</td><td>';
						echo "<form action='index_admin.php?link=95' method='post'>
								<input type='hidden' name='name' value='".$users['name']."'>
								<input type='hidden' name='email' value='".$users['email']."'>
								<input type='hidden' name='admin' value='".$users['admin']."'>
								<input type='hidden' name='patrocinadores' value='".$users['patrocinadores']."'>
								<input type='hidden' name='servicos' value='".$users['servicos']."'>
								<input type='hidden' name='analiseseuexame' value='".$users['analiseseuexame']."'>
								<input type='hidden' name='publicacoes' value='".$users['publicacoes']."'>
								<input type='hidden' name='agenda' value='".$users['agenda']."'>
								<input type='hidden' name='areas' value='".$users['areas']."'>
								<input type='hidden' name='exames' value='".$users['exames']."'>
								<input type='hidden' name='genes' value='".$users['genes']."'>
								<input type='hidden' name='contatos' value='".$users['contatos']."'>
								<button class='btn btn-success' type='submit' name='id' value='".$users["id"]."'><span class='glyphicon glyphicon-pencil'></span></button>
							 </form>";
						echo '</td><td>';
						echo "<form action='users/delete.php' method='post'><button class='btn btn-danger' type='submit' name='id' value='".$users["id"]."'>
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
<a class="btn btn-warning" href="index_admin.php?link=93" type="button"><span class="glyphicon glyphicon-plus"></span></a><br/><br/>
<?php
	if(isset($_GET['edit'])) {
		if ($_GET['edit'] == 1){
			echo 'Usuário alterado com sucesso!';
		} else {
			echo 'Erro ao alterar o usuário';
		}
	}
	if(isset($_GET['delete'])) {
		if ($_GET['delete'] == 1){
			echo 'Usuário apagado com sucesso!';
		} else {
			echo 'Erro ao apagar o usuário';
		}
	}
	if(isset($_GET['add'])) {
		if ($_GET['add'] == 1){
			echo 'Usuário adicionado com sucesso!';
		}
		else if ($_GET['add'] == 2){
			echo 'E-mail já existe.';
		} else {
			echo 'Erro ao gravar o usuário';
		}
	}
?>