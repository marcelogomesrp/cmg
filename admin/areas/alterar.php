<?php
	if(isset($_POST["id"])){
		$id = $_POST["id"];
		$nome = $_POST["nome"];
		$descricao = $_POST["descricao"];
		$ativo = $_POST["ativo"];
		$imagem = $_POST["imagem"];
		if ($ativo == 'on'){
			$ativo = 'checked="checked"';
		} else {
			$ativo = "";
		}
	} else {
		header("location: ../index_admin.php?link=60&edit=0");
		die();
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
		<h2>ALTERAR ÁREA</h2>
	</div>
	<form class="form-horizontal" enctype="multipart/form-data" action="areas/alter.php" method="post" id="form" >
		<input type="hidden" name="id" value="<?php echo $id ?>">

		<div class="form-group">
			 <label class="control-label col-sm-2" for="name">Nome:</label>
			<div class="col-sm-10">
			 <input class="form-control" type="text" name="nome" value="<?php echo $nome ?>">   
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
			<label class="control-label col-sm-2" for="description">Descrição:</label>
			<div class="col-sm-10">
				<textarea class="form-control" name="descricao1" cols="40" rows="5"><?php echo $descricao ?></textarea>
			</div>
		</div>
-->
		<div class="form-group">
			<label class="control-label col-sm-2" for="description">Ativo:</label>
			<div class="col-sm-10">
				<input class="form-check-input" type="checkbox" name="ativo" <?php echo $ativo?>>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="imagem">Imagem atual:</label>
			<div class="col-sm-10">
				<img src=<?php echo "areas/imagens/".$imagem."_crop.jpg" ?>>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="imagem">Imagem (tamanho mínimo de 240x240 pixels):</label>
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
