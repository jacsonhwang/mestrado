<?php

include 'usuariosControle.php';

session_start();

if(isset($_SESSION["emailAdmin"])) {
	
	$email = $_GET["email"];
	
	alterarSituacaoUsuario($email);
	
	header("location: ../usuarios.php");
}
else {
	echo "Erro.";
}

?>