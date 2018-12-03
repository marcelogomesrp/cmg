<?php
	if(isset($_POST["id"])){
		$id = $_POST["id"];
		$titulo = $_POST["titulo"];
		$link = $_POST["link"];
		$descricao = $_POST["descricao"];
		$imagem = $_POST["imagem"];
	} else {
		header("location: ../index_admin.php?link=40&edit=0");
		die("");
	}
?>

<!-- include summernote css/js-->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/lang/summernote-pt-BR.js"></script>
        <script>
                $(document).ready(function() {
                        $('#descricao').summernote({
                                lang: 'pt-BR',
                                height: 160
                        });

                        $('#form').submit(function() {
                                var descricaoStr = $('#descricao').summernote('code');

                                document.getElementById("descricaoInput").value = descricaoStr;

                                return true;
                        });
                });
        </script>



<div class="container-fluid">
	<div class="text-center">
		<h2>ALTERAR PUBLICAÇÃO</h2>
	</div>
	<form class="form-horizontal" enctype="multipart/form-data" action="publicacoes/alter.php" method="post" id="form">
		<input type="hidden" name="id" value="<?php echo $id ?>">
		<div class="form-group">
			 <label class="control-label col-sm-2" for="titulo">Título:</label>
			<div class="col-sm-10">
			 <input class="form-control" type="text" name="titulo" value="<?php echo $titulo ?>">   
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="link">Link:</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="link" value="<?php echo $link ?>">
			</div>
		</div>

                <div class="form-group">
                         <label class="control-label col-sm-2" for="descricao">Descrição:</label>
                        <div class="col-sm-10">
                                <input type="hidden" name="descricao" id="descricaoInput">
                                <div id="descricao"><?php echo $descricao ?></div>
                        </div>
                </div>

<!--

		<div class="form-group">
			<label class="control-label col-sm-2" for="descricao">Descrição:</label>
			<div class="col-sm-10">
				<textarea class="form-control" name="descricao" cols="40" rows="5"><?php echo $descricao ?></textarea>
			</div>
		</div>
-->
		<div class="form-group">
			<label class="control-label col-sm-2" for="imagem">Imagem atual:</label>
			<div class="col-sm-10">
				<img src=<?php echo "publicacoes/imagens/".$imagem."_crop.jpg" ?>>
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
