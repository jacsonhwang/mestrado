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
			
			<?php	
			if(isset($_SESSION["email"])) {
				$entidadeDAO = new EntidadeDAO();
				$usuarioDAO = new UsuarioDAO();
			
				$usuario = $usuarioDAO->recuperarObjetoUsuarioPorEmail($_SESSION["email"]);
			
				$arrayEntidade = $entidadeDAO->recuperarArrayEntidadePorUsuario($usuario);
			?>
				<div class="col-lg-8 col-lg-offset-2">
			<div id="loginTitulo" class="page-header">
				<h1>Painel do Usuário</h1>
			</div>

			<div class="panel panel-primary">
				<div class="panel-heading">Qualificação</div>
				<div class="panel-body">
					<div class="col-lg-8 col-lg-offset-2">
						<form action="jogo.php" method="POST">
							<div class="row" style="margin-bottom: 10px">
								<?php foreach($arrayEntidade as $key => $entidade) {?>
									<div class="col-lg-6">
										<button type="submit" class="btn btn-default btn-lg btn-block"
											name="entidade_id"
											id="button<?php echo $entidade->getNomeJogo()?>"
											value="<?php echo $entidade->getId()?>">
												<span class="glyphicon
												
												<?php if ( $entidade->getNomeJogo() == "Pessoa") {
													echo "glyphicon-user";
												} else if ( $entidade->getNomeJogo() == "Produto") {
													echo "glyphicon-hdd";
												}?>
													
												"></span>
												<?php echo $entidade->getNomeJogo()?>
											</button>
									</div>						
								<?php }?>
							</div>
						</form>
					</div>

				</div>
			</div>

			<div class="panel panel-info">
				<div class="panel-heading">Jogos</div>
				<div class="panel-body">

					<div class="col-lg-8 col-lg-offset-2">
						<form action="jogo.php" method="POST">
							<div class="row" style="margin-bottom: 10px">
								<?php foreach($arrayEntidade as $key => $entidade) {?>
									<div class="col-lg-6">
										<button type="submit" class="btn btn-default btn-lg btn-block"
											name="entidade_id"
											id="button<?php echo $entidade->getNomeJogo()?>"
											value="<?php echo $entidade->getId()?>">
												<span class="glyphicon
												
												<?php if ( $entidade->getNomeJogo() == "Pessoa") {
													echo "glyphicon-user";
												} else if ( $entidade->getNomeJogo() == "Produto") {
													echo "glyphicon-hdd";
												}?>
													
												"></span>
												<?php echo $entidade->getNomeJogo()?>
											</button>
									</div>						
								<?php }?>
							</div>
						</form>
					</div>
				</div>
			</div>

			<div class="panel panel-success">
				<div class="panel-heading">Outros</div>
				<div class="panel-body">

					<div class="col-lg-8 col-lg-offset-2">
						<div class="row">
							<div class="col-lg-6">
								<button type="button" class="btn btn-default btn-lg btn-block" id="buttonTutorial">Tutorial</button>
							</div>
							<div class="col-lg-6"></div>
						</div>
					</div>
				</div>
			</div>
			
			<?php
			} else {
				erro("Erro", ERRO_LOGAR2, "index.php");
			}
			?>
	</div>
</div>

<?php include_once __DIR__ . '/footer.php'; ?>