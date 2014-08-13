<?php include 'header.php'; ?>
<?php include 'controller/usuariosControle.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">

			<div class="page-header">
				<h2>Visualizar Entidade</h2>
			</div>
			
			<ol class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li><a href="painel_admin.php">Painel administrativo</a></li>
				<li><a href="entidade.php">Entidade</a></li>
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
						<label class="col-sm-3 control-label">Descrição no Jogo</label>
						<div class="col-sm-8">
							<p class="form-control-static text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent faucibus justo et pretium tincidunt. Curabitur id turpis ut urna rhoncus tempor at et lacus. Proin bibendum massa lorem, et elementum tortor cursus eu. Suspendisse at consectetur sem. Proin commodo nisl eget luctus rhoncus. Morbi faucibus nulla ut purus tempus pretium. Sed tristique nisl in felis fringilla rutrum. Fusce ultricies gravida nisi, sed vehicula mauris tempus vitae. Duis faucibus nibh at erat hendrerit congue. Donec ullamcorper nunc id euismod molestie. Phasellus auctor commodo mi a malesuada. Sed bibendum nulla at tincidunt imperdiet.</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Criado em</label>
						<div class="col-sm-8">
							<p class="form-control-static">13/08/2014</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Base de dados associadas</label>
						<div class="col-sm-8">
							<ul class="list-unstyled form-control-static">
								<li>Pessoa_Parte2</li>
							</ul>
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
				<a class="btn btn-info" href="entidades.php" role="button">Voltar</a>
			</div>
			
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>