<?php
include_once __DIR__ . '/header.php';
include_once __DIR__ . '/controller/entidadeControle.php';
?>

<div class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">

			<div class="page-header">
				<h2>Visualizar Entidade</h2>
			</div>
			
			<ol class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li><a href="painel_admin.php">Painel administrativo</a></li>
				<li><a href="entidades.php">Entidades</a></li>
				<li class="active">Visualizar</li>
			</ol>
			
			<?php
			session_start();
			
			if(isset($_SESSION["emailAdmin"])) {
				if(isset($_GET["idEntidade"])) {
					$id = $_GET["idEntidade"];
		
					$entidade = recuperarEntidade($id);
		
					guardarEntidadeSessao($entidade);
				}
			?>

				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label class="col-sm-3 control-label">Nome</label>
						<div class="col-sm-8">
							<p class="form-control-static"><?php echo $entidade->getNome(); ?></p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Nome no Jogo</label>
						<div class="col-sm-8">
							<p class="form-control-static"><?php echo $entidade->getNomeJogo(); ?></p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Descrição no Jogo</label>
						<div class="col-sm-8">
							<p class="form-control-static text-justify"><?php echo $entidade->getDescJogo(); ?></p>
						</div>
					</div>
					<!-- <div class="form-group">
						<label class="col-sm-3 control-label">Base de dados associadas</label>
						<div class="col-sm-8">
							<ul class="list-unstyled form-control-static">
								<li><?php echo "MODIFICAR !!!!!"; ?></li>
							</ul>
						</div>
					</div>
					 -->
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
				<a class="btn btn-info" href="entidades.php" role="button">Voltar</a>
			</div>
			
		</div>
	</div>
</div>
<?php include_once __DIR__ . '/footer.php'; ?>