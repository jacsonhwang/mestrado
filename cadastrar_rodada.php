<?php include 'header.php'; ?>
<?php include_once 'controller/entidadeControle.php'; ?>
<?php include_once 'controller/usuariosControle.php'; ?>
<?php include_once 'model/Entidade.php'; ?>

<div id="formularioLogin" class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">

			<div id="loginTitulo" class="page-header">
				<h1>Cadastrar Rodada</h1>
			</div>
			
			<ol class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li><a href="painel_admin.php">Painel administrativo</a></li>
				<li><a href="rodada.php">Rodada</a></li>
				<li class="active">Cadastro</li>
			</ol>
			
			<?php
			if(isset($_SESSION["emailAdmin"])) {
			?>
			
				<form class="form-horizontal" role="form" action="controller/cadastroRodadaControle.php" method="POST" id="formCadastroRodada">
					<div class="form-group">
						<label for="inputNome" class="col-sm-3 control-label">Nome</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="inputNome" name="inputNome">
						</div>
					</div>
					
					<div class="form-group">
						<label for="selectEntidade" class="col-sm-3 control-label">Entidade</label>
						<div class="col-sm-7">
							<select class="form-control" id="selectEntidade" name="selectEntidade">
								<option disabled selected>- Selecione -</option>
									<?php
							
										$entidadesArray = listarEntidade();
									
										foreach ($entidadesArray as $entidade) {
									?>
											
											<option value="<?php echo $entidade->getNome(); ?>"><?php echo $entidade->getNome();?></option>
									<?php
										}
									?>								
							</select>
						</div>
					</div>					
					
					<div class="form-group">
						<label for="inicioRodada" class="col-sm-3 control-label">Início</label>
						<div class="col-sm-3 input-group date">
							<input type="text" class="form-control" placeholder="Selecione"  id="inicioRodada" name="inicioRodada">
							<span class="input-group-addon glyphicon glyphicon-calendar"></span>
						</div>
					</div>
					
					<div class="form-group">
						<label for="fimRodada" class="col-sm-3 control-label">Fim</label>
						<div class="col-sm-3 input-group date">
							<input type="text" class="form-control" placeholder="Selecione" id="fimRodada" name="fimRodada">
							<span class="input-group-addon glyphicon glyphicon-calendar"></span>
						</div>
					</div>
					
					<div class="form-group">
						<label for="inputNome" class="col-sm-3 control-label">Todos os usuários?</label>
						<div class="col-sm-7">
							<label class="radio-inline">
								<input type="radio" name="radioTodosUsuarios" class="radioTodosUsuarios" value="s" >Sim
							</label>
							<label class="radio-inline">
								<input type="radio" name="radioTodosUsuarios" class="radioTodosUsuarios" value="n" >Não
							</label>
						</div>
					</div>
					
					<div class="col-lg-10 col-lg-offset-1 table-responsive" style="border: 1px solid black" id="tabelaUsuariosParticipantesRodada">
					
						<p class="text-center"><strong>Usuários que participarão da rodada</strong></p>
						
						<table class="table tablesorter" id="tabelaUsuariosParticipantesRodada">
							<thead>
								<tr>
									<th>Nome</th>
									<th>Email</th>
									<th class="text-center">Excluir</th>
								</tr>
							</thead>
							<tbody id="tbodyTUP">
								<!-- <tr>
									<td class='text-center'><img src='img/deactivate.png' class='imagem removerUsuarioRodada'></td>
								</tr> -->
							</tbody>
						</table>
						
					</div>
					
					<div class="col-lg-10 col-lg-offset-1 table-responsive" style="border: 1px solid black; margin-top: 20px; margin-bottom: 20px" id="divTabelaUsuariosRodada">
					
						<p class="text-center"><strong>Usuários gerais</strong></p>
						
						<table class="table tablesorter" id="tabelaUsuariosRodada">
							<thead>
								<tr>
									<th>Nome</th>
									<th>Email</th>
									<th class="text-center">Associar</th>
								</tr>
							</thead>
							<tbody>
								<?php
								
								$usuariosArray = listarUsuarios();
								
								foreach ($usuariosArray as $usuario) {
									if($usuario->getSituacao() == 1) {
								?>
										<tr>
											<td class="nome"><?php echo $usuario->getNome(); ?></td>
											<td class="email"><?php echo $usuario->getEmail(); ?></td>
											<td class="text-center"><img src="img/activate.png" class="imagem associarUsuarioRodada"></td>
										</tr>
										
								<?php
									}
								}
								?>
							</tbody>
						</table>
						
						<?php include 'paginacao.php'; ?>
						
					</div>
					
					<div class="form-group">
						<div class="col-sm-10">
							<button type="submit" class="btn btn-success" name="buttonCadastrar" id="buttonCadastrar" style="float: right">Cadastrar</button>
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
<?php include 'footer.php'; ?>