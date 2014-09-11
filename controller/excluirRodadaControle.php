<?php

include_once __DIR__ . '/rodadaControle.php';

session_start();

if(isset($_SESSION["emailAdmin"])) {
	
	$id = $_GET["idRodada"];
	
	excluirRodada($id);
	
	header("location: ../rodada.php");
}
else {
	echo "Erro.";
}

?>