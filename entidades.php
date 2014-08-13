<?php include 'header.php'; ?>
<div id="formularioLogin" class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">

			<div id="loginTitulo" class="page-header">
				<h1>Entidades</h1>
			</div>
			
			<ol class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li><a href="painel_admin.php">Painel administrativo</a></li>
				<li class="active">Entidades</li>
			</ol>
			
			<?php
			if(isset($_SESSION["emailAdmin"])) {
			?>
			
				<div class="alert alert-danger" role="alert" id="avisoEntidades">Não existem entidades cadastradas no sistema.</div>
			
				<p><button type="button" class="btn btn-primary" id="buttonCadastrarEntidade">Cadastrar</button></p>
			
				<div class="col-lg-12" id="divTabelaEntidades">
					<table class="table tablesorter" id="tabelaEntidades">
						<thead>
							<tr>
								<th>Nome</th>
								<th>Nome no Jogo</th>
								<th>Criado</th>
								<th class="text-center">Visualizar</th>
								<th class="text-center">Editar</th>
								<th class="text-center">Excluir</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Entidade_Pessoa</td>
								<td>Pessoa</td>
								<td>07/08/2014</td>
								<td class="text-center"><a href="visualizar_entidade.php"><img src="img/view-details.png" class="imagem"></a></td>
								<td class="text-center"><a href="editar_entidade.php"><img src="img/edit-gray.png" class="imagem"></a></td>
								<td class="text-center"><img src="img/deactivate.png" class="imagem excluirEntidade"></td>
							</tr>
							<tr>
								<td>Entidade_Produto</td>
								<td>Produto</td>
								<td>05/06/2014</td>
								<td class="text-center"><a href="visualizar_entidade.php"><img src="img/view-details.png" class="imagem"></a></td>
								<td class="text-center"><a href="editar_entidade.php"><img src="img/edit-gray.png" class="imagem"></a></td>
								<td class="text-center"><img src="img/deactivate.png" class="imagem excluirEntidade"></td>
							</tr>
							<tr>
								<td>Entidade_Animal</td>
								<td>Animal</td>
								<td>23/07/2014</td>
								<td class="text-center"><a href="visualizar_entidade.php"><img src="img/view-details.png" class="imagem"></a></td>
								<td class="text-center"><a href="editar_entidade.php"><img src="img/edit-gray.png" class="imagem"></a></td>
								<td class="text-center"><img src="img/deactivate.png" class="imagem excluirEntidade"></td>
							</tr>
						</tbody>
					</table>

					<?php include 'paginacao.php'; ?>

				</div>
					
			<?php
			} else {
			?>
			
				<div class="col-lg-10 col-lg-offset-1">
					<?php echo ERRO_LOGAR; ?>
				</div>
				
			<?php
			}
			?>
			
			<div class="col-lg-12">
				<a class="btn btn-info" href="painel_admin.php" role="button" style="float: left;">Voltar</a>
			</div>
			
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>