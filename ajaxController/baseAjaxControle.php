<?php

include_once __DIR__ . '/../dao/BaseDAO.php';

if(isset($_POST['idConsulta'])){
	$idConsulta = $_POST['idConsulta'];
}

if(isset($_POST['idEntidade'])) {
	$idEntidade = $_POST['idEntidade'];
}

if(isset($_POST['idBaseDados'])) {
	$idBaseDados = $_POST['idBaseDados'];
}

switch ($idConsulta){
	case 1:

		$baseDAO = new BaseDAO();

		$dados = $baseDAO->recuperarNomeTabelaAleatoria($idEntidade);

		foreach($dados as &$dado) {
			$dado = utf8_encode($dado);
		}

		echo json_encode($dados);

		break;

	case 2:

		$baseDAO = new BaseDAO();

		$nomeJogo = $baseDAO->recuperaNomeJogo($idBaseDados);
		
		$nomeJogo = utf8_encode($nomeJogo);

		echo json_encode($nomeJogo);

		break;
}

?>