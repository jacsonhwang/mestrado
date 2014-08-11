<?php include 'header.php'; ?>
<div id="formularioLogin" class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">

			<div id="loginTitulo" class="page-header">
				<h1>Painel administrativo</h1>
			</div>
			
			<?php
			if(isset($_SESSION["emailAdmin"])) {
			?>
			
				<div class="col-lg-6 col-lg-offset-3">
					<button type="button" class="btn btn-default btn-lg btn-block" id="buttonUsuarios">Usuários</button>
					<button type="button" class="btn btn-default btn-lg btn-block" id="buttonTarefa">Tarefa</button>
					<button type="button" class="btn btn-default btn-lg btn-block" id="buttonRodada">Rodada</button>
					<button type="button" class="btn btn-default btn-lg btn-block" id="buttonEntidades">Entidades</button>
					<button type="button" class="btn btn-default btn-lg btn-block" id="buttonBaseDeDados">Base de Dados</button>
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