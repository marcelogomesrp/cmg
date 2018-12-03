<div class="container-fluid">
	<div class="text-center">
		<h2>ADICIONAR EXAME</h2>
	</div>
	<form class="form-horizontal" action="exames/add.php" method="post" >
		<div class="form-group">
			<label class="control-label col-sm-2" for="area">Área:</label>
			<div class="col-sm-10">
			<select name="area" class="form-control">
			<?php
				ini_set("allow_url_fopen", 1);
				$urlAreas = "http://$_SERVER[HTTP_HOST]"."/cmg/admin/exames/getareas.php";
				$jsonAreas = json_decode(file_get_contents($urlAreas), true);
				foreach ($jsonAreas as $area){
					echo "<option value='".$area['idarea']."''>" . $area['nome'] . "</option>";
				}
			?>
			</select>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="name">Nome:</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="nome">   
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="description">Descrição:</label>
			<div class="col-sm-10">
				<textarea class="form-control" name="descricao" cols="40" rows="5"></textarea>
				<!-- <input class="form-control" type="text" name="descricao"> -->
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="active">Ativo:</label>
			<div class="col-sm-10">
                <div class="container-fluid">
                    <div class="row">
                        <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
				            <input class="form-check-input" type="checkbox" name="ativo" checked="checked">
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
                        $urlGenes = "http://$_SERVER[HTTP_HOST]"."/cmg/admin/exames/getgenes.php";
                        $jsonGenes = json_decode(file_get_contents($urlGenes), true);
                        foreach ($jsonGenes as $gene){
                            echo '<label class="col-lg-4 col-md-4 col-sm-4 col-xs-4">';
                                echo '<input type="checkbox" name="geneslist[]" value="'.$gene['idgene'].'"> '.$gene['nome'];
                            echo '</label>';
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
		<div class="form-group">
			<div class="col-sm-12 text-left">
				<input class="btn btn-primary btn-block" type="submit" value="Adicionar">
			</div>
		</div>
	</form>
</div>