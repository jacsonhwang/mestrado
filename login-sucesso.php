<div class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">
		
			<div id="loginTitulo" class="page-header">
				<h1>Login</h1>
			</div>
			
			<div class="alert alert-success" role="alert">Login realizado com sucesso. Aguarde o redirecionamento.</div>
			
			<?php			
			session_start();
			
			if(isset($_SESSION["email"])) {
				header('Refresh: 1; URL=painel_usuario.php');
			}
			else if(isset($_SESSION["emailAdmin"])) {
				header('Refresh: 1; URL=painel_admin.php');
			}
			?>
			
		</div>
	</div>
</div>

<?php include 'header.php'; ?>
<?php include 'footer.php'; ?>