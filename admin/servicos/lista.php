<?php
	session_start();
	if (!isset($_SESSION['userid'])){
		header("location: http://$_SERVER[HTTP_HOST]"."/cmg/admin/login.php");
		die("");
	} else if ($_SESSION['userservicos'] != 1){
		die("");
	}
	ini_set("allow_url_fopen", 1);
	$url = "http://$_SERVER[HTTP_HOST]"."/cmg/admin/servicos/list.php";
	$json = json_decode(file_get_contents($url), true);
?>
<div class="text-center">
	<h2>SERVIÇOS</h2>
</div>
<div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Missão</th>
                    <th>Cadastro de Amostra</th>
                    <th>Orientação de Coleta</th>
                    <th>Serviços</th>
                    <th>Institucional</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($json as $servicos) {
                        echo '<tr>
                                <td>';
                        echo $servicos['missao'];
                        echo '</td><td>';
                        echo $servicos['cadamostra'];
                        echo '</td><td>';
                        echo $servicos['orientcoleta'];
                        echo '</td><td>';
                        echo $servicos['servicos'];
                        echo '</td><td>';
                        echo $servicos['institucional'];
                        echo '</td><td>';
                        echo "<form action='index_admin.php?link=25' method='post'>
                                <input type='hidden' name='missao' value='".$servicos['missao']."'>
                                <input type='hidden' name='cadamostra' value='".$servicos['cadamostra']."'>
                                <input type='hidden' name='orientcoleta' value='".$servicos['orientcoleta']."'>
                                <input type='hidden' name='servicos' value='".$servicos['servicos']."'>
                                <input type='hidden' name='institucional' value='".$servicos['institucional']."'>
                                <button class='btn btn-success' type='submit' name='id' value='".$servicos["id"]."'><span class='glyphicon glyphicon-pencil'></span></button>
                             </form>";
                        echo '</td></tr>';
                        // echo "<td><form action='servicos/delete.php' method='post'><button class='btn btn-danger' type='submit' name='id' value='".$servicos["id"]."'>
                        // 		<span class='glyphicon glyphicon-remove'></span>
                        // 		</button>
                        // 		</form>";
                        // echo '</td></tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
<!-- <a class="btn btn-warning" href="index_admin.php?link=73" type="button"><span class="glyphicon glyphicon-plus"></span></a> -->
<br/><br/>
<?php
	if(isset($_GET['edit'])) {
		if ($_GET['edit'] == 1){
			echo 'Serviços alterados com sucesso!';
		} else {
			echo 'Erro ao alterar os serviços';
		}
	}
	if(isset($_GET['delete'])) {
		if ($_GET['delete'] == 1){
			echo 'Serviço apagado com sucesso!';
		} else {
			echo 'Erro ao apagar o serviço';
		}
	}
	if(isset($_GET['add'])) {
		if ($_GET['add'] == 1){
			echo 'Serviço adicionado com sucesso!';
		} else {
			echo 'Erro ao gravar o serviço';
		}
	}
?>