<?php include_once __DIR__ . '/header.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">
		
			<div id="loginTitulo" class="page-header">
				<h1>Cadastro</h1>
			</div>
			
			<div class="alert alert-danger" role="alert" id="erroCadastro">O e-mail inserido já está cadastrado no sistema.</div>
			
			<?php echo "oi " . $_GET["nome"]; ?>
			
			<a href="cadastro.php">Voltar</a>
			
		</div>
	</div>
</div>

<?php include_once __DIR__ . '/footer.php'; ?>