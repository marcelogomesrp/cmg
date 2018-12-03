<?php
	session_start();
	if (!isset($_SESSION['userid'])){
		header("location: http://$_SERVER[HTTP_HOST]"."/cmg/admin/login.php");
		die("");
	} else if ($_SESSION['usercontatos'] != 1){
		die("");
	}
	ini_set("allow_url_fopen", 1);
	$url = "http://$_SERVER[HTTP_HOST]"."/cmg/admin/contatos/list.php";
	$json = json_decode(file_get_contents($url), true);
?>
<div class="text-center">
	<h2>CONTATOS</h2>
</div>
<div class="container-fluid">
	<div class="table-responsive">
		<table class="table table-hover table-striped">
			<thead>
				<tr>
					<th>Departamento</th>
					<th>Telefone 1</th>
					<th>Telefone 2</th>
					<th>Telefone 3</th>
					<th>E-mail 1</th>
					<th>E-mail 2</th>
					<th>E-mail 3</th>
					<th>Editar</th>
					<th>Apagar</th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach ($json as $contatos) {
						echo '<tr>
								<td>';
						echo $contatos['setor'];
						echo '</td><td>';
						echo $contatos['telefone1'];
						echo '</td><td>';
						echo $contatos['telefone2'];
						echo '</td><td>';
						echo $contatos['telefone3'];
						echo '</td><td>';
						echo $contatos['email1'];
						echo '</td><td>';
						echo $contatos['email2'];
						echo '</td><td>';
						echo $contatos['email3'];
						echo '</td><td>';
						echo "<form action='index_admin.php?link=105' method='post'>
								<input type='hidden' name='setor' value='".$contatos['setor']."'>
								<input type='hidden' name='telefone1' value='".$contatos['telefone1']."'>
								<input type='hidden' name='telefone2' value='".$contatos['telefone2']."'>
								<input type='hidden' name='telefone3' value='".$contatos['telefone3']."'>
								<input type='hidden' name='email1' value='".$contatos['email1']."'>
								<input type='hidden' name='email2' value='".$contatos['email2']."'>
								<input type='hidden' name='email3' value='".$contatos['email3']."'>
								<button class='btn btn-success' type='submit' name='id' value='".$contatos["id"]."'><span class='glyphicon glyphicon-pencil'></span></button>
							 </form>";
						echo '</td><td>';
						echo "<form action='contatos/delete.php' method='post'><button class='btn btn-danger' type='submit' name='id' value='".$contatos["id"]."'>
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
<a class="btn btn-warning" href="index_admin.php?link=103" type="button"><span class="glyphicon glyphicon-plus"></span></a><br/><br/>
<?php
	if(isset($_GET['edit'])) {
		if ($_GET['edit'] == 1){
			echo 'Contato alterado com sucesso!';
		} else {
			echo 'Erro ao alterar o contato';
		}
	}
	if(isset($_GET['delete'])) {
		if ($_GET['delete'] == 1){
			echo 'Contato apagado com sucesso!';
		} else {
			echo 'Erro ao apagar o contato';
		}
	}
	if(isset($_GET['add'])) {
		if ($_GET['add'] == 1){
			echo 'Contato adicionado com sucesso!';
		} else {
			echo 'Erro ao gravar o contato';
		}
	}
?>