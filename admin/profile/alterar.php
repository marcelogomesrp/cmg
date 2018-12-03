<?php
	if(isset($_SESSION["userid"])){
		$id = $_SESSION["userid"];
		$name = $_SESSION["username"];
		$email = $_SESSION["useremail"];
	} else {
		header("location: ../index_admin.php?link=3&edit=0");
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
<div class="container">
	<div class="text-center">
		<h2>PAINEL DO USUÁRIO</h2>
	</div>
	<form class="form-horizontal" action="profile/alter.php" method="post" >
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
				<input class="btn btn-danger btn-block" type="button" value="Alterar senha" onclick="div_show()">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-12 text-left">
				<input class="btn btn-primary" type="submit" value="Salvar!">
			</div>
		</div>
	</form>


<br/>
    <?php
    if(isset($_GET['edit'])) {
        if ($_GET['edit'] == 1){ ?>
        <div class="alert alert-success">
            <strong>Parabens!</strong> Dados alterados com sucesso!
        </div>
        <?php } else { ?>
        <div class="alert alert-danger">
            <strong>Atenção!</strong> Erro ao alterar seus dados'
        </div>
        
        <?php }}?>
</div>
<div id="popupPswd" class="container-fluid">
	<div id="popup">
		<form class="form-horizontal" action="profile/alterpswd.php" method="post" >
			<a id="close" onclick="div_hide()">X</a>
			<input type="hidden" name="id" value="<?php echo $id ?>">
			<div class="form-group">
				<label class="control-label col-sm-2" for="oldpassword">Senha atual:</label>
				<div class="col-sm-10">
					<input class="form-control" type="password" name="oldpassword">   
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="password">Nova senha:</label>
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