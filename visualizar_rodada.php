<?php include 'header.php'; ?>
<?php include 'controller/usuariosControle.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">

			<div class="page-header">
				<h2>Visualizar Rodada</h2>
			</div>
			
			<ol class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li><a href="painel_admin.php">Painel administrativo</a></li>
				<li><a href="rodada.php">Rodada</a></li>
				<li class="active">Visualizar</li>
			</ol>
			
			<?php
			session_start();
			
			if(isset($_SESSION["emailAdmin"])) {
			?>

				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label class="col-sm-6 control-label">Nome</label>
						<div class="col-sm-6">
							<p class="form-control-static">Rodada1</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-6 control-label">Entidade</label>
						<div class="col-sm-6">
							<p class="form-control-static">Pessoa</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-6 control-label">Início</label>
						<div class="col-sm-6">
							<p class="form-control-static">13/08/2014</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-6 control-label">Fim</label>
						<div class="col-sm-6">
							<p class="form-control-static">30/08/2014</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-6 control-label">Todos os usuários?</label>
						<div class="col-sm-6">
							<p class="form-control-static">Sim</p>
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
				<a class="btn btn-info" href="rodada.php" role="button">Voltar</a>
			</div>
			
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>