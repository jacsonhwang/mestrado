<?php include 'header.php'; ?>
<?php include 'controller/usuariosControle.php'; ?>

<div id="formularioLogin" class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">

			<div class="page-header">
				<h2>Visualizar Usu�rio</h2>
			</div>
			
			<ol class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li><a href="painel_admin.php">Painel administrativo</a></li>
				<li><a href="usuarios.php">Usu�rios</a></li>
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
						<div class="col-md-5"><strong>G�nero</strong></div>
						<div class="col-md-7"><?php echo $usuario->getGeneroFormatado(); ?></div>
					</div>
					<div class="row">
						<div class="col-md-5"><strong>Escolaridade</strong></div>
						<div class="col-md-7"><?php echo $usuario->getEscolaridadeFormatado(); ?></div>
					</div>
					<div class="row">
						<div class="col-md-5"><strong>Forma��o acad�mica</strong></div>
						<div class="col-md-7"><?php echo $usuario->getFormacaoAcademica(); ?></div>
					</div>
					
					<p class="text-center" style="margin-top: 10px;"><strong>Participa��o em sistemas crowdsourcing</strong></p>
					
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

				<div class="col-lg-8 col-lg-offset-2" style="border: 1px solid black; margin-top: 20px">
	
					<table class="table tablesorter">
						<thead>
							<tr>
								<th>Entidade</th>
								<th class="text-center">Qualidade (M�trica 1)</th>
								<th class="text-center">Qualidade (M�trica 2)</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Rodada Teste</td>
								<td class="text-center">80%</td>
								<td class="text-center">86%</td>
							</tr>
							<tr>
								<td>Pessoa</td>
								<td class="text-center">60%</td>
								<td class="text-center">65%</td>
							</tr>
							<tr>
								<td>Animal</td>
								<td class="text-center">70%</td>
								<td class="text-center">69%</td>
							</tr>
						</tbody>
					</table>
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