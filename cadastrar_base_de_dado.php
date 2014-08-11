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
			
				<form class="form-horizontal" role="form" action="controller/cadastroBaseDeDadoControle.php" method="POST" id="formCadastroBaseDeDado">
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
		    			<label for="inputArquivoBaseDados" class="col-sm-2 control-label">Caminho da Base de Dados</label>
		    			<div class="col-sm-9">
							<input type="file" id="inputArquivoBaseDados">
						</div>
		  			</div>
		  			<p class="text-center"><strong>Prévia</strong></p>
		  			<div class="col-lg-offset-2 col-lg-9">
						<table class="table tablesorter" id="tabelaPrevia">
							<thead>
								<tr>
									<th>ID</th>
									<th>Nome</th>
									<th>Endereço</th>
									<th>CPF</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td>Lucas Matias</td>
									<td>Rua Aritiba</td>
									<td>242.135.235-3</td>
								</tr>
								<tr>
									<td>1</td>
									<td>Lucas Matias</td>
									<td>Rua Aritiba</td>
									<td>242.135.235-3</td>
								</tr>
								<tr>
									<td>1</td>
									<td>Lucas Matias</td>
									<td>Rua Aritiba</td>
									<td>242.135.235-3</td>
								</tr>
								<tr>
									<td>1</td>
									<td>Lucas Matias</td>
									<td>Rua Aritiba</td>
									<td>242.135.235-3</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Possui identificador?</label>
						<div class="col-sm-10">
							<label class="radio-inline">
								<input type="radio" name="radioId" id="radioId" value="s">Sim
							</label>
							<label class="radio-inline">
								<input type="radio" name="radioId" id="radioId" value="n">Não
							</label>
						</div>
					</div>
					<div class="form-group">
						<label for="selectId" class="col-sm-2 control-label">Identificador</label>
						<div class="col-sm-9">
							<select class="form-control" id="selectId" name="selectId">
								<option disabled selected>- Selecione -</option>
								<option value="id">ID</option>
								<option value="nome">Nome</option>
								<option value="endereco">Endereço</option>
								<option value="cpf">CPF</option>
							</select>
						</div>
					</div>
					<p class="text-muted">* Caso não exista um identificador, o sistema criará um automaticamente.</p>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-9">
							<button type="submit" class="btn btn-primary" name="buttonCadastrarBaseDeDado" id="buttonCadastrarBaseDeDado">Cadastrar</button>
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