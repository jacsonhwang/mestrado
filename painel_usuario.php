<?php include 'header.php'; ?>
<div id="formularioLogin" class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">

			<div id="loginTitulo" class="page-header">
				<h1>Painel do Usu�rio</h1>
			</div>
			
			<?php
			if(isset($_SESSION["email"])) {
			?>
			
				<div class="col-lg-6 col-lg-offset-3">
				
				</div>
					
			<?php
			} else {
			?>
			
				<div class="col-lg-10 col-lg-offset-1">
					
			<?php 
					echo ERRO_LOGAR;
			}
			?>
			
				</div>
	</div>
</div>

<?php include 'footer.php'; ?>