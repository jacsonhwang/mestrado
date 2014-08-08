<?php include 'header.php'; ?>
<div id="formularioLogin" class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">

			<div id="loginTitulo" class="page-header">
				<h1>Tarefa</h1>
			</div>
			
			<ol class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li><a href="painel_admin.php">Painel administrativo</a></li>
				<li class="active">Tarefa</li>
			</ol>
			
			<?php
			if(isset($_SESSION["emailAdmin"])) {
			?>
			
				<div class="col-lg-12">
					<table class="table tablesorter" id="tabelaUsuarios">
						<thead>
							<tr>
								<th>
									<input type="checkbox" />
								</th>
								<th>Nome</th>
								<th>Rodada</th>
								<th>Excluir</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><input type="checkbox" /></td>
								<td>Tarefa 1</td>
								<td>R1</td>
								<td><input type="checkbox" /></td>
							</tr>
							<tr>
								<td><input type="checkbox" /></td>
								<td>Tarefa 2</td>
								<td>R1</td>
								<td><input type="checkbox" /></td>
							</tr>
							<tr>
								<td><input type="checkbox" /></td>
								<td>Tarefa 3</td>
								<td>R1</td>
								<td><input type="checkbox" /></td>
							</tr>
							<tr>
								<td><input type="checkbox" /></td>
								<td>Tarefa 4</td>
								<td>R1</td>
								<td><input type="checkbox" /></td>
							</tr>
							<tr>
								<td><input type="checkbox" /></td>
								<td>Tarefa 5</td>
								<td>R1</td>
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