<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />

<title>GCER</title>

<link rel="stylesheet" href="css/datepicker.css" type="text/css">
<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
<link rel="stylesheet" href="css/bootstrapValidator.css" type="text/css">
<link rel="stylesheet" href="css/jumbotron.css" type="text/css">
<link rel="stylesheet" href="css/geral.css" type="text/css">
<link rel="stylesheet" href="css/jquery.bxslider.css" type="text/css">
<link rel="stylesheet" href="css/dashboard.css" type="text/css">
<link rel="stylesheet" href="css/jogo.css" type="text/css">
<link rel="stylesheet" href="css/TimeCircles.css" type="text/css">
<link rel="stylesheet" href="css/messi.css" type="text/css">
<link rel="stylesheet" href="css/portlets.css" type="text/css">
<link rel="stylesheet" href="css/tipsy.css" type="text/css" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">

<script src="js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="js/acao-datepicker.js"></script>
<script src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="js/TimeCircles.js"></script>
<script type="text/javascript" src="js/jquery.blockUI.js"></script>
<script type="text/javascript" src="js/messi.js"></script>
<script type="text/javascript" src="js/jquery.tipsy.js"></script>

<script src="js/utilsCadastro.js"></script>
<script src="js/utilsLogin.js"></script>
<script src="js/utilsPainelUsuario.js"></script>
<script src="js/utilsJogada.js"></script>

<script type="text/javascript" src="js/validator/bootstrapValidator.js"></script>
<script type="text/javascript" src="js/validator/notEmpty.js"></script>
<script type="text/javascript" src="js/validator/stringLength.js"></script>
<script type="text/javascript" src="js/validator/regexp.js"></script>
<script type="text/javascript" src="js/validator/different.js"></script>
<script type="text/javascript" src="js/validator/emailAddress.js"></script>
<script type="text/javascript" src="js/validator/numeric.js"></script>
<script src="js/validator/pt_BR.js"></script>

<script type="text/javascript" src="js/jquery.tablesorter.js"></script>
<script type="text/javascript" src="js/jquery.tablesorter.pager.js"></script>

<script type="text/javascript" src="js/utilsPainelAdmin.js"></script>

<script type="text/javascript" src="js/entity.js"></script>
<script type="text/javascript" src="js/entityViewer.js"></script>
<script type="text/javascript" src="js/pool.js"></script>
<script type="text/javascript" src="js/trash.js"></script>
<!-- <script type="text/javascript" src="js/jogo.js"></script> -->
<script type="text/javascript" src="js/jogo2.js"></script>

<script type="text/javascript" src="ajax/JogadaAjax.js"></script>

  <!-- <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script> -->

</head>

<?php include_once("inc/constantes.php"); ?>

<body>
	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">GCER</a>
			</div>
			<div class="navbar-collapse collapse">
			
				<?php session_start(); ?>
				
				<?php
				if(!isset($_SESSION["email"]) && !isset($_SESSION["emailAdmin"])) {
				?>
				
					<ul class="nav navbar-nav">
						<li><a href="saibaMais.php">Saiba mais</a></li>
						<li><a href="cadastro.php" id="linkCadastro">Cadastro</a></li>
						<li><a href="login.php" id="linkLogin">Login</a></li>
						<li><a href="contato.php">Contato</a></li>
						<li><a href="faq.php">FAQ</a></li>
					</ul>
				
				<?php
				} elseif (isset($_SESSION["email"])) {
				?>
				
					<ul class="nav navbar-nav">
						<li><a href="saibaMais.php">Saiba mais</a></li>
						<!-- <li><a href="#">Jogar</a></li> -->
						<li><a href="contato.php">Contato</a></li>
						<li><a href="painel_usuario.php">Painel</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Bem-vindo(a), <?php echo $_SESSION["nome"]; ?>! <span class="caret"></span>
						</a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="perfil_usuario.php"><img src="img/config.png" class="imagem"> Configurações</a></li>
								<li class="divider"></li>
								<li><a href="logout.php"><img src="img/logout.png" class="imagem"> Sair</a></li>
							</ul>
						</li>
					</ul>
					
				<?php
				} else {
				?>
				
					<ul class="nav navbar-nav">						
						<li><a href="painel_admin.php">Painel administrativo</a></li>
						<li><a href="logout.php" id="linkLogout">Sair</a></li>
					</ul>
					
					<p class="navbar-text navbar-right" id="usuarioLogado">Bem-vindo(a), <?php echo $_SESSION["nomeAdmin"]; ?>!</p>
					
				<?php
				}
				?>
			</div>
		</div>	    
	</div>

	