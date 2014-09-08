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

if(isset($_POST['idEntidade'])) {
	$idEntidade = $_POST['idEntidade'];
}

if(isset($_POST['nomeTabela'])) {
	$nomeTabela = $_POST['nomeTabela'];
}

switch ($idConsulta){
	case 1:
		
		$idEntidade = recuperarIdEntidade($idBaseDados, $id);
		
		echo json_encode($idEntidade);
		
		break;
		
	case 2:
		
		$entidade = recuperarEntidadeAleatoria($idBaseDados, $nomeTabela, $idEntidade);
		
		foreach($entidade as &$dadoEntidade) {
			$dadoEntidade = utf8_encode($dadoEntidade);
		}
		
		echo json_encode($entidade);
		
		break;
}

?>