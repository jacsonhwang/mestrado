<?php include 'header.php'; ?>
<?php include_once("controller/usuariosControle.php"); ?>

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
			
				<div class="col-lg-12">
					<table class="table tablesorter" id="tabelaUsuarios">
						<thead>
							<tr>
								<th>Nome</th>
								<th>E-mail</th>
								<th>Visualizar</th>
								<th>Editar</th>
								<th>Excluir</th>
							</tr>
						</thead>
						<tbody>
							<?php
							
							$usuariosArray = listarUsuarios();
							
							foreach ($usuariosArray as $usuario) {
							?>
								<tr>
									<td><?php echo $usuario->getNome(); ?></td>
									<td class="email"><?php echo $usuario->getEmail(); ?></td>
									<td><input type="image" src="img/view-details.png" class="imagem" /></td>
									<td><a href="editar_usuario.php?email=<?php echo $usuario->getEmail(); ?>"><img src="img/edit-gray.png" class="imagem"></a></td>
									<td><input type="image" src="img/trash-gray.png" value="submit" class="imagem" /></td>
								</tr>
							
							<?php
							}
							?>
						</tbody>
					</table>

					<?php include 'paginacao.php'; ?>

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
				<a href="javascript:history.go(-1)">Voltar</a>
			</div>
			
			
		</div>
	</div>
</div>

<?php include 'footer.php'; ?>