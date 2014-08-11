<?php include 'header.php'; ?>
<div id="formularioLogin" class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">

			<div id="loginTitulo" class="page-header">
				<h1>Rodada</h1>
			</div>
			
			<ol class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li><a href="painel_admin.php">Painel administrativo</a></li>
				<li class="active">Rodada</li>
			</ol>
			
			<?php
			if(isset($_SESSION["emailAdmin"])) {
			?>
			
				<p><button type="button" class="btn btn-primary" id="buttonCadastrarRodada">Cadastrar</button></p>
			
				<div class="col-lg-12">
					<table class="table tablesorter" id="tabelaRodadas">
						<thead>
							<tr>
								<th>Nome</th>
								<th>Criado em</th>
								<th>Visualizar</th>
								<th>Editar</th>
								<th>Excluir</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Rodada 1</td>
								<td>01/01/2014</td>
								<td><input type="checkbox" /></td>
								<td><input type="checkbox" /></td>
								<td><input type="checkbox" /></td>
							</tr>
							<tr>
								<td>Rodada 2</td>
								<td>01/01/2014</td>
								<td><input type="checkbox" /></td>
								<td><input type="checkbox" /></td>
								<td><input type="checkbox" /></td>
							</tr>
							<tr>
								<td>Rodada 3</td>
								<td>01/01/2014</td>
								<td><input type="checkbox" /></td>
								<td><input type="checkbox" /></td>
								<td><input type="checkbox" /></td>
							</tr>
							<tr>
								<td>Rodada 4</td>
								<td>01/01/2014</td>
								<td><input type="checkbox" /></td>
								<td><input type="checkbox" /></td>
								<td><input type="checkbox" /></td>
							</tr>
							<tr>
								<td>Rodada 5</td>
								<td>01/01/2014</td>
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