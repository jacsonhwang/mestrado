<?php include 'header.php'; ?>
<?php include_once 'controller/entidadeControle.php'; ?>
<div id="formularioLogin" class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">

			<div id="loginTitulo" class="page-header">
				<h1>Cadastrar Base de Dados</h1>
			</div>
			
			<ol class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li><a href="painel_admin.php">Painel administrativo</a></li>
				<li><a href="base_de_dados.php">Base de Dados</a></li>
				<li class="active">Cadastro</li>
			</ol>
			
			<?php
			if(isset($_SESSION["emailAdmin"])) {
			?>
			
				<!-- <form class="form-horizontal" role="form" action="controller/cadastroBDControle.php" method="POST" id="formCadastroBaseDeDado"> -->
				<form class="form-horizontal" role="form" action="controller/upload.php" method="POST" id="formCadastroBaseDeDado" enctype='multipart/form-data'>
					<div class="form-group">
						<label for="inputNome" class="col-sm-2 control-label">Nome</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="inputNome" name="inputNome">
						</div>
					</div>
					<div class="form-group">
						<label for="inputNomeNoJogo" class="col-sm-2 control-label">Nome no Jogo</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="inputNomeNoJogo" name="inputNomeNoJogo">
						</div>
					</div>
					<div class="form-group">
						<label for="selectEntidade" class="col-sm-2 control-label">Entidade</label>
						<div class="col-sm-9">
							<select class="form-control" id="selectEntidade" name="selectEntidade">
								<option disabled selected>- Selecione -</option>
									<?php
							
										$entidadesArray = listarEntidade();
									
										foreach ($entidadesArray as $entidade) {
									?>
											
											<option value="<?php echo $entidade->getNome(); ?>"><?php echo $entidade->getNome();?></option>
									<?php
										}
									?>								
							</select>
						</div>
					</div>					
					
					<div class="form-group">
		    			<label for="inputArquivoBaseDados" class="col-sm-2 control-label">Caminho da Base de Dados</label>
		    			<div class="col-sm-9">
							<input type="file" name="file" >
							
							<button class="btn btn-success" name="buttonCadastrarBD" style="float: right" id="buttonCarregarArquivo">Carregar</button>
							
						</div>
		  			</div>
		  			
		  			
					<div class="form-group">
						<div class="col-sm-11">							
							<a class="btn btn-info" href="base_de_dados.php" role="button" style="float: left;">Voltar</a>
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
			
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>

