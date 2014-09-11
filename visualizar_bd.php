<?php
include_once __DIR__ . '/header.php';
include_once __DIR__ . '/controller/baseControle.php';
?>

<div class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">

			<div class="page-header">
				<h2>Visualizar Base de Dados</h2>
			</div>
			
			<ol class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li><a href="painel_admin.php">Painel administrativo</a></li>
				<li><a href="base_de_dados.php">Base de Dados</a></li>
				<li class="active">Visualizar</li>
			</ol>
			
			<?php
			session_start();
			
			if(isset($_SESSION["emailAdmin"])) {

				if(isset($_GET["idBase"])) {
					$id = $_GET["idBase"];
		
					$base = recuperaBasePorId($id);

					
				}
			?>

				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label class="col-sm-3 control-label">Nome</label>
						<div class="col-sm-8">
							<p class="form-control-static"><?php echo $base->getNome(); ?></p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Nome no Jogo</label>
						<div class="col-sm-8">
							<p class="form-control-static"><?php echo $base->getNomeJogo(); ?></p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Nome Arquivo</label>
						<div class="col-sm-8">
							<p class="form-control-static text-justify"><?php echo $base->getNomeArquivo(); ?></p>
						</div>
					</div>
					
					
					<div class="col-lg-11 table-responsive fixed-height" style="border: 1px solid black">
		  			
		  				<p class="text-center"><strong>Dados</strong></p>
		  				
							<table class="table tablesorter" id="tabelaPrevia">
								<thead>
									<tr>
							<?php
															
								
													
									$campos = recuperaCamposTabela($base->getId());
									
									foreach ($campos as $campo){
							?>		
						
										<th><?php echo $campo ?></th>
								
																				
							<?php   }?>
										
									</tr>
								</thead>
								<tbody>
									
									<?php 						
									
											$nomeTabela = $base->getNomeTabela();		
											$registros = recuperaRegistrosTabela($nomeTabela);
						
											
											
											foreach ($registros as $registro){
									?>
									
										<tr>	
											<?php 		
												for($c = 0; $c < count($registro); $c++){
												//foreach ($registro as $dado){     
											?>
													<td><?php echo $registro[$c];?></td>
											<?php
												}
											?>
										</tr>
										
									<?php   } ?>
							</tbody>
						</table>
					</div>					
				</form>
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
				<a class="btn btn-info" href="base_de_dados.php" role="button">Voltar</a>
			</div>
			
		</div>
	</div>
</div>
<?php include_once __DIR__ . '/footer.php'; ?>