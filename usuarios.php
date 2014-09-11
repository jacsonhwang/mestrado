<?php
include_once __DIR__ . '/header.php';
include_once __DIR__ . '/controller/usuariosControle.php';
?>

<div id="formularioLogin" class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">

			<div id="loginTitulo" class="page-header">
				<h1>Usuários</h1>
			</div>

			<ol class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li><a href="painel_admin.php">Painel administrativo</a></li>
				<li class="active">Usuários</li>
			</ol>

			<?php
			if(isset($_SESSION["emailAdmin"])) {
			?>
			
				<p><button type="button" class="btn btn-primary" id="buttonCadastrarUsuario">Cadastrar</button></p>
			
				<div class="col-lg-12 table-responsive">
					<table class="table tablesorter" id="tabelaUsuarios">
						<thead>
							<tr>
								<th>Nome</th>
								<th>E-mail</th>
								<th class="text-center">Visualizar</th>
								<th class="text-center">Editar</th>
								<th class="text-center">Desativar</th>
							</tr>
						</thead>
						<tbody>
							<?php
							
							$usuariosArray = listarUsuarios();
							
							foreach ($usuariosArray as $usuario) {
							?>
								<tr <?php if($usuario->getSituacao() == 0) { echo " class='danger'"; } ?>>
									<td><?php echo $usuario->getNome(); ?></td>
									<td class="email"><?php echo $usuario->getEmail(); ?></td>
									<td class="text-center"><a href="visualizar_usuario.php?email=<?php echo $usuario->getEmail(); ?>"><input type="image" src="img/view-details.png" class="imagem" /></a></td>
									<td class="text-center"><a href="editar_usuario.php?email=<?php echo $usuario->getEmail(); ?>"><img src="img/edit-gray.png" class="imagem"></a></td>
									<?php
									if($usuario->getSituacao() == 1) {
									?>
										<td class="text-center"><a href="controller/alterarSituacaoUsuarioControle.php?email=<?php echo $usuario->getEmail(); ?>"><img src="img/deactivate.png" class="imagem"></a></td>
									<?php 
									} else {
									?>
										<td class="text-center"><a href="controller/alterarSituacaoUsuarioControle.php?email=<?php echo $usuario->getEmail(); ?>"><img src="img/activate.png" class="imagem"></a></td>
									<?php
									}
									?>
								</tr>
							
							<?php
							}
							?>
						</tbody>
					</table>

					<?php include_once __DIR__ . '/paginacao.php'; ?>

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
			
			<div class="col-lg-12">
				<a class="btn btn-info" href="painel_admin.php" role="button" style="float: left;">Voltar</a>
			</div>
			
			
		</div>
	</div>
</div>

<?php include_once __DIR__ . '/footer.php'; ?>