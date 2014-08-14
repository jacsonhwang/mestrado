<?php include 'header.php'; ?>
<div id="formularioLogin" class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">

			<div id="loginTitulo" class="page-header">
				<h1>Cadastrar Base de Dado</h1>
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
			
				<form class="form-horizontal" role="form" action="controller/editarBDControle.php" method="POST" id="formCadastroBaseDeDado">
					<div class="form-group">
						<label for="inputNome" class="col-sm-2 control-label">Nome</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="inputNome" name="inputNome" value="Pessoa_Parte1">
						</div>
					</div>
					<div class="form-group">
						<label for="inputNomeNoJogo" class="col-sm-2 control-label">Nome no Jogo</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="inputNomeNoJogo" name="inputNomeNoJogo" value="Caixa Pessoa - A">
						</div>
					</div>
					<div class="form-group">
		    			<label for="inputArquivoBaseDados" class="col-sm-2 control-label">Caminho da Base de Dados</label>
		    			<div class="col-sm-9">
							<input type="file" id="inputArquivoBaseDados">
						</div>
		  			</div>
		  			
		  			<div class="col-lg-11 table-responsive fixed-height" style="border: 1px solid black">
		  			
		  				<p class="text-center"><strong>Prévia</strong></p>
		  				
						<table class="table tablesorter" id="tabelaPrevia">
							<thead>
								<tr>
									<th>ID</th>
									<th>Nome</th>
									<th>Endereço</th>
									<th>CPF</th>
									<th>Profissão</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td>Lucas Matias</td>
									<td>Rua Aritiba</td>
									<td>242.135.235-3</td>
									<td>Programador</td>
								</tr>
								<tr>
									<td>2</td>
									<td>Ana Luz</td>
									<td>Rua Maria Silva</td>
									<td>545.235.214-22</td>
									<td>PM</td>
								</tr>
								<tr>
									<td>3</td>
									<td>Marcos Gomes</td>
									<td>Av. Brasil</td>
									<td>123.244.561-12</td>
									<td>Faxineiro</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="col-lg-11 table-responsive" style="border: 1px solid black; margin-top: 20px">
					
						<p class="text-center"><strong>Selecionar atributos</strong></p>
						
						<?php
							$atributos = array("ID", "Nome", "Endereço", "CPF", "Profissão");
						?>
						
						<table class="table tablesorter" id="tabelaSelecionarAtributos">
							<thead>
								<tr>
									<th class="text-center">Adicionar</th>
									<th>Coluna</th>
									<th class="text-center">Identificador</th>
									<th>Nome no Jogo</th>
									<th>Descrição do Jogo</th>
								</tr>
							</thead>
							<tbody>
							
								<?php
								foreach($atributos as $atributo) {
								?>
									
									<tr>
										<td class="text-center"><input type="checkbox" class="adicionarAtributo"></td>
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
							<button type="submit" class="btn btn-success" name="buttonEditarBD" style="float: right">Salvar alterações</button>
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