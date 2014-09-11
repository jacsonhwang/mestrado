<?php
include_once __DIR__ . '/header.php';
include_once __DIR__ . '/controller/entidadeControle.php';
include_once __DIR__ . '/controller/usuariosControle.php';
include_once __DIR__ . '/controller/rodadaControle.php';
?>

<div id="formularioLogin" class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">

			<div class="page-header">
				<h1>Editar Rodada</h1>
			</div>
			
			<ol class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li><a href="painel_admin.php">Painel administrativo</a></li>
				<li><a href="rodada.php">Rodada</a></li>
				<li class="active">Editar</li>
			</ol>
			
			<?php
			if(isset($_SESSION["emailAdmin"])) {
				if(isset($_GET["idRodada"])) {
					$id = $_GET["idRodada"];
						
					$rodada = recuperaRodadaPorId($id);
				
					guardarRodadaSessao($rodada);
				}
			?>
			
				<form class="form-horizontal" role="form" action="controller/editarRodadaControle.php" method="POST" id="formCadastroRodada">
					<div class="form-group">
						<input type='hidden' name='idRodadaEditar' value='<?php echo $id ?>'>
						<label for="inputNome" class="col-sm-3 control-label">Nome</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="inputNome" name="inputNome" value="<?php echo $rodada->getNome();?>">
						</div>
					</div>
					
					<div class="form-group">
						<label for="selectEntidade" class="col-sm-3 control-label">Entidade</label>
						<div class="col-sm-7">
							<select class="form-control" id="selectEntidade" name="selectEntidade">
								
									<option value="<?php echo $rodada->getEntidade()->getNome() ?>" selected><?php echo $rodada->getEntidade()->getNome() ?></option>
									<?php
							
										$entidadesArray = listarEntidade();
									
										foreach ($entidadesArray as $entidade) {
											if($rodada->getEntidade()->getId() != $entidade->getId()){
									?>
												
											<option value="<?php echo $entidade->getNome(); ?>"><?php echo $entidade->getNome();?></option>
									<?php
											}
										}
									?>								
							</select>
						</div>
					</div>					
					
					<div class="form-group">
						<label for="inicioRodada" class="col-sm-3 control-label">Início</label>
						<div class="col-sm-3 input-group date">
							<input type="text" class="form-control" placeholder="Selecione"  id="inicioRodada" name="inicioRodada" value="<?php echo $rodada->getInicio();?>">
							<span class="input-group-addon glyphicon glyphicon-calendar"></span>
						</div>
					</div>
					
					<div class="form-group">
						<label for="fimRodada" class="col-sm-3 control-label">Fim</label>
						<div class="col-sm-3 input-group date">
							<input type="text" class="form-control" placeholder="Selecione" id="fimRodada" name="fimRodada" value="<?php echo $rodada->getFim();?>">
							<span class="input-group-addon glyphicon glyphicon-calendar"></span>
						</div>
					</div>
					
					
					<!-- -------------------------------------- ALTERAR --------------------------------------  -->
					
					<div class="col-lg-10 col-lg-offset-1 table-responsive" style="border: 1px solid black" id="tabelaUsuariosParticipantesRodadaEditar">
					
						<p class="text-center"><strong>Usuários que participarão da rodada</strong></p>
						
						<table class="table tablesorter" id="tabelaUsuariosParticipantesRodadaEditar">
							<thead>
								<tr>
									<th>Nome</th>
									<th>Email</th>
									<th class="text-center">Excluir</th>																
								</tr>
							</thead>
							<tbody id="tbodyTUPEditar">
								<?php
								
								$usuariosArray = listarUsuariosRodada($id);
								
								foreach ($usuariosArray as $usuario) {
									if($usuario->getSituacao() == 1) {
								?>
										<tr>
											<td class="nome" ><?php echo $usuario->getNome(); ?></td>
											<td class="email"><input type='hidden' name='emailUsuarioEditar[]' value='<?php echo $usuario->getEmail(); ?>'><?php echo $usuario->getEmail(); ?><?php echo $usuario->getEmail(); ?></td>
											<td class='text-center'><img src='img/deactivate.png' class='imagem removerUsuarioRodadaEditar'></td> 
										</tr>
										
								<?php
									}
								}
								?>
								<!-- <tr>
									<td class='text-center'><img src='img/deactivate.png' class='imagem removerUsuarioRodada'></td>
								</tr> -->
							</tbody>
						</table>
						
					</div>
					
					<div class="col-lg-10 col-lg-offset-1 table-responsive" style="border: 1px solid black; margin-top: 20px; margin-bottom: 20px" id="divTabelaUsuariosRodadaEditar">
					
						<p class="text-center"><strong>Usuários gerais</strong></p>
						
						<table class="table tablesorter" id="tabelaUsuariosRodadaEditar">
							<thead>
								<tr>
									<th>Nome</th>
									<th>Email</th>
									<th class="text-center">Associar</th>
								</tr>
							</thead>
							<tbody>
								<?php
								
								$todosUsuarios = listarUsuarios();
								
								foreach ($todosUsuarios as $usuario) {
									 	if($usuario->getSituacao() == 1) {
								?>
											<tr>
												<td class="nome"><?php echo $usuario->getNome(); ?></td>
												<td class="email"><?php echo $usuario->getEmail(); ?></td>
												<td class="text-center"><img src="img/activate.png" class="imagem associarUsuarioRodadaEditar"></td>
											</tr>
										
								<?php
										}
								}
								?>
							</tbody>
						</table>
						
						<?php include_once __DIR__ . '/paginacao.php'; ?>
						
					</div>
					
					
						
					
					<div class="form-group">
						<div class="col-sm-10">
							<button type="submit" class="btn btn-success" name="buttonCadastrar" id="buttonCadastrar" style="float: right">Salvar alterações</button>
							<a class="btn btn-info" href="rodada.php" role="button" style="float: left;">Voltar</a>
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
			
		</div>
	</div>
</div>
<?php include_once __DIR__ . '/footer.php'; ?>