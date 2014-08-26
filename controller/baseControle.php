<?php
include_once '../dao/BaseDAO.php';

include_once 'dao/BaseDAO.php';

$baseDAO = new BaseDAO();

$baseArray = $baseDAO->listarBase();

print_r($baseArray);


function listarBase() {

	$baseDAO = new BaseDAO();

	$baseArray = $baseDAO->listarBase();

	return $baseArray;
}

/* function excluirEntidade($id){
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
	$_SESSION["edicao"]["descricao_jogo"] = $entidade->getNomeJogo();
	$_SESSION["edicao"]["nome_jogo"] = $entidade->getDescJogo();	

} */

?>