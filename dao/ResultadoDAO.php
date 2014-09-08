<?php

include_once 'EntidadeDAO.php';

include_once("inc/conexao.php");

class ResultadoDAO {
	
	private $cn;
	
	function inserirResultadoEntidade($idBaseDados, $idEntidade, $idEntidadeAlvo) {
		
		$entidadeDAO = new EntidadeDAO();
		
		$entidade = $entidadeDAO->recuperaEntidadePorId($idBaseDados);
		
		$nomeEntidade = strtolower($entidade->getNome());
		
		$cn = new Conexao();
		
		$sql = "INSERT INTO resultado_entidade_" . $nomeEntidade . " (linking_id, entidade_" . $nomeEntidade . "_id, entidade_" . $nomeEntidade . "_alvo_id) VALUES ((SELECT ISNULL(MAX(linking_id),0) FROM resultado_entidade_" . $nomeEntidade . ") + 1, " . $idEntidade . ", " . $idEntidadeAlvo . ")";
		
		$cn->execute($sql);
		
		$cn->disconnect();
	}
}

?>