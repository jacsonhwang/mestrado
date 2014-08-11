<?php include 'header.php'; ?>
<div id="formularioLogin" class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">

			<div id="loginTitulo" class="page-header">
				<h1>Cadastrar Entidade</h1>
			</div>
			
			<ol class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li><a href="painel_admin.php">Painel administrativo</a></li>
				<li><a href="entidades.php">Entidades</a></li>
				<li class="active">Cadastro</li>
			</ol>
			
			<?php
			if(isset($_SESSION["emailAdmin"])) {
			?>
			
				<form class="form-horizontal" role="form" action="controller/cadastroEntidadeControle.php" method="POST" id="formCadastroEntidade">
					<div class="form-group">
						<label for="inputNomeInterno" class="col-sm-2 control-label">Nome Interno</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputNomeInterno" name="inputNomeInterno">
						</div>
					</div>
					<div class="form-group">
						<label for="inputNomeExterno" class="col-sm-2 control-label">Nome Externo</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputNomeExterno" name="inputNomeExterno">
						</div>
					</div>
					<!-- <p><strong>Base de dados associadas</strong></p>
						<div class="col-lg-10 col-lg-offset-1">
							<table class="table tablesorter" id="tabelaBaseDeDadosAssociadas">
								<thead>
									<tr>
										<th>Nome</th>
										<th>Nome no Jogo</th>
										<th>Nome Arquivo</th>
										<th>Excluir</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Pessoa_Parte1</td>
										<td>Caixa Pessoa - A</td>
										<td>PessoaDB_A.csv</td>
										<td><input type="checkbox" /></td>
									</tr>
								</tbody>
							</table>		
						</div>
						<div class="clearfix"></div> -->
					<p><strong>Base de dados geral</strong></p>
					
					<div class="col-lg-10 col-lg-offset-1">
						<table class="table tablesorter" id="tabelaBaseDeDadosGeral">
							<thead>
								<tr>
									<th>Nome</th>
									<th>Nome no Jogo</th>
									<th>Nome Arquivo</th>
									<th>Associar</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Pessoa_Parte2</td>
									<td>Caixa Pessoa - B</td>
									<td>pessoa_base_2.csv</td>
									<td><input type="checkbox" /></td>
								</tr>
								<tr>
									<td>Pessoa_Parte2</td>
									<td>Caixa Pessoa - B</td>
									<td>pessoa_base_2.csv</td>
									<td><input type="checkbox" /></td>
								</tr>
								<tr>
									<td>Caixa_Animal_A</td>
									<td>Caixa Animal - A</td>
									<td>animal1.csv</td>
									<td><input type="checkbox" /></td>
								</tr>
							</tbody>
						</table>	
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-9">
							<button type="submit" class="btn btn-primary" name="buttonCadastrarEntidade" id="buttonCadastrarEntidade">Cadastrar</button>
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