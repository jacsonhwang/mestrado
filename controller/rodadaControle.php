<?php 
include_once '../dao/EntidadeDAO.php';
include_once 'dao/RodadaDAO.php';
include_once '../dao/RodadaDAO.php';

include_once '../model/Rodada.php';
include_once '../model/Entidade.php';

function listarRodada() {
	
	$rodadaDAO = new RodadaDAO();
	
	$rodadaArray = $rodadaDAO->listarRodada();
	
	return $rodadaArray;
	
}  

function recuperaRodadaPorId($id){
	$rodadaDAO = new RodadaDAO();

	$rodada = $rodadaDAO->recuperaRodadaPorId($id);

	return $rodada;
}

function guardarRodadaSessao($rodada) {

	$_SESSION["edicao"]["id"] = $rodada->getId();
	$_SESSION["edicao"]["nome"] = $rodada->getNome();
	$_SESSION["edicao"]["nome_entidade"] = $rodada->getEntidade()->getNome();
	$_SESSION["edicao"]["inicio"] = $rodada->getInicio();
	$_SESSION["edicao"]["fim"] = $rodada->getFim();
	
}

function excluirRodada($id){
	$rodadaDAO = new RodadaDAO();

	$rodada = $rodadaDAO->excluirRodadaPorId($id);
	
	return $rodada;
}

function listarUsuariosRodada($id) {

	$rodadaDAO = new RodadaDAO();

	$usuariosRodadaArray = $rodadaDAO->listarUsuarios($id);

	return $usuariosRodadaArray;

}

?>