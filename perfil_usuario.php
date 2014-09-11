<?php include_once __DIR__ . '/header.php'; ?>

<div id="formularioLogin" class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">

			<div id="loginTitulo" class="page-header">
				<h1>Configurações</h1>
			</div>
			
			<ol class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li class="active">Configurações</li>
			</ol>
			
			<?php
			session_start();
			
			if(isset($_SESSION["nome"])) {
			?>
			
				<div class="col-lg-6 col-lg-offset-3">
					<a class="btn btn-default btn-lg btn-block" href="alterar-dados.php" role="button" style="float: left;">Alterar dados cadastrais</a>
					<a class="btn btn-default btn-lg btn-block" href="alterar-senha.php" role="button" style="float: left;">Alterar senha</a>
				</div>
				
				<div class="clearfix"></div>
				
				<a class="btn btn-info" href="painel_usuario.php" role="button" style="float: left;">Voltar</a>
			
			<?php
			} else {
			?>
			
			<div class="alert alert-danger" role="alert"><b>Erro!</b> Favor efetuar o login.</div>
			
			<a href="index.php">Voltar para página inicial</a>
			
			<?php } ?>
		</div>
	</div>
</div>
<?php include_once __DIR__ . '/footer.php'; ?>