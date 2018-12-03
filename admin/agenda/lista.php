<?php
	session_start();
	if (!isset($_SESSION['userid'])){
		header("location: http://$_SERVER[HTTP_HOST]"."/cmg/admin/login.php");
		die("");
	} else if ($_SESSION['useragenda'] != 1){
		die("");
	}

	ini_set("allow_url_fopen", 1);
	$url = "http://$_SERVER[HTTP_HOST]"."/cmg/admin/agenda/list.php";
	$json = json_decode(file_get_contents($url), true);
?>
<div class="text-center">
	<h2>AGENDA</h2>
</div>
<div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descricão</th>
                    <th>Data</th>
                    <th>Editar</th>
                    <th>Apagar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($json as $agenda) {
                        echo '<tr>
                                <td>';
                        echo $agenda['nome'];
                        echo '</td><td>';
                        echo $agenda['descricao'];
                        echo '</td><td>';
                        $date = new DateTime($agenda["data"]);
                        echo $date->format('d/m/Y');
                        echo '</td><td>';
                        echo "<form action='index_admin.php?link=55' method='post'>
                                <input type='hidden' name='nome' value='".$agenda['nome']."'>
                                <input type='hidden' name='descricao' value='".$agenda['descricao']."'>
                                <input type='hidden' name='data' value='".$agenda['data']."'>
                                <button class='btn btn-success' type='submit' name='id' value='".$agenda["id"]."'><span class='glyphicon glyphicon-pencil'></span></button>
                             </form>";
                        echo '</td><td>';
                        echo "<form action='agenda/delete.php' method='post'><button class='btn btn-danger' type='submit' name='id' value='".$agenda["id"]."'>
                                <span class='glyphicon glyphicon-remove'></span>
                                </button>
                                </form>";
                        echo '</td></tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
<a class="btn btn-warning" href="index_admin.php?link=53" type="button"><span class="glyphicon glyphicon-plus"></span></a><br/><br/>
<?php
	if(isset($_GET['edit'])) {
		if ($_GET['edit'] == 1){
			echo 'Agenda alterada com sucesso!';
		} else {
			echo 'Erro ao gravar a agenda';
		}
	}
	if(isset($_GET['delete'])) {
		if ($_GET['delete'] == 1){
			echo 'Agenda apagada com sucesso!';
		} else {
			echo 'Erro ao apagar a agenda';
		}
	}
	if(isset($_GET['add'])) {
		if ($_GET['add'] == 1){
			echo 'Item adicionado na agenda com sucesso!';
		} else {
			echo 'Erro ao gravar item na agenda';
		}
	}
?>