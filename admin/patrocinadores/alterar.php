<?php
	if(isset($_POST["id"])){
		$id = $_POST["id"];
		$nome = $_POST["nome"];
		$link = $_POST["link"];
		$imagem = $_POST["imagem"];
	} else {
		header("location: ../index_admin.php?link=10&edit=0");
		die();
	}
?>
<div class="container-fluid">
	<div class="text-center">
		<h2>ALTERAR PATROCINADOR</h2>
	</div>
	<form class="form-horizontal" enctype="multipart/form-data" action="patrocinadores/alter.php" method="post" >
		<input type="hidden" name="id" value="<?php echo $id ?>">
		<div class="form-group">
			 <label class="control-label col-sm-2" for="name">Nome:</label>
			<div class="col-sm-10">
			 <input class="form-control" type="text" name="nome" value="<?php echo $nome ?>">   
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="link">Link:</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="link" value="<?php echo $link ?>">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="imagem">Imagem atual:</label>
			<div class="col-sm-10">
				<img style="max-width: 100px; max-height: 120px; width: auto; height: auto;" src=<?php echo "patrocinadores/imagens/".$imagem.".jpg" ?>>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="imagem">Imagem:</label>
			<div class="col-sm-10">
				<input class="form-control" name="imagem" type="file" /><br/>
				Deixe o campo vazio caso não queira trocar a imagem
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-12 text-left">
				<input class="btn btn-primary btn-block" type="submit" value="Alterar">
			</div>
		</div>
	</form>
</div>