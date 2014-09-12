<?php

include_once __DIR__ . '/../dao/ResultadoDAO.php';

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

if(isset($_POST['situacao'])) {
	$situacao = $_POST['situacao'];
}

if(isset($_POST['idEntidadeAlvo'])) {
	$idEntidadeAlvo = $_POST['idEntidadeAlvo'];
}

if(isset($_POST['resultadoArray'])) {
	$resultadoArray = $_POST['resultadoArray'];
}

switch ($idConsulta){
	case 1:
		$resultadoDAO = new ResultadoDAO();
		
		$resultadoDAO->inserirResultadoEntidade(json_decode($resultadoArray));
		
		break;
		
	case 2:
		$resultadoDAO = new ResultadoDAO();
		
		$lastId = $resultadoDAO->inserirEntidadeAlvo($idEntidade, $idBaseDados, $situacao);
		
		echo $lastId;
		
		break;
}

?>