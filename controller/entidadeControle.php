<?php
include '../dao/EntidadeDAO.php';

include 'dao/EntidadeDAO.php';

include '../dao/EntidadesListaDAO.php';

function listarEntidade() {
	$entidadeDAO = new EntidadeDAO();

	$entidadeArray = $entidadeDAO->listarEntidade();

	return $entidadeArray;
}

function excluirEntidade($id){
	$entidadeDAO = new EntidadeDAO();
	
	$entidadeArray = $entidadeDAO->excluirEntidade($id);	
}

function recuperarEntidade($id){
	$entidadeDAO = new EntidadeDAO();

	$entidade = $entidadeDAO->recuperaEntidadePorId($id);
	
	return $entidade; 
}

function guardarEntidadeSessao($entidade) {

	$_SESSION["edicao"]["id"] = $entidade->getId();
	$_SESSION["edicao"]["nome"] = $entidade->getNome();
	$_SESSION["edicao"]["nome_jogo"] = $entidade->getNomeJogo();
	$_SESSION["edicao"]["descricao_jogo"] = $entidade->getDescJogo();	

}

function recuperarIdCSV($idBaseDados, $id) {
	
	$entidadesListaDAO = new EntidadesListaDAO();
	
	$idCSV = $entidadesListaDAO->recuperarIdCSV($idBaseDados, $id);
	
	return $idCSV;
}

?>