<?php
include_once __DIR__ . '/../inc/conexao.php';
include_once __DIR__ . '/../dao/EntidadeDAO.php';
include_once __DIR__ . '/../dao/BaseDAO.php';
include_once __DIR__ . '/../dao/EntidadesListaDAO.php';

session_start();

class ResultadoDAO {
	
	private $cn;

	function inserirResultadoEntidade($resultadoArray) {
		
		$entidadeDAO = new EntidadeDAO();
		$baseDAO = new BaseDAO();
		$entidadesListaDAO = new EntidadesListaDAO();
		
		$tipoRodada = $_SESSION['rodadaTipo'];
		
		if($tipoRodada == 1){
			$qualificacao = '_qualificacao';
		}
		else if($tipoRodada == 2){
			$qualificacao = '';
		}
		
		$cn = new Conexao();
		
		$entidadeDAO = new EntidadeDAO();
		
		$baseDAO = new BaseDAO();
		
		$base = $baseDAO->recuperaBasePorId($resultadoArray[0]->idBaseDados);
		$entidade = $base->getEntidade();
		
		$nomeEntidade = strtolower($entidade->getNome());
		$sql = "SELECT ISNULL(MAX(linking_id),0) + 1 as linking FROM resultado_entidade_" . $nomeEntidade . $qualificacao;
		$result = $cn->execute($sql);
		
		while ($rs = sqlsrv_fetch_array($result)) {
			$linking = $rs['linking'];
			
		}
	
		foreach ($resultadoArray as $resultado){		

			$base = $baseDAO->recuperaBasePorId($resultado->idBaseDados);
			$entidade = $base->getEntidade();
				
			$nomeEntidade = strtolower($entidade->getNome());
			
			$idEntidadeUsuario = $entidadeDAO->recuperarIdEntidadeUsuario($resultado->idBaseDados);
			
			$idEntidadeRegistro = $entidadesListaDAO->recuperarIdEntidade($resultado->idBaseDados, $resultado->id);
			
			$sql = "INSERT INTO resultado_entidade_" . $nomeEntidade . $qualificacao ." (linking_id, entidade_" . $nomeEntidade . "_id, entidade_" . $nomeEntidade . "_alvo_id) 
					VALUES (".$linking."," . $idEntidadeRegistro . "," . $resultado->idEntidadeAlvo . ")";
			$cn->execute($sql);
		}
		
		$idEntidadeUsuario = $entidadeDAO->recuperarIdEntidadeUsuario($resultadoArray[0]->idBaseDados);
		
		$idEntidadeAlvo = $entidadesListaDAO->recuperarIdEntidade($resultadoArray[0]->idBaseDados, $resultadoArray[0]->id);
		
		if($tipoRodada == 1){
			session_start();

	 		//Calcula a qualidade do jogador e armazena na sessão
			$sql2 = "SELECT dbo.calculaQualidadeQualificacao (".$idEntidadeUsuario.", ".$idEntidadeAlvo.") as qualidade";
			
			$result = $cn->execute($sql2);
			while ($rs = sqlsrv_fetch_array($result)) {
				$_SESSION['qualidade'] = $rs["qualidade"];
			}
			//Atualiza a qualidade do jogador na tabela alvo
			$sql3 = "dbo.atualizaQualidadeQualificacao ".$idEntidadeUsuario.", ".$idEntidadeAlvo;
			
			$cn->execute($sql3);
		}
		else if($tipoRodada == 2){
			session_start();

	 		//Calcula a qualidade do jogador e armazena na sessão
			$sql2 = "SELECT dbo.calculaQualidadeHardPlus (".$idEntidadeUsuario.", ".$idEntidadeAlvo.") as qualidade";
			
			$result = $cn->execute($sql2);
			while ($rs = sqlsrv_fetch_array($result)) {
				$_SESSION['qualidade'] = $rs["qualidade"];
			}
			//Atualiza a qualidade do jogador na tabela alvo
			$sql3 = "dbo.atualizaQualidade ".$idEntidadeUsuario.", ".$idEntidadeAlvo;
			
			$cn->execute($sql3);
		}
		
		
		
		$cn->disconnect();
	}

	function inserirEntidadeAlvo ($idEntidade, $idBaseDados, $situacao) {
		$tipoRodada = $_SESSION['rodadaTipo'];

		$entidadeDAO = new EntidadeDAO();
		$idEntidadeUsuario = $entidadeDAO->recuperarIdEntidadeUsuario($idBaseDados);
			
		if($tipoRodada == 1){
			$qualificacao = '_qualificacao';
			
			$cn = new Conexao();
			
			$sql = "INSERT INTO [mestrado].[dbo].[entidade_produto_alvo".$qualificacao."]
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
			
			$lastId = $cn->getLastId("entidade_produto_alvo".$qualificacao);
			
			$cn->disconnect();
			
			return $lastId;
		
		}else if($tipoRodada == 2){
			$qualificacao = '';
			
			$cn = new Conexao();
			$sql = "UPDATE entidade_produto_alvo SET situacao_tarefa_id = ".$situacao.", data_fim = GETDATE() WHERE entidade_produto_id = ".$idEntidade." AND entidade_usuario_id = ".$idEntidadeUsuario;
			$cn->execute($sql);
			
			$sql = "SELECT id FROM entidade_produto_alvo WHERE entidade_produto_id = ".$idEntidade." AND entidade_usuario_id = ".$idEntidadeUsuario;
			$result = $cn->execute($sql);
			while ($rs = sqlsrv_fetch_array($result)) {
				$entidadeProdutoAlvoId = $rs["id"];
			}
			
			$cn->disconnect();
			
			return $entidadeProdutoAlvoId;
		}
		
	}
	
	//O usuário começa com -100 pontos e situacao 3 (abandono de jogo)
	function inserirEntidadeAlvoRodadaResolucao ($idEntidade, $idBaseDados, $situacao) {
		$tipoRodada = $_SESSION['rodadaTipo'];
	
		if ($tipoRodada == 2){
	
			$entidadeDAO = new EntidadeDAO();
		
			$idEntidadeUsuario = $entidadeDAO->recuperarIdEntidadeUsuario($idBaseDados);
		
			$cn = new Conexao();
	
			$sql = "INSERT INTO [mestrado].[dbo].[entidade_produto_alvo]
					([entidade_produto_id]
					,[entidade_usuario_id]
					,[situacao_tarefa_id]
					,[qualidade]
					,[qualidade_hard]
					,[qualidade_hard_plus]
					,[data_inicio]
					,[data_fim])
					VALUES (
					" . $idEntidade . "
					," . $idEntidadeUsuario . "
					," . $situacao . "
					,0
					,0
					,0
					,GETDATE()
					,NULL)";
		
			$cn->execute($sql);
		
			$lastId = $cn->getLastId("entidade_produto_alvo");
		
			$cn->disconnect();
		
			return $lastId;
		}
	}
}

?>