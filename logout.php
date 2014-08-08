<div id="formularioLogin" class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">

			<div id="loginTitulo" class="page-header">
				<h1>Logout</h1>
			</div>
			
			<?php
				session_start();
				if(isset($_SESSION)) {
					session_destroy();
				}
			?>
			
			<div class="alert alert-success" role="alert">A sessão foi finalizada.</div>
			
			<a href="index.php">Voltar para página inicial</a>
		</div>
	</div>
</div>
<?php include 'header.php'; ?>
<?php include 'footer.php'; ?>