<?php
	if(isset($_POST["id"])){
		$id = $_POST["id"];
		$name = $_POST["name"];
		$email = $_POST["email"];

		$admin = $_POST["admin"];
		if ($admin == 1){
			$admin = 'checked="checked"';
		} else {
			$admin = "";
		}
		$patrocinadores = $_POST["patrocinadores"];
		if ($patrocinadores == 1){
			$patrocinadores = 'checked="checked"';
		} else {
			$patrocinadores = "";
		}
		$servicos = $_POST["servicos"];
		if ($servicos == 1){
			$servicos = 'checked="checked"';
		} else {
			$servicos = "";
		}
		$analiseseuexame = $_POST["analiseseuexame"];
		if ($analiseseuexame == 1){
			$analiseseuexame = 'checked="checked"';
		} else {
			$analiseseuexame = "";
		}
		$publicacoes = $_POST["publicacoes"];
		if ($publicacoes == 1){
			$publicacoes = 'checked="checked"';
		} else {
			$publicacoes = "";
		}
		$agenda = $_POST["agenda"];
		if ($agenda == 1){
			$agenda = 'checked="checked"';
		} else {
			$agenda = "";
		}
		$areas = $_POST["areas"];
		if ($areas == 1){
			$areas = 'checked="checked"';
		} else {
			$areas = "";
		}
		$exames = $_POST["exames"];
		if ($exames == 1){
			$exames = 'checked="checked"';
		} else {
			$exames = "";
		}
		$genes = $_POST["genes"];
		if ($genes == 1){
			$genes = 'checked="checked"';
		} else {
			$genes = "";
		}
		$contatos = $_POST["contatos"];
		if ($contatos == 1){
			$contatos = 'checked="checked"';
		} else {
			$contatos = "";
		}
	} else {
		header("location: ../index_admin.php?link=90&edit=0");
		die();
	}
?>
<script>
function div_show() {
	document.getElementById('popupPswd').style.display = "block";
}
function div_hide(){
	document.getElementById('popupPswd').style.display = "none";
}
</script>
<style>
	#popupPswd {
		width:100%;
		height:100%;
		z-index: 9999999999999999999999;
		opacity:.95;
		top:0;
		left:0;
		display:none;
		position:fixed;
		background-color:#313131;
		overflow:auto
	}
	div#popup {
		position:absolute;
		left:40%;
		top:40%;
		z-index: 9999999999999999999999;
	}
	a#close {
		position: fixed;
		right: 20px;
		top: 14px;
		cursor: pointer;
		font-size: 25px;
	}
</style>
<div class="container-fluid">
	<div class="text-center">
		<h2>ALTERAR USUÁRIO</h2>
	</div>
	<form class="form-horizontal" action="users/alter.php" method="post" >
		<input type="hidden" name="id" value="<?php echo $id ?>">
		<div class="form-group">
			<label class="control-label col-sm-2" for="name">Nome:</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="name" value="<?php echo $name ?>">   
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="email">E-mail:</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="email" value="<?php echo $email ?>">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="senha">Senha:</label>
			<div class="col-sm-10">
				<input class="btn btn-primary btn-block" type="button" value="Alterar senha" onclick="div_show()">
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
				<input class="form-check-input" type="checkbox" name="admin" <?php echo $admin?>>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="patrocinadores">Patrocinadores:</label>
			<div class="col-sm-10">
				<input class="form-check-input" type="checkbox" name="patrocinadores" <?php echo $patrocinadores?>>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="servicos">Serviços:</label>
			<div class="col-sm-10">
				<input class="form-check-input" type="checkbox" name="servicos" <?php echo $servicos?>>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="analiseseuexame">Analise seu Exame:</label>
			<div class="col-sm-10">
				<input class="form-check-input" type="checkbox" name="analiseseuexame" <?php echo $analiseseuexame?>>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="publicacoes">Publicações:</label>
			<div class="col-sm-10">
				<input class="form-check-input" type="checkbox" name="publicacoes" <?php echo $publicacoes?>>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="agenda">Agenda:</label>
			<div class="col-sm-10">
				<input class="form-check-input" type="checkbox" name="agenda" <?php echo $agenda?>>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="areas">Áreas:</label>
			<div class="col-sm-10">
				<input class="form-check-input" type="checkbox" name="areas" <?php echo $areas?>>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="exames">Exames:</label>
			<div class="col-sm-10">
				<input class="form-check-input" type="checkbox" name="exames" <?php echo $exames?>>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="genes">Genes:</label>
			<div class="col-sm-10">
				<input class="form-check-input" type="checkbox" name="genes" <?php echo $genes?>>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="contatos">Contatos:</label>
			<div class="col-sm-10">
				<input class="form-check-input" type="checkbox" name="contatos" <?php echo $contatos?>>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-12 text-left">
				<input class="btn btn-primary btn-block" type="submit" value="Alterar">
			</div>
		</div>
	</form>
</div>

<div id="popupPswd" class="container-fluid">
	<div id="popup">
		<form class="form-horizontal" action="users/alterpswd.php" method="post" >
			<a id="close" onclick="div_hide()">X</a>
			<input type="hidden" name="id" value="<?php echo $id ?>">
			<div class="form-group">
				<label class="control-label col-sm-2" for="password">Senha:</label>
				<div class="col-sm-10">
					<input class="form-control" type="password" name="password">   
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-12 text-left">
					<input class="btn btn-primary btn-block" type="submit" value="Alterar">
				</div>
			</div>
		</form>
	</div>
</div>