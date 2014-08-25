<?php
include_once("../inc/conexao.php");
include_once("inc/conexao.php");

include_once '../dao/EntidadeDAO.php';
include_once 'dao/EntidadeDAO.php';

include_once '../model/Rodada.php';
include_once '../model/Entidade.php';

class RodadaDAO {
	
	private $cn;
	private $tabela = "rodada";
	
	public function inserirRodada($rodada) {
		
		$cn = new Conexao();
		
		$rodadaArray = $rodada->recuperarArrayRodada();
		
		$cn->insert($this->tabela, $rodadaArray);
		
		$cn->disconnect();
	}
	
	public function listarRodada() {		
		$cn = new Conexao();
		$entidadeDAO = new EntidadeDAO();
		$rodadas = Array();
			
		$sql = "SELECT id, nome, convert(varchar(10),inicio,103) as inicio, convert(varchar(10),fim,103) as fim, entidade_id
				FROM rodada";
		
		$result = $cn->execute($sql);
		
		while ($rs = sqlsrv_fetch_array($result)) {
				
			$entidade = $entidadeDAO->recuperaEntidadePorId($rs['entidade_id']);
					
			$rodada = new Rodada($rs['id'], $rs['nome'], $rs['inicio'], $rs['fim'], $entidade);
				
			array_push($rodadas , $rodada);
		}
		
		$cn->disconnect();
		
		return $rodadas;
	}
	
	/* public function listarRodada() {
		$cn = new Conexao();
		$entidadeDAO = new EntidadeDAO();
		$rodadas = Array();
			
		$sql = "SELECT id, nome, convert(varchar(10),inicio,103) as inicio, convert(varchar(10),fim,103) as fim, entidade_id
				FROM rodada";
	
		$result = $cn->execute($sql);
	
		while ($rs = sqlsrv_fetch_array($result)) {
	
			//$entidade = $entidadeDAO->recuperaEntidadePorId($rs['entidade_id']);
				
			//$rodada = new Rodada($rs['id'], $rs['nome'], $rs['inicio'], $rs['fim'], $entidade);
			$rodada = new Rodada(null, $rs['nome'], null, null, null);
	
			array_push($rodadas , $rodada);
		}
	
		$cn->disconnect();
	
		return $rodadas;
	} */
}

?>