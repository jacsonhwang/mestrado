<?php

include_once __DIR__ . '/../entidadeControle.php';

session_start();

if(isset($_SESSION["emailAdmin"])) {
	
	$id = $_GET["idEntidade"];
	
	excluirEntidade($id);
	
	header("location: ../entidades.php");
}
else {
	echo "Erro.";
}

?>