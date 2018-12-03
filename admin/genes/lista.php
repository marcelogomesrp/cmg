<?php
	session_start();
	if (!isset($_SESSION['userid'])){
		header("location: http://$_SERVER[HTTP_HOST]"."/cmg/admin/login.php");
		die("");
	} else if ($_SESSION['usergenes'] != 1){
		die("");
	}
	ini_set("allow_url_fopen", 1);
	$url = "http://$_SERVER[HTTP_HOST]"."/cmg/admin/genes/list.php";
	$json = json_decode(file_get_contents($url), true);
?>
<div class="text-center">
	<h2>GENES</h2>
</div>
<div class="container-fluid">
    <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Link</th>
                        <th>Data de Modificação</th>
                        <th>Editar</th>
                        <th>Apagar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($json as $genes) {
                            echo '<tr>
                                    <td>';
                            echo $genes['nome'];
                            echo '</td><td>';
                            echo $genes['link'];
                            echo '</td><td>';
                            $date = new DateTime($genes["data_alteracao"]);
                            echo $date->format('d/m/Y');
                            echo '</td><td>';
                            echo "<form action='index_admin.php?link=85' method='post'>
                                    <input type='hidden' name='nome' value='".$genes['nome']."'>
                                    <input type='hidden' name='link' value='".$genes['link']."'>
                                    <button class='btn btn-success' type='submit' name='id' value='".$genes["id"]."'><span class='glyphicon glyphicon-pencil'></span></button>
                                 </form>";
                            echo '</td><td>';
                            echo "<form action='genes/delete.php' method='post'><button class='btn btn-danger' type='submit' name='id' value='".$genes["id"]."'>
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
<a class="btn btn-warning" href="index_admin.php?link=83" type="button"><span class="glyphicon glyphicon-plus"></span></a>
<a class="btn btn-warning" href="index_admin.php?link=87" type="button"><span class="glyphicon glyphicon-file"></span></a>
<br/><br/>
<?php
	if(isset($_GET['edit'])) {
		if ($_GET['edit'] == 1){
			echo 'Gene alterado com sucesso!';
		} else {
			echo 'Erro ao alterar o gene';
		}
	}
	if(isset($_GET['delete'])) {
		if ($_GET['delete'] == 1){
			echo 'Gene apagado com sucesso!';
		} else {
			echo 'Erro ao apagar o gene';
		}
	}
	if(isset($_GET['add'])) {
		if ($_GET['add'] == 1){
			echo 'Gene adicionado com sucesso!';
		}
		else {
			echo 'Erro ao gravar o gene';
		}
	}
?>