<?php include_once __DIR__ . '/header.php'; ?>

<div id="formularioLogin" class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">

			<div id="loginTitulo" class="page-header">
				<h1>Qualidade</h1>
			</div>
			
			<ol class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li><a href="painel_admin.php">Painel administrativo</a></li>
				<li><a href="entidades.php">Entidades</a></li>
				<li class="active">Qualidade</li>
			</ol>
			
			<?php
			if(isset($_SESSION["emailAdmin"])) {
			?>
			
				<form class="form-horizontal" role="form" action="controller/cadastroEntidadeControle.php" method="POST">
					<div class="form-group">
						<label for="inputNome" class="col-sm-4 control-label">Qualidade (Métrica 1)</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="inputNome" name="inputNome">
						</div>
					</div>
					<div class="form-group">
						<label for="inputNomeNoJogo" class="col-sm-4 control-label">Qualidade (Métrica 2)</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="inputNomeNoJogo" name="inputNomeNoJogo">
						</div>
					</div>
					
					<div class="col-lg-10 col-lg-offset-1" style="border: 1px solid black; margin-bottom: 20px">
						
						<table class="table tablesorter">
							<thead>
								<tr>
									<th>Usuário</th>
									<th class="text-center">Qualidade (Métrica 1)</th>
									<th class="text-center">Qualidade (Métrica 2)</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Lucas Matias</td>
									<td class="text-center">95%</td>
									<td class="text-center">90%</td>
								</tr>
								<tr>
									<td>Cassiano Rosa</td>
									<td class="text-center">80%</td>
									<td class="text-center">85%</td>
								</tr>
								<tr>
									<td>Rodolpho Gomes</td>
									<td class="text-center">70%</td>
									<td class="text-center">65%</td>
								</tr>
								<tr>
									<td>Karine Arruda</td>
									<td class="text-center">75%</td>
									<td class="text-center">70%</td>
								</tr>
								<tr>
									<td>Michel Braida</td>
									<td class="text-center">85%</td>
									<td class="text-center">92%</td>
								</tr>
							</tbody>
						</table>		
					</div>
						
				</form>

			<div class="col-sm-11">
				<a class="btn btn-info" href="entidades.php" role="button" style="float: left;">Voltar</a>
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
			
		</div>
	</div>
</div>
<?php include_once __DIR__ . '/footer.php'; ?>