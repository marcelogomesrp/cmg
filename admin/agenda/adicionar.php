<div class="container-fluid">
	<div class="text-center">
		<h2>ADICIONAR AGENDA</h2>
	</div>
	<form class="form-horizontal" action="agenda/add.php" method="post" >
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
			<label class="control-label col-sm-2" for="data">Data:</label>
			<div class="col-sm-10">
				<div class="input-group date">
				<input type="text" class="form-control" name="data" id="datepicker">
					<div class="input-group-addon">
						<span class="glyphicon glyphicon-th"></span>
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