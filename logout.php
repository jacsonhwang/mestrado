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
			
			<div class="alert alert-success" role="alert">
				A sessão foi finalizada. Aguarde o redirecionamento.
			</div>
			
			<?php
			
			header('Refresh: 1; URL=index.php');
			
			?>
		</div>
	</div>
</div>
<?php include_once __DIR__ . '/header.php'; ?>
<?php include_once __DIR__ . '/footer.php'; ?>