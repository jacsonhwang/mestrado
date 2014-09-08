<?php

include '../dao/BaseDAO.php';

if(isset($_POST['idConsulta'])){
	$idConsulta = $_POST['idConsulta'];
}

if(isset($_POST['idEntidade'])) {
	$idEntidade = $_POST['idEntidade'];
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
}

?>