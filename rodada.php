<?php
include_once __DIR__ . '/header.php';
include_once __DIR__ . '/controller/rodadaControle.php'; 
include_once __DIR__ . '/model/Rodada.php';
include_once __DIR__ . '/model/Entidade.php';
?>

<div id="formularioLogin" class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">

			<div id="loginTitulo" class="page-header">
				<h1>Rodada</h1>
			</div>
			
			<ol class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li><a href="painel_admin.php">Painel administrativo</a></li>
				<li class="active">Rodada</li>
			</ol>
			
			<?php
			if(isset($_SESSION["emailAdmin"])) {
			?>
			
				<div class="alert alert-danger" role="alert" id="avisoRodadas">Não existem rodadas cadastradas no sistema.</div>
				
				<p><button type="button" class="btn btn-primary" id="buttonCadastrarRodada">Cadastrar</button></p>
			
				<div class="col-lg-12" id="divTabelaRodadas">
					<table class="table tablesorter" id="tabelaRodadas">
						<thead>
							<tr>
								<th>Nome</th>
								<th>Entidade</th>
		
								<th>Início</th>
								<th>Fim</th>
								<th class="text-center">Visualizar</th>
								<th class="text-center">Editar</th>
								<th class="text-center">Excluir</th>
							</tr>
						</thead>
						<tbody>
							<?php	
							$rodadaArray = listarRodada();
														
							foreach ($rodadaArray as $rodada) {								
							?>
								<tr>
									<td><?php echo $rodada->getNome(); ?></td>
									<td><?php echo $rodada->getEntidade()->getNome(); ?></td>
									<td><?php echo $rodada->getInicio(); ?></td>
									<td><?php echo $rodada->getFim(); ?></td>
																						
									<td class="text-center"><a href="visualizar_rodada.php?idRodada=<?php echo $rodada->getId(); ?>"><img src="img/view-details.png" class="imagem"></a></td>									
									<td class="text-center"><a href="editar_rodada.php?idRodada=<?php echo $rodada->getId(); ?>"><img src="img/edit-gray.png" class="imagem"></a></td>
									<td class="text-center"><a href="controller/excluirRodadaControle.php?idRodada=<?php echo $rodada->getId(); ?>"><img src="img/deactivate.png" class="imagem excluirRodada"></a></td>									
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