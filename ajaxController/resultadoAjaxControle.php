<?php

include '../dao/ResultadoDAO.php';

if(isset($_POST['idConsulta'])){
	$idConsulta = $_POST['idConsulta'];
}

if(isset($_POST['idBaseDados'])) {
	$idBaseDados = $_POST['idBaseDados'];
}

if(isset($_POST['idEntidade'])) {
	$idEntidade = $_POST['idEntidade'];
}

if(isset($_POST['idEntidadeAlvo'])) {
	$idEntidadeAlvo = $_POST['idEntidadeAlvo'];
}

switch ($idConsulta){
	case 1:
		$resultadoDAO = new ResultadoDAO();
		
		$resultadoDAO->inserirResultadoEntidade($idBaseDados, $idEntidade, $idEntidadeAlvo);
		
		break;
}

?>