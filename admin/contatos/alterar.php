<?php
	if(isset($_POST["id"])){
		$id = $_POST["id"];
		$setor = $_POST["setor"];
		$telefone1 = $_POST["telefone1"];
		$telefone2 = $_POST["telefone2"];
		$telefone3 = $_POST["telefone3"];
		$email1 = $_POST["email1"];
		$email2 = $_POST["email2"];
		$email3 = $_POST["email3"];
	} else {
		header("location: ../index_admin.php?link=100&edit=0");
		die("");
	}
?>
<div class="container-fluid">
	<div class="text-center">
		<h2>ALTERAR CONTATOS</h2>
	</div>
	<form class="form-horizontal" enctype="multipart/form-data" action="contatos/alter.php" method="post" >
		<input type="hidden" name="id" value="<?php echo $id ?>">
		<div class="form-group">
			<label class="control-label col-sm-2" for="setor">Departamento:</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="setor" value="<?php echo $setor ?>">   
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="phone1">Telefone 1:</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="telefone1" value="<?php echo $telefone1 ?>">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="phone2">Telefone 2:</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="telefone2" value="<?php echo $telefone2 ?>">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="phone3">Telefone 3:</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="telefone3" value="<?php echo $telefone3 ?>">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="email1">E-mail 1:</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="email1" value="<?php echo $email1 ?>">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="email2">E-mail 2:</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="email2" value="<?php echo $email2 ?>">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="email3">E-mail 3:</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="email3" value="<?php echo $email3 ?>">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-12 text-left">
				<input class="btn btn-primary btn-block" type="submit" value="Alterar">
			</div>
		</div>
	</form>
</div>