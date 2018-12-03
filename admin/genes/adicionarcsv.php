<div class="container">
	<div class="text-center">
		<h2>ADICIONAR GENE - CSV</h2>
	</div>
	<form class="form-horizontal" enctype="multipart/form-data" action="genes/uploadcsv.php" method="post" >
		<div class="form-group">
			<label class="control-label col-sm-2" for="name">Arquivo:</label>
			<div class="col-sm-10">
				<input class="form-control" type="file" name="file" id="file">
			</div>
		</div>
		<center><a href="genes/Default.csv">Baixar arquivo padrão</a></center><br/><br/>
		<div class="form-group">
			<div class="col-sm-12">
				<input class="btn btn-primary btn-block" type="submit" value="Enviar">
			</div>
		</div>
	</form>
</div>