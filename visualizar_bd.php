<?php include 'header.php'; ?>
<?php include 'controller/usuariosControle.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">

			<div class="page-header">
				<h2>Visualizar Base de Dados</h2>
			</div>
			
			<ol class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li><a href="painel_admin.php">Painel administrativo</a></li>
				<li><a href="base_de_dados.php">Base de Dados</a></li>
				<li class="active">Visualizar</li>
			</ol>
			
			<?php
			session_start();
			
			if(isset($_SESSION["emailAdmin"])) {
			?>

				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label class="col-sm-3 control-label">Nome</label>
						<div class="col-sm-8">
							<p class="form-control-static">Entidade_Pessoa</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Nome no Jogo</label>
						<div class="col-sm-8">
							<p class="form-control-static">Pessoa</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Nome Arquivo</label>
						<div class="col-sm-8">
							<p class="form-control-static text-justify">PessoaDB_A.csv</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Criado</label>
						<div class="col-sm-8">
							<p class="form-control-static">07/08/2014</p>
						</div>
					</div>
					<div class="col-lg-11 table-responsive fixed-height" style="border: 1px solid black">
		  			
		  				<p class="text-center"><strong>Dados</strong></p>
		  				
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
				<a class="btn btn-info" href="base_de_dados.php" role="button">Voltar</a>
			</div>
			
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>