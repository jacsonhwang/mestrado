<?php

include_once __DIR__ . '/../dao/EntidadesListaDAO.php';
include_once __DIR__ . '/../dao/MetaBaseDadosDAO.php';

$idConsulta = null;

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
		
		//$dadosArray = $entidadesListaDAO->recuperarDados($atributos, $valores, $tabela, $idBaseDados);
		$dadosArray = $entidadesListaDAO->recuperarDados($atributos, $valores, $idBaseDados);
		
		foreach($dadosArray as &$dadoArray) {
			foreach($dadoArray as &$dado) {
				$dado = utf8_encode($dado);
			}
		}
		echo json_encode($dadosArray);
		
		break;
	
	case 2:
		$metaBaseDadosDAO = new MetaBaseDadosDAO();
		
		$nomesColunas = $metaBaseDadosDAO->recuperarNomeJogo($idBaseDados);
		
		foreach($nomesColunas as &$nomeColuna) {
			$nomeColuna = utf8_encode($nomeColuna);
		}
		
		echo json_encode($nomesColunas);
		
		break;
		
	case 3:
		$metaBaseDadosDAO = new MetaBaseDadosDAO();
		
		$nomesAtributos = $metaBaseDadosDAO->recuperarNomesColunas($idBaseDados);
		
		/* foreach($nomesAtributos as &$nomeAtributo) {
			$nomeAtributo = utf8_encode($nomeAtributo);
		} */
		
		echo json_encode($nomesAtributos);
		
		break;
		
	case 4:
		$metaBaseDadosDAO = new MetaBaseDadosDAO();
		
		$exibirAtributosArray = $metaBaseDadosDAO->recuperarValorExibicaoAtributo($idBaseDados);
		
		foreach($exibirAtributosArray as &$exibirAtributo) {
			$exibirAtributo = utf8_encode($exibirAtributo);
		}
		
		echo json_encode($exibirAtributosArray);
		
		break;
}

?>