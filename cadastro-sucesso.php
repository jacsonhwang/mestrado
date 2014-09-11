<?php include_once __DIR__ . '/header.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">
		
			<div class="page-header">
				<h1>Cadastro</h1>
			</div>
			
			<div class="alert alert-success" role="alert">Cadastro realizado com sucesso.</div>
			
			<?php
			if(isset($_SESSION["email"])) {
			?>
			
				<a href="index.php">Voltar para página inicial</a>
				
			<?php
			} else if(isset($_SESSION["emailAdmin"])) {
			?>
			
				<a href="usuarios.php">Voltar</a>
			
			<?php
			}
			?>
			
		</div>
	</div>
</div>

<?php include_once __DIR__ . '/footer.php'; ?>