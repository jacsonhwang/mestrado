<?php include 'header.php'; ?>
<div id="formularioLogin" class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">

			<div id="loginTitulo" class="page-header">
				<h1>Painel do Usuário</h1>
			</div>
			
			<?php
			if(isset($_SESSION["email"])) {
			?>
			
				<div class="col-lg-8 col-lg-offset-2">

					<div class="row">
						<div class="col-lg-6">
							<button type="button" class="btn btn-default btn-lg btn-block" id="buttonUsuarios">Ranking</button>
						</div>
						<div class="col-lg-6">
							<button type="button" class="btn btn-default btn-lg btn-block" id="buttonJogoTeste">Jogo Teste</button><br>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<button type="button" class="btn btn-default btn-lg btn-block" id="buttonUsuarios">Nível</button>
						</div>
						<div class="col-lg-6">
							<button type="button" class="btn btn-default btn-lg btn-block" id="buttonUsuarios">Pessoa</button><br>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<button type="button" class="btn btn-default btn-lg btn-block" id="buttonUsuarios">Tutorial</button>
						</div>
						<div class="col-lg-6">
							<button type="button" class="btn btn-default btn-lg btn-block" id="buttonUsuarios">Animal</button><br>
						</div>
					</div>
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