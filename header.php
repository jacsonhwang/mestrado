<!DOCTYPE html>
<html>
<head>
<title>GCER</title>
<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
<!-- <link rel="stylesheet" href="css/bootstrap-theme.css" type="text/css"> -->
<link rel="stylesheet" href="css/bootstrapValidator.css" type="text/css">
<link rel="stylesheet" href="css/jumbotron.css" type="text/css">
<!-- <link rel="stylesheet" href="css/tablesorter.css" type="text/css"> -->
<link rel="stylesheet" href="css/geral.css" type="text/css">

<script src="js/jquery-2.1.1.min.js"></script>
<script src="js/bootstrap.js"></script>

<script src="js/utilsCadastro.js"></script>
<script src="js/utilsLogin.js"></script>
<script src="js/utilsPainelAdmin.js"></script>

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

<script src="js/utilsUsuarios.js"></script>
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
					</ul>
				
				<?php
				} elseif (isset($_SESSION["email"])) {
				?>
				
					<ul class="nav navbar-nav">
						<li><a href="saibaMais.php">Saiba mais</a></li>
						<li><a href="#">Jogar</a></li>
						<li><a href="perfil.php">Perfil</a></li>
						<li><a href="logout.php" id="linkLogout">Sair</a></li>
						<li><a href="contato.php">Contato</a></li>
					</ul>
					
					<p class="navbar-text navbar-right" id="usuarioLogado">Bem-vindo(a), <?php echo $_SESSION["nome"]; ?>!</p>
					
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
	
	