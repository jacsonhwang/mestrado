<?php
include_once __DIR__ . '/../inc/conexao.php';
include_once __DIR__ . '/../dao/EntidadeDAO.php';

session_start();

class ResultadoDAO {
	
	private $cn;
	
	function inserirResultadoEntidade($idBaseDados, $idEntidade, $idEntidadeAlvo) {
		
		$entidadeDAO = new EntidadeDAO();
		
		$entidade = $entidadeDAO->recuperaEntidadePorId($idBaseDados);
		
		$nomeEntidade = strtolower($entidade->getNome());
		
		$idEntidadeUsuario = $entidadeDAO->recuperarIdEntidadeUsuario($idBaseDados);
		
		$cn = new Conexao();
		
		$sql = "INSERT INTO resultado_entidade_" . $nomeEntidade . " (linking_id, entidade_" . $nomeEntidade . "_id, entidade_" . $nomeEntidade . "_alvo_id) VALUES ((SELECT ISNULL(MAX(linking_id),0) FROM resultado_entidade_" . $nomeEntidade . ") + 1, " . $idEntidade . ", " . $idEntidadeAlvo . ")";
		
		//echo $sql . "\n";
		
		$cn->execute($sql);
		
		$cn->disconnect();
	}
	
	function inserirEntidadeAlvo ($idEntidade, $idBaseDados, $situacao) {
		
		$entidadeDAO = new EntidadeDAO();
		
		$idEntidadeUsuario = $entidadeDAO->recuperarIdEntidadeUsuario($idBaseDados);
		
		$cn = new Conexao();
		
		$sql = "INSERT INTO [mestrado].[dbo].[entidade_pessoa_alvo]
				([entidade_pessoa_id]
				,[entidade_usuario_id]
				,[situacao_tarefa_id]
				,[data_inicio]
				,[data_fim])
				VALUES (
				" . $idEntidade . "
				," . $idEntidadeUsuario . "
				," . $situacao . "
				,'" . $_SESSION["inicioJogo"] . "'
				,'" . date('Y-m-d H:i:s') . "')";
		
		$cn->execute($sql);
		
		$lastId = $cn->getLastId("entidade_pessoa_alvo");
		
		$cn->disconnect();
		
		return $lastId;
		
	}
}

?>