<?php include 'header.php'; ?>
<?php include_once 'controller/entidadeControle.php'; ?>
<?php include_once 'controller/baseControle.php'; ?>
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
			
				<form class="form-horizontal" role="form" action="controller/cadastroBDControle.php" method="POST" id="formCadastroBaseDeDado">
					<div class="form-group">
						<label for="inputNome" class="col-sm-2 control-label">Nome</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="inputNome" name="inputNome" value='<?php echo $_SESSION['inputNome'];?>'>
						</div>
					</div>
					<div class="form-group">
						<label for="inputNomeNoJogo" class="col-sm-2 control-label">Nome no Jogo</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="inputNomeNoJogo" name="inputNomeNoJogo" value='<?php echo $_SESSION['inputNomeNoJogo'];?>'>
						</div>
					</div>
					<div class="form-group">
						<label for="selectEntidade" class="col-sm-2 control-label">Entidade</label>
						<div class="col-sm-9">
							<select class="form-control" id="selectEntidade" name="selectEntidade">
								<option selected value='<?php echo $_SESSION['selectEntidade'];?>'><?php echo $_SESSION['selectEntidade'];?></option>
									<?php
							
										$entidadesArray = listarEntidade();
									
										foreach ($entidadesArray as $entidade) {
											if($entidade->getNome() != $_SESSION['selectEntidade']){
									?>
											
											<option value="<?php echo $entidade->getNome(); ?>"><?php echo $entidade->getNome();?></option>
									<?php
											}
										}
									?>								
							</select>
						</div>
					</div>					
					
					<div class="form-group">
		    			<label for="inputArquivoBaseDados" class="col-sm-2 control-label">Caminho da Base de Dados</label>
		    			<div class="col-sm-9">
							<p class="text-center"><strong><?php echo $_SESSION['nomeArquivo'];?></strong></p>	
							
						</div>
		  			</div>
		  			
		  			
		  			<div class="col-lg-11 table-responsive fixed-height" style="border: 1px solid black">
		  			
		  				<p class="text-center"><strong>Prévia</strong></p>
		  				
							<table class="table tablesorter" id="tabelaPrevia">
								<thead>
									<tr>
							<?php
														
									$arquivo = recuperaDadosArquivo($_SESSION['caminho'], ';');
									
									$campos = $arquivo['campos'];
									$registros = $arquivo['registros'];
									
									foreach ($campos as $campo){
							?>		
						
										<th><?php echo $campo; ?></th>
								
																				
							<?php   }?>
										
									</tr>
								</thead>
								<tbody>
									
									<?php 						
									
											foreach ($registros as $registro){
									?>
									
										<tr>	
											<?php 		
												for($c = 0; $c < count($registro); $c++){
												//foreach ($registro as $dado){     
											?>
													<td><?php echo $registro[$c];?></td>
											<?php
												}
											?>
										</tr>
										
									<?php   } ?>
							</tbody>
						</table>
					</div>
		  			
		  			
		  			
					<div class="col-lg-11 table-responsive" style="border: 1px solid black; margin-top: 20px">
					
						<p class="text-center"><strong>Selecionar atributos</strong></p>
						
						<?php
							$atributos = $campos;
						?>

						<table class="table tablesorter" id="tabelaSelecionarAtributos">
							<thead>
								<tr>
									<th class="text-center">Adicionar</th>
									<th>Coluna</th>
									<th class="text-center">Identificador</th>
									<th>Nome no Jogo</th>
									<th>Descrição no Jogo</th>
								</tr>
							</thead>
							<tbody>
							
								<?php
								foreach($atributos as $atributo) {
								?>
									
									<tr>
										<td class="text-center"><input type="checkbox" class="adicionarAtributo" name="campos[]" value="<?php echo $atributo;?>"></td>
										<td><?php echo $atributo; ?></td>
										<td class="text-center"><input type="checkbox" class="id" disabled></td>
										<td><input type="text" class="form-control" name="nomeNoJogo[]" disabled></td>
										<td><input type="text" class="form-control" name="descricaoNoJogo[]" disabled></td>
									</tr>
								
								<?php 	
								}
								?>
								
							</tbody>
						</table>
					</div>
					<div class="clearfix"></div>
					<p class="text-muted">* Caso não exista um identificador, o sistema criará um automaticamente.</p>
					<div class="form-group">
						<div class="col-sm-11">
							<button type="submit" class="btn btn-success" name="buttonCadastrarBD" style="float: right">Cadastrar</button>
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

