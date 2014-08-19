<?php

include '../dao/MetaBaseDadosDAO.php';
include '../dao/EntidadesListaDAO.php';

function listarDados($idBaseDados) {
	
	$metaBaseDadosDAO = new MetaBaseDadosDAO();
	
	$array = $metaBaseDadosDAO->listarDados($idBaseDados);
	
	return $array;
}

?>