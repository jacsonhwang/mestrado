<?php

include '../dao/EntidadesListaDAO.php';
include 'dao/MetaBaseDadosDAO.php';

if(isset($_POST['idConsulta'])){
	$idConsulta = $_POST['idConsulta'];
}

if(isset($_POST['atributo'])){
	$atributos = $_POST['atributo'];
}

if(isset($_POST['valor'])) {
	$valores = $_POST['valor'];
}

if(isset($_POST['tabela'])) {
	$tabela = $_POST['tabela'];
}

if(isset($_POST['idBaseDados'])) {
	$idBaseDados = $_POST['idBaseDados'];
}

switch ($idConsulta){
	case 1:
		$entidadesListaDAO = new EntidadesListaDAO();
		
		$dadosArray = $entidadesListaDAO->recuperarDados($atributos, $valores, $tabela);
		
		echo json_encode($dadosArray);
		
		break;
	
	case 2:
		$metaBaseDadosDAO = new MetaBaseDadosDAO();
		
		$nomesColunas = $metaBaseDadosDAO->recuperarNomeJogo($idBaseDados);
		
		echo json_encode($nomesColunas);
		
		break;
}

?>