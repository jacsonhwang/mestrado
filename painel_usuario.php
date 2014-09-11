<?php
include_once __DIR__ . '/header.php';
include_once __DIR__ . '/inc/constantes.php';
include_once __DIR__ . '/inc/dBug.php';
include_once __DIR__ . '/inc/erro.php';
include_once __DIR__ . '/dao/EntidadeDAO.php';
include_once __DIR__ . '/dao/UsuarioDAO.php';
?>
	
<div id="formularioLogin" class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">

			<div id="loginTitulo" class="page-header">
				<h1>Painel do Usuário</h1>
			</div>
			
			<?php	
			if(isset($_SESSION["email"])) {
				$entidadeDAO = new EntidadeDAO();
				$usuarioDAO = new UsuarioDAO();
			
				$usuario = $usuarioDAO->recuperarObjetoUsuarioPorEmail($_SESSION["email"]);
			
				$arrayEntidade = $entidadeDAO->recuperarArrayEntidadePorUsuario($usuario);
			?>
			
				<div class="col-lg-8 col-lg-offset-2">
					<!--
					<div class="row">
 						<div class="col-lg-6">
							<button type="button" class="btn btn-default btn-lg btn-block" id="buttonJogoTeste">Jogo Teste</button><br>
						</div>
					</div>
					-->
					
					<div class="row">
						<div class="col-lg-6">
							<button type="button" class="btn btn-default btn-lg btn-block" id="buttonUsuarios">Tutorial</button>
						</div>
						<div class="col-lg-6">
							<button type="button" class="btn btn-default btn-lg btn-block" id="buttonUsuarios">Animal</button><br>
						</div>
					</div>
					
					<form action="jogada_teste.php" method="POST">
						<div class="row">
							<?php foreach($arrayEntidade as $key => $entidade) {?>
							
								<div class="col-lg-6">
									<button type="submit" class="btn btn-default btn-lg btn-block" name="entidade_id" id="button<?php echo $entidade->getNomeJogo()?>" value="<?php echo $entidade->getId()?>"><?php echo $entidade->getNomeJogo()?></button>
								</div>						
							
							<?php }?>
						</div>
					</form>
				</div>
			<?php
			} else {
				erro(ERRO_LOGAR2);
			}
			?>	
		</div>
	</div>
</div>

<?php include_once __DIR__ . '/footer.php'; ?>