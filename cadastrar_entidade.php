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
						<label for="inputNome" class="col-sm-3 control-label">Nome</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="inputNome" name="inputNome">
						</div>
					</div>
					<div class="form-group">
						<label for="inputNomeNoJogo" class="col-sm-3 control-label">Nome no Jogo</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="inputNomeNoJogo" name="inputNomeNoJogo">
						</div>
					</div>
					<div class="form-group">
						<label for="inputNomeExterno" class="col-sm-3 control-label">Descrição no Jogo</label>
						<div class="col-sm-7">
							<textarea class="form-control" rows="3" name="descricaoNoJogo" form="formCadastroEntidade"></textarea>
						</div>
					</div>
					
					<div class="col-lg-10 col-lg-offset-1" style="border: 1px solid black; margin-bottom: 20px" id="divTabelaBaseDeDadosAssociadas">
					
						<p class="text-center"><strong>Base de dados associadas</strong></p>
						
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
							
							</tbody>
						</table>		
					</div>
					<!-- 
					<div class="col-lg-10 col-lg-offset-1" style="border: 1px solid black">
						
						<p class="text-center"><strong>Base de dados geral</strong></p>
						
						<table class="table tablesorter" id="tabelaBaseDeDadosGeral">
							<thead>
								<tr>
									<th>Nome</th>
									<th>Nome no Jogo</th>
									<th>Nome Arquivo</th>
									<th class="text-center">Associar</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="nomeBD">Pessoa_Parte2</td>
									<td class="nomeNoJogo">Caixa Pessoa - B</td>
									<td class="nomeArquivo">pessoa_base_2.csv</td>
									<td class="text-center"><img src="img/activate.png" class="imagem associarBDEntidade"></td>
								</tr>
								<tr>
									<td class="nomeBD">Pessoa_Parte2</td>
									<td class="nomeNoJogo">Caixa Pessoa - B</td>
									<td class="nomeArquivo">pessoa_base_2.csv</td>
									<td class="text-center"><img src="img/activate.png" class="imagem associarBDEntidade"></td>
								</tr>
								<tr>
									<td class="nomeBD">Caixa_Animal_A</td>
									<td class="nomeNoJogo">Caixa Animal - A</td>
									<td class="nomeArquivo">animal1.csv</td>
									<td class="text-center"><img src="img/activate.png" class="imagem associarBDEntidade"></td>
								</tr>
							</tbody>
						</table>	
					</div>
					 -->
					<div class="form-group">
						<div class="col-sm-11" style="margin-top: 20px">
							<button type="submit" class="btn btn-success" name="buttonCadastrarEntidade" id="buttonCadastrarEntidade" style="float: right">Cadastrar</button>
							<a class="btn btn-info" href="entidades.php" role="button" style="float: left;">Voltar</a>
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