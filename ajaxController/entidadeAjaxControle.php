<?php

include '../controller/entidadeControle.php';

if(isset($_POST['idConsulta'])){
	$idConsulta = $_POST['idConsulta'];
}

if(isset($_POST['idBaseDados'])) {
	$idBaseDados = $_POST['idBaseDados'];
}

if(isset($_POST['id'])) {
	$id = $_POST['id'];
}

switch ($idConsulta){
	case 1:
		
		$idCSV = recuperarIdCSV($idBaseDados, $id);
		
		$idCSV = utf8_encode($idCSV);
		
		echo json_encode($idCSV);
		
		break;
}

?>