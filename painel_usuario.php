<?php
include_once __DIR__ . '/header.php';
include_once __DIR__ . '/inc/constantes.php';
include_once __DIR__ . '/inc/dBug.php';
include_once __DIR__ . '/inc/erro.php';
include_once __DIR__ . '/dao/EntidadeDAO.php';
include_once __DIR__ . '/dao/UsuarioDAO.php';
include_once __DIR__ . '/controller/entidadeControle.php';

?>
<?php 
//echo '<script language="javascript">';
//echo 'alert("Última pontuação = '.$_SESSION['qualidade'].'");';
//echo '</script>';
?>

<script type="text/javascript">

	<?php 
	if($_SESSION['rodadaTipo'] == 1){
		if ($_SESSION['qualidade'] != null && $_SESSION['qualidade'] >= 60) { ?>
			new Messi('Parabêns !! Você fez <?php echo $_SESSION['qualidade']; ?> pontos. Portanto, passou no teste de qualificação ', {
					title: 'Pontuação',
					titleClass : 'info',
				    buttons : [ {
				        id : 0,
				        label : 'OK',
				        val : 'X'
				    } ],	
				});

	<?php
			$_SESSION['qualidade'] = '';
		} else if ($_SESSION['qualidade'] != null && $_SESSION['qualidade'] <= 60) {
	?>
		new Messi('Você fez <?php echo $_SESSION['qualidade']; ?> pontos. Tente Novamente !', {
			title: 'Pontuação',
			titleClass : 'info',
		    buttons : [ {
		        id : 0,
		        label : 'OK',
		        val : 'X'
		    } ],	
		});

	<?php 
		$_SESSION['qualidade'] = '';
	
		}
	}else if($_SESSION['qualidade'] != null && $_SESSION['rodadaTipo'] == 2){?>
			new Messi('Você fez <?php echo $_SESSION['qualidade']; ?> pontos.', {
					title: 'Pontuação',
					titleClass : 'info',
				    buttons : [ {
				        id : 0,
				        label : 'OK',
				        val : 'X'
				    } ],	
				});

	<?php
			$_SESSION['qualidade'] = '';
	} 	

?>


	
		
	
	
</script>

<div class="container-fluid">

	<div class="row">
	
		<?php include_once __DIR__ . '/game/ranking.php'; ?>

		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

			<div class="row">

				<?php	
				if(isset($_SESSION["email"])) {
				$entidadeDAO = new EntidadeDAO();
				$usuarioDAO = new UsuarioDAO();
					
				$usuario = $usuarioDAO->recuperarObjetoUsuarioPorEmail($_SESSION["email"]);
					
				$arrayEntidadeQualificacao = $entidadeDAO->recuperarArrayEntidadeQualificacaoPorUsuario($usuario);

				$arrayEntidade = $entidadeDAO->recuperarArrayEntidadePorUsuario($usuario);
				?>
				
				<div class="col-lg-8 col-lg-offset-2">
					<div id="loginTitulo" class="page-header">
						<h1>Painel do Usuário</h1>
				<!-- 
						<h3>
							<?php 
					/* 		$qualidade = $_SESSION['qualidade'];

							if($qualidade == null || empty($qualidade) == true){
								$_SESSION['qualidade'] = 0;
				}
 */					
				//echo "Total de pontos: ".$_SESSION['qualidade'];?></h3>
					</div>
 					-->
 					</div>
					<div class="panel panel-primary">
						<div class="panel-heading">
							Qualificação <a href="#"
								title="<?php echo TOOLTIP_PAINEL_USUARIO_QUALIFICACAO;?>"
								class="tooltipQualificacao"> <img src="img/help.png" />
							</a>
						</div>
						<div class="panel-body">
							<p>A pontuação mínima é de 60 pontos para a próxima fase.</p>
							<div class="col-lg-8 col-lg-offset-2">
								<form action="jogo.php" method="POST">
									<div class="row" style="margin-bottom: 10px">
										<?php foreach($arrayEntidadeQualificacao as $key => $entidade) {?>
										<div class="col-lg-6">
											<button type="submit"
												class="btn btn-default btn-lg btn-block" name="entidade_id"
												id="button<?php echo $entidade->getNomeJogo()?>"
												value="<?php echo $entidade->getId()?>">
												<span
													class="glyphicon
												
												<?php if ( $entidade->getNomeJogo() == "Pessoa") {
													echo "glyphicon-user";
												} else if ( $entidade->getNomeJogo() == "Produto") {
													echo "glyphicon-hdd";
												}?>
													
												"></span>
												<?php echo $entidade->getNomeJogo()?>
											</button>
										</div>
										<?php }?>
									</div>
								</form>
							</div>

						</div>
					</div>

					<div class="panel panel-primary">
						<div class="panel-heading">
							Jogos <a href="#"
								title="<?php echo TOOLTIP_PAINEL_USUARIO_JOGAR;?>"
								class="tooltipJogo"> <img src="img/help.png" />
							</a>
						</div>
						<div class="panel-body">
							<p>Jogue para conseguir mais pontos e ser o primeiro lugar do ranking.</p>
							<div class="col-lg-8 col-lg-offset-2">
								<form action="jogo.php" method="POST">
									<div class="row" style="margin-bottom: 10px">
										<?php foreach($arrayEntidade as $key => $entidade) {?>
										<div class="col-lg-6">
											<button type="submit"
												class="btn btn-default btn-lg btn-block" name="entidade_id"
												id="button<?php echo $entidade->getNomeJogo()?>"
												value="<?php echo $entidade->getId()?>">
												<span
													class="glyphicon
												
												<?php if ( $entidade->getNomeJogo() == "Pessoa") {
													echo "glyphicon-user";
												} else if ( $entidade->getNomeJogo() == "Produto") {
													echo "glyphicon-hdd";
												}?>
													
												"></span>
												<?php echo $entidade->getNomeJogo()?>
											</button>
										</div>
										<?php }?>
									</div>
								</form>
							</div>
						</div>
					</div>

					<!-- 
			<div class="panel panel-success">
				<div class="panel-heading">Outros
					<a href="#" title="<?php //echo TOOLTIP_PAINEL_USUARIO_OUTROS;?>" class="tooltipOutros">
						<img src="img/help.png"/>
					</a>
				</div>
				<div class="panel-body">

					<div class="col-lg-8 col-lg-offset-2">
						<div class="row">
							<div class="col-lg-6">
								<button type="button" class="btn btn-default btn-lg btn-block" id="buttonTutorial">Tutorial</button>
							</div>
							<div class="col-lg-6"></div>
						</div>
					</div>
				</div>
			</div>
			-->

					<?php
			} else {
				erro("Erro", ERRO_LOGAR2, "index.php");
			}
			?>
				</div>
			</div>

			<footer>
				<div>
					<div style="float: left;">COPPE/UFRJ</div>
					<div style="float: right;">2014</div>
				</div>
			</footer>

		</div>

	</div>

</div>

</body>
</html>