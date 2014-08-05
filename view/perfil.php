<?php include 'header.php'; ?>
<div id="formularioLogin" class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">

			<div id="loginTitulo" class="page-header">
				<h1>Perfil</h1>
			</div>
			
			<?php
			session_start();
			
			if(isset($_SESSION["nome"])) {
			?>
			
			<a href="alterar-dados.php">Alterar dados cadastrais</a><br />
			<a href="alterar-senha.php">Alterar senha</a>
			
			<?php
			} else {
			?>
			
			<div class="alert alert-danger" role="alert"><b>Erro!</b> Favor efetuar o login.</div>
			
			<a href="../index.php">Voltar para página inicial</a>
			
			<?php } ?>
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>