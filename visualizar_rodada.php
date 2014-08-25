<?php include 'header.php'; ?>
<?php include_once 'controller/rodadaControle.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">

			<div class="page-header">
				<h2>Visualizar Rodada</h2>
			</div>
			
			<ol class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li><a href="painel_admin.php">Painel administrativo</a></li>
				<li><a href="rodada.php">Rodada</a></li>
				<li class="active">Visualizar</li>
			</ol>
			
			<?php
			session_start();
			
			if(isset($_SESSION["emailAdmin"])) {
				if(isset($_GET["idRodada"])) {
					$id = $_GET["idRodada"];
					
					$rodada = recuperaRodadaPorId($id);

					guardarRodadaSessao($rodada);
				}
			?>

				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label class="col-sm-6 control-label">Nome</label>
						<div class="col-sm-6">
							<p class="form-control-static"><?php echo $rodada->getNome();?></p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-6 control-label">Entidade</label>
						<div class="col-sm-6">
							<p class="form-control-static"><?php echo $rodada->getEntidade()->getNome();?></p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-6 control-label">Início</label>
						<div class="col-sm-6">
							<p class="form-control-static"><?php echo $rodada->getInicio();?></p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-6 control-label">Fim</label>
						<div class="col-sm-6">
							<p class="form-control-static"><?php echo $rodada->getFim();?></p>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-lg-10 col-lg-offset-1 table-responsive" style="border: 1px solid black; margin-top: 20px; margin-bottom: 20px; display : block;" id="divTabelaUsuariosRodadaVisualizar">
						
							<p class="text-center"><strong>Usuários</strong></p>
							
							<table class="table tablesorter" id="tabelaUsuariosRodada">
								<thead>
									<tr>
										<th>Nome</th>
										<th>Email</th>
									</tr>
								</thead>
								<tbody>
									<?php
									
									$usuariosArray = listarUsuariosRodada($id);
									
									foreach ($usuariosArray as $usuario) {
										if($usuario->getSituacao() == 1) {
									?>
											<tr>
												<td class="nome"><?php echo $usuario->getNome(); ?></td>
												<td class="email"><?php echo $usuario->getEmail(); ?></td>
											</tr>
											
									<?php
										}
									}
									?>
								</tbody>
							</table>
							
							<?php include 'paginacao.php'; ?>
							
						</div>

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
				<a class="btn btn-info" href="rodada.php" role="button">Voltar</a>
			</div>
			
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>