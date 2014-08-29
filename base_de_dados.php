<?php include 'header.php'; ?>
<?php include_once 'controller/baseControle.php'; ?>
<?php include_once '../controller/baseControle.php'; ?>
<div id="formularioLogin" class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">

			<div id="loginTitulo" class="page-header">
				<h1>Base de Dados</h1>
			</div>
			
			<ol class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li><a href="painel_admin.php">Painel administrativo</a></li>
				<li class="active">Base de Dados</li>
			</ol>
			
			<?php
			if(isset($_SESSION["emailAdmin"])) {
			?>
			
				<div class="alert alert-danger" role="alert" id="avisoBD">Não existem bases de dados cadastradas no sistema.</div>
			
				<p><button type="button" class="btn btn-primary" id="buttonCadastrarBaseDeDado">Cadastrar</button></p>
			
				<div class="col-lg-12 table-responsive" id="divTabelaBaseDeDados">
					<table class="table tablesorter" id="tabelaBaseDeDados">
						<thead>
							<tr>
								<th>Nome</th>
								<th>Nome no Jogo</th>
								<th>Nome Arquivo</th>
								<th>Entidade</th>
								<th class="text-center">Visualizar</th>
								<th class="text-center">Editar</th>
								<th class="text-center">Excluir</th>
							</tr>
						</thead>
						<tbody>
						<?php 
								$bases = listarBase();
								
								foreach ($bases as $base){
				
						?>
						
							<tr>
								<td><?php echo $base->getNome();?></td>
								<td><?php echo $base->getNomeJogo();?></td>
								<td><?php echo $base->getNomeArquivo();?></td>
								<td><?php echo $base->getEntidade()->getNome();?></td>
								<td class="text-center"><a href="visualizar_bd.php?idBase=<?php echo $base->getId(); ?>"><img src="img/view-details.png" class="imagem"></a></td>								
								<td class="text-center"><a href="editar_bd.php"><img src="img/edit-gray.png" class="imagem"></a></td>
								<td class="text-center"><img src="img/deactivate.png" class="imagem excluirBD"></td>
							</tr>
						</tbody>
						<?php 
							}
						?>
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
			
			<div class="col-lg-12">
				<a class="btn btn-info" href="painel_admin.php" role="button" style="float: left;">Voltar</a>
			</div>
			
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>