<?php include 'header.php'; ?>
<div id="formularioLogin" class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">

			<div class="page-header">
				<h1>Cadastrar Tarefa</h1>
			</div>
			
			<ol class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li><a href="painel_admin.php">Painel administrativo</a></li>
				<li><a href="tarefa.php">Tarefa</a></li>
				<li class="active">Cadastro</li>
			</ol>
			
			<?php
			if(isset($_SESSION["emailAdmin"])) {
			?>
			
				<form class="form-horizontal" role="form" action="controller/cadastroTarefaControle.php" method="POST" id="formCadastroTarefa">
					<div class="form-group">
						<label for="inputNome" class="col-sm-3 control-label">Nome</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="inputNome" name="inputNome">
						</div>
					</div>
					<div class="form-group">
						<label for="inputNome" class="col-sm-3 control-label">Rodada</label>
						<div class="col-sm-7">
							<select class="form-control" id="selectRodada" name="selectRodada">
								<option disabled selected></option>
								<option value="rodada1">Rodada1</option>
								<option value="rodada2">Rodada2</option>
								<option value="rodada3">Rodada3</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-9">
							<button type="submit" class="btn btn-primary" name="buttonCadastrar" id="buttonCadastrar">Cadastrar</button>
						</div>										
					</div>
				</form>
					
			<?php
			} else {
			?>
			
				<div class="col-lg-10 col-lg-offset-1">
					<?php echo ERRO_LOGAR; ?>
				</div>
				
			<?php
			}
			?>
			
			<div class="col-lg-12" style="padding-top: 20px;">
				<a href="javascript:history.go(-1)">Voltar</a>
			</div>
			
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>