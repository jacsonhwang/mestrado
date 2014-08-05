<?php include 'header.php'; ?>
<div>
	
	<?php
	session_start();
	
	if(isset($_SESSION["nome"])) {
		echo $_SESSION["nome"];
	}
	?>
	<br />
	
	<a href="view/cadastro.php">Cadastro</a><br />
	<a href="view/login.php">Login</a>
</div>
<?php include 'footer.php'; ?>