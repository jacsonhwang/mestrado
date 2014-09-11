<?php
include_once __DIR__ . '/header.php';
include_once __DIR__ . '/controller/entidadeControle.php';
?>

<div id="formularioLogin" class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">

			<div id="loginTitulo" class="page-header">
				<h1>Entidades</h1>
			</div>
			
			<ol class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li><a href="painel_admin.php">Painel administrativo</a></li>
				<li class="active">Entidades</li>
			</ol>
			
			<?php
			if(isset($_SESSION["emailAdmin"])) {
			?>
			
				<div class="alert alert-danger" role="alert" id="avisoEntidades">Não existem entidades cadastradas no sistema.</div>
			
				<button type="button" class="btn btn-primary" id="buttonCadastrarEntidade">Cadastrar</button>
				<button type="button" class="btn btn-primary" id="buttonVisualizarQualidade">Visualizar qualidade</button>
			
				<div class="col-lg-12" id="divTabelaEntidades">
					<table class="table tablesorter" id="tabelaEntidades">
						<thead>
							<tr>
								<th>Nome</th>
								<th>Nome no Jogo</th>								
								<th class="text-center">Visualizar</th>
								<th class="text-center">Editar</th>
								<th class="text-center">Excluir</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$entidades = listarEntidade();
								
								foreach ($entidades as $entidade){
							?>
									<tr>
										<td><?php echo $entidade->getNome();?></td>
										<td><?php echo $entidade->getNomeJogo();?></td>
										
										<td class="text-center"><a href="visualizar_entidade.php?idEntidade=<?php echo $entidade->getId(); ?>"><img src="img/view-details.png" class="imagem"></a></td>
										<td class="text-center"><a href="editar_entidade.php?idEntidade=<?php echo $entidade->getId(); ?>"><img src="img/edit-gray.png" class="imagem"></a></td>
										<td class="text-center"><a href="controller/excluirEntidadeControle.php?idEntidade=<?php echo $entidade->getId(); ?>"><img src="img/deactivate.png" class="imagem excluirEntidade"></a></td>
										
										
									</tr>
									
							<?php }?>
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