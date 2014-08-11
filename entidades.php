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
			
				<p><button type="button" class="btn btn-primary" id="buttonCadastrarEntidade">Cadastrar</button></p>
			
				<div class="col-lg-12">
					<table class="table tablesorter" id="tabelaEntidades">
						<thead>
							<tr>
								<th>Nome Interno</th>
								<th>Nome Externo</th>
								<th>Criado</th>
								<th>Visualizar</th>
								<th>Editar</th>
								<th>Excluir</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Entidade_Pessoa</td>
								<td>Pessoa</td>
								<td>07/08/2014</td>
								<td><input type="checkbox" /></td>
								<td><input type="checkbox" /></td>
								<td><input type="checkbox" /></td>
							</tr>
							<tr>
								<td>Entidade_Produto</td>
								<td>Produto</td>
								<td>05/06/2014</td>
								<td><input type="checkbox" /></td>
								<td><input type="checkbox" /></td>
								<td><input type="checkbox" /></td>
							</tr>
							<tr>
								<td>Entidade_Animal</td>
								<td>Animal</td>
								<td>23/07/2014</td>
								<td><input type="checkbox" /></td>
								<td><input type="checkbox" /></td>
								<td><input type="checkbox" /></td>
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
			
			<div class="col-lg-12" style="padding-top: 20px;">
				<a href="javascript:history.go(-1)">Voltar</a>
			</div>
			
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>