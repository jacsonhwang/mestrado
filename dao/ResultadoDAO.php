<?php
include_once __DIR__ . '/../inc/conexao.php';
include_once __DIR__ . '/../dao/EntidadeDAO.php';
include_once __DIR__ . '/../dao/BaseDAO.php';

session_start();

class ResultadoDAO {
	
	private $cn;

	function inserirResultadoEntidade($resultadoArray) {
		
		$cn = new Conexao();
	
		foreach ($resultadoArray as $resultado){
	
			$entidadeDAO = new EntidadeDAO();

			$baseDAO = new BaseDAO();				

			$base = $baseDAO->recuperaBasePorId($resultado->idBaseDados);
			$entidade = $base->getEntidade();
				
			$nomeEntidade = strtolower($entidade->getNome());
			
			$idEntidadeUsuario = $entidadeDAO->recuperarIdEntidadeUsuario($resultado->idBaseDados);
			
			$sql = "INSERT INTO resultado_entidade_" . $nomeEntidade . " (linking_id, entidade_" . $nomeEntidade . "_id, entidade_" . $nomeEntidade . "_alvo_id) 
					VALUES ((SELECT ISNULL(MAX(linking_id),0) FROM resultado_entidade_" . $nomeEntidade . ") + 1,
							 " . $resultado->idRegistro . ", 
							 " . $resultado->idEntidadeAlvo . ")";
					
			$cn->execute($sql);
		}
		
		$cn->disconnect();
	}

	function inserirEntidadeAlvo ($idEntidade, $idBaseDados, $situacao) {
		
		$entidadeDAO = new EntidadeDAO();
		
		$idEntidadeUsuario = $entidadeDAO->recuperarIdEntidadeUsuario($idBaseDados);
		
		$cn = new Conexao();
		
		$sql = "INSERT INTO [mestrado].[dbo].[entidade_produto_alvo]
				([entidade_produto_id]
				,[entidade_usuario_id]
				,[situacao_tarefa_id]
				,[data_inicio]
				,[data_fim])
				VALUES (
				" . $idEntidade . "
				," . $idEntidadeUsuario . "
				," . $situacao . "
				,'" . $_SESSION["inicioJogo"] . "'
				,'" . date('Y-d-m H:i:s') . "')";
		
		$cn->execute($sql);
		
		$lastId = $cn->getLastId("entidade_produto_alvo");
		
		$cn->disconnect();
		
		return $lastId;
		
	}
}

?>