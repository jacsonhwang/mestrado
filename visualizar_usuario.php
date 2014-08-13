<?php include 'header.php'; ?>
<?php include 'controller/usuariosControle.php'; ?>

<div id="formularioLogin" class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">

			<div class="page-header">
				<h2>Visualizar Usuário</h2>
			</div>
			
			<ol class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li><a href="painel_admin.php">Painel administrativo</a></li>
				<li><a href="usuarios.php">Usuários</a></li>
				<li class="active">Visualizar</li>
			</ol>
			
			<?php
			session_start();
			
			if(isset($_SESSION["emailAdmin"])) {
				if (isset($_SESSION["erroAlteracao"])) {
			?>
					<div class="alert alert-danger" role="alert"><?php echo $_SESSION["erroAlteracao"]; ?></div>
			<?php
				}
			?>
			
			<?php
				if(isset($_GET["email"])) {
					$email = $_GET["email"];
					
					$usuario = recuperarUsuario($email);
					
					guardarUsuarioSessao($usuario);
				}
			?>
				<div class="col-lg-8 col-lg-offset-2">
					<div class="row">
						<div class="col-md-5"><strong>Nome</strong></div>
						<div class="col-md-7"><?php echo $usuario->getNome(); ?></div>
					</div>
					<div class="row">
						<div class="col-md-5"><strong>Email</strong></div>
						<div class="col-md-7"><?php echo $usuario->getEmail(); ?></div>
					</div>
					<div class="row">
						<div class="col-md-5"><strong>Idade</strong></div>
						<div class="col-md-7"><?php echo $usuario->getIdade(); ?></div>
					</div>
					<div class="row">
						<div class="col-md-5"><strong>Gênero</strong></div>
						<div class="col-md-7"><?php echo $usuario->getGeneroFormatado(); ?></div>
					</div>
					<div class="row">
						<div class="col-md-5"><strong>Escolaridade</strong></div>
						<div class="col-md-7"><?php echo $usuario->getEscolaridadeFormatado(); ?></div>
					</div>
					<div class="row">
						<div class="col-md-5"><strong>Formação acadêmica</strong></div>
						<div class="col-md-7"><?php echo $usuario->getFormacaoAcademica(); ?></div>
					</div>
					
					<p class="text-center" style="margin-top: 10px;"><strong>Participação em sistemas crowdsourcing</strong></p>
					
					<div class="row">
						<div class="col-md-5"><strong>Marketplace</strong></div>
						<div class="col-md-7"><?php echo $usuario->getParticipacaoFormatado($usuario->getMarketplace()); ?></div>
					</div>
					<div class="row">
						<div class="col-md-5"><strong>Science</strong></div>
						<div class="col-md-7"><?php echo $usuario->getParticipacaoFormatado($usuario->getScience()); ?></div>
					</div>
					<div class="row">
						<div class="col-md-5"><strong>Gaming</strong></div>
						<div class="col-md-7"><?php echo $usuario->getParticipacaoFormatado($usuario->getGaming()); ?></div>
					</div>
				</div>

			<?php
			} else {
			?>
			
				<div class="col-lg-10 col-lg-offset-1">
					<?php echo ERRO_LOGAR; ?>
				</div>
				
			<?php
			}
			?>
			
			<div class="col-lg-12" style="padding-top: 20px;">
				<a class="btn btn-info" href="usuarios.php" role="button">Voltar</a>
			</div>
			
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>