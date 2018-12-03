<?php
	session_start();
	if (!isset($_SESSION['userid'])){
		header("location: http://$_SERVER[HTTP_HOST]"."/cmg/admin/login.php");
		die("");
	} else if ($_SESSION['useranaliseseuexame'] != 1){
		die("");
	}
	ini_set("allow_url_fopen", 1);
	$url = "http://$_SERVER[HTTP_HOST]"."/cmg/admin/analiseseuexame/list.php";
	$json = json_decode(file_get_contents($url), true);
?>
<div class="text-center">
	<h2>ANALISE SEU EXAME</h2>
</div>
<div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Pedido de Exame Externo</th>
                    <th>Documentos</th>
                    <th>Serviço de Análise Genômica</th>
                    <th>Consultoria</th>
                    <th>Editar</th>
                    <!-- <th>Apagar</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($json as $analiseseuexame) {
                        echo '<tr>
                                <td>';
                        echo $analiseseuexame['pedidoexame'];
                        echo '</td><td>';
                        echo $analiseseuexame['documentos'];
                        echo '</td><td>';
                        echo $analiseseuexame['solicitacaoservico'];
                        echo '</td><td>';
                        echo $analiseseuexame['agendamentodeconsultoria'];
                        echo '</td><td>';
                        echo "<form action='index_admin.php?link=35' method='post'>
                                <input type='hidden' name='pedidoexame' value='".$analiseseuexame['pedidoexame']."'>
                                <input type='hidden' name='documentos' value='".$analiseseuexame['documentos']."'>
                                <input type='hidden' name='solicitacaoservico' value='".$analiseseuexame['solicitacaoservico']."'>
                                <input type='hidden' name='agendamentodeconsultoria' value='".$analiseseuexame['agendamentodeconsultoria']."'>
                                <button class='btn btn-success' type='submit' name='id' value='".$analiseseuexame["id"]."'><span class='glyphicon glyphicon-pencil'></span></button>
                             </form>";
                        echo '</td></tr>';
                        // echo "<td><form action='analiseseuexame/delete.php' method='post'><button class='btn btn-danger' type='submit' name='id' value='".$analiseseuexame["id"]."'>
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
<!-- <a class="btn btn-warning" href="index_admin.php?link=33" type="button"><span class="glyphicon glyphicon-plus"></span></a> -->
<br/><br/>
<?php
	if(isset($_GET['edit'])) {
		if ($_GET['edit'] == 1){
			echo 'Links alterados com sucesso!';
		} else {
			echo 'Erro ao alterar os links';
		}
	}
	if(isset($_GET['delete'])) {
		if ($_GET['delete'] == 1){
			echo 'Link apagado com sucesso!';
		} else {
			echo 'Erro ao apagar o link';
		}
	}
	if(isset($_GET['add'])) {
		if ($_GET['add'] == 1){
			echo 'Link adicionado com sucesso!';
		} else {
			echo 'Erro ao gravar o link';
		}
	}
?>