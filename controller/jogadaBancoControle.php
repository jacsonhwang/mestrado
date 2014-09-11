<?php

include_once 'dao/MetaBaseDadosDAO.php';

function listarDados($idBaseDados) {
	
	$metaBaseDadosDAO = new MetaBaseDadosDAO();
	
	$array = $metaBaseDadosDAO->listarDados($idBaseDados);
	
	return $array;
}

?>