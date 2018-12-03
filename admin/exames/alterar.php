<?php
	if(isset($_POST["id"])){
		$id = $_POST["id"];
		$idarea = $_POST["area"];
		$nome = $_POST["nome"];
		$descricao = $_POST["descricao"];
		$ativo = $_POST["ativo"];
		if ($ativo == 'on'){
			$ativo = 'checked="checked"';
		} else {
			$ativo = "";
		}
	} else {
		header("location: ../index_admin.php?link=70&edit=0");
		die("");
	}
?>



<!-- include libraries(jQuery, bootstrap) -->
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 

<!-- include summernote css/js-->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/lang/summernote-pt-BR.js"></script>


<div class="container-fluid">
	<div class="text-center">
		<h2>ALTERAR EXAME</h2>
	</div>



        <script>
                $(document).ready(function() {
                        $('#descricao').summernote({
                                lang: 'pt-BR',
                                height: 160
                        });

                        $('#form').submit(function() {
                                var descricaoStr = $('#descricao').summernote('code');
				//descricaoStr = "modificado";

                                document.getElementById("descricaoInput").value = descricaoStr;
                                return true;
                        });
                });
        </script>




	<form class="form-horizontal" action="exames/alter.php" method="post" id="form">
		<input type="hidden" name="id" value="<?php echo $id ?>">
		<div class="form-group">
			<label class="control-label col-sm-2" for="area">Área:</label>
			<div class="col-sm-10">
			<select name="area" class="form-control">
			<?php
				ini_set("allow_url_fopen", 1);
				$urlAreas = "http://$_SERVER[HTTP_HOST]"."/cmg/admin/exames/getareas.php";
				$jsonAreas = json_decode(file_get_contents($urlAreas), true);
				foreach ($jsonAreas as $area){
					if ($idarea == $area['idarea']){
						echo "<option selected value='".$area['idarea']."''>" . $area['nome'] . "</option>";
					} else {
						echo "<option value='".$area['idarea']."''>" . $area['nome'] . "</option>";
					}
				}
			?>
			</select>
			</div>
		</div>
		<div class="form-group">
			 <label class="control-label col-sm-2" for="name">Nome:</label>
			<div class="col-sm-10">
			 <input class="form-control" type="text" name="nome" value="<?php echo $nome ?>">   
			</div>
		</div>


                <div class="form-group">
                         <label class="control-label col-sm-2" for="descricao">Descrição</label>
                        <div class="col-sm-10">
                                <input type="hidden" name="descricao" id="descricaoInput">
                                <div id="descricao"><?php echo $descricao ?></div>
                        </div>
                </div>

<!--
		<div class="form-group">
			<label class="control-label col-sm-2" for="descricao">Descrição:</label>

			<div class="col-sm-10">
				<textarea class="form-control" name="descricao_" cols="40" rows="5"><?php echo $descricao ?></textarea>
				 <input class="form-control" type="textarea" name="descricao" value="<?php echo $descricao ?>"> 
			</div>
		</div>
-->

		<div class="form-group">
			<label class="control-label col-sm-2" for="active">Ativo:</label>
			<div class="col-sm-10">
                <div class="container-fluid">
                    <div class="row">
                        <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
				            <input class="form-check-input" type="checkbox" name="ativo" <?php echo $ativo?>>
                        </label>
                    </div>
                </div>
			</div>
		</div>
		<div class="form-group">
            <label class="control-label col-sm-2" for="active">Genes:</label>
            <div class="col-sm-10">
                <div class="container-fluid">
                    <div class="row">
                        <?php
                        $urlGenes = "http://$_SERVER[HTTP_HOST]"."/cmg/admin/exames/getgenesfromidexame.php?id=".$id;
                        $jsonGenes = json_decode(file_get_contents($urlGenes), true);
                        foreach ($jsonGenes as $gene){
                        if(!isset($gene['idexame'])){
                        echo '<label class="col-lg-4 col-md-4 col-sm-4 col-xs-4">';
                        echo '<input  type="checkbox" name="geneslist[]" value="'.$gene['idgene'].'"> '.$gene['nome'];
                        echo '</label>';
                        } else {
                        echo '<label class="col-lg-4 col-md-4 col-sm-4 col-xs-4">';
                        echo '<input type="checkbox" name="geneslist[]" value="'.$gene['idgene'].'" checked> '.$gene['nome'];
                        echo '</label>';
                        }
                        ?>

                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
		<div class="form-group">
			<div class="col-sm-12 text-left">
				<input class="btn btn-primary btn-block" type="submit" value="Alterar">
			</div>
		</div>
	</form>
</div>
