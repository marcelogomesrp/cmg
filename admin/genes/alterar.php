<?php
	if(isset($_POST["id"])){
		$id = $_POST["id"];
		$nome = $_POST["nome"];
		$link = $_POST["link"];
	} else {
		header("location: ../index_admin.php?link=80&edit=0");
		die();
	}
?>
<div class="container-fluid">
	<div class="text-center">
		<h2>ALTERAR GENE</h2>
	</div>
	<form class="form-horizontal" action="genes/alter.php" method="post" >
		<input type="hidden" name="id" value="<?php echo $id ?>">

		<div class="form-group">
			 <label class="control-label col-sm-2" for="name">Nome:</label>
			<div class="col-sm-10">
			 <input class="form-control" type="text" name="nome" value="<?php echo $nome ?>">   
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="description">Descrição:</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="link" value="<?php echo $link ?>">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-12 text-left">
				<input class="btn btn-primary btn-block" type="submit" value="Alterar">
			</div>
		</div>
	</form>
</div>