<?php
include_once("../inc/conexao.php");
include_once("inc/conexao.php");


include_once '../model/BaseDados.php';
include_once 'model/BaseDados.php';


include_once '../model/Entidade.php';
include_once 'model/Entidade.php';

class BaseDAO {

	private $cn;
	private $tabela = "base_dados";
	
	public function inserirBase($base) {
	
		$cn = new Conexao();

		$baseArray = $base->recuperarArrayBase();
	
		$cn->insert($this->tabela, $baseArray);
	
		$cn->disconnect();
	}

	public function listarBase(){
	
		$cn = new Conexao();
		$bases = array();
		
		$sql = "SELECT b.id as base_id, b.nome as base_nome, b.nome_arquivo as base_nome_arquivo, b.nome_jogo as base_nome_jogo, 
				       b.nome_tabela as base_nome_tabela, b.entidade_id as base_entidade_id,
	                   e.nome as entidade_nome, e.nome_jogo as entidade_nome_jogo, e.descricao_jogo as entidade_descricao_jogo	
                FROM base_dados b
                     INNER JOIN entidade e on b.entidade_id = e.id";
		$result = $cn->execute($sql);
	
		while ($rs = sqlsrv_fetch_array($result)) {
				
			$entidade = new Entidade($rs['base_entidade_id'], $rs['entidade_nome'], $rs['entidade_nome_jogo'], $rs['entidade_descricao_jogo']);

			$base = new Base($rs['base_id'], $rs['base_nome'], $rs['base_nome_arquivo'], $rs['base_nome_jogo'], $rs['base_nome_tabela'], $entidade);
		
			array_push($bases , $base);
		}
	
		$cn->disconnect();
	
		return $bases;
	}
	
	public function recuperaBasePorId($id){
	
		$cn = new Conexao();
	
		$sql = "SELECT b.id as base_id, b.nome as base_nome, b.nome_arquivo as base_nome_arquivo, b.nome_jogo as base_nome_jogo,
				       b.nome_tabela as base_nome_tabela, b.entidade_id as base_entidade_id,
	                   e.nome as entidade_nome, e.nome_jogo as entidade_nome_jogo, e.descricao_jogo as entidade_descricao_jogo
                FROM base_dados b
                     INNER JOIN entidade e on b.entidade_id = e.id
				WHERE b.id = '".$id."'";
		
		$result = $cn->execute($sql);
	
		while ($rs = sqlsrv_fetch_array($result)) {
	
			$entidade = new Entidade($rs['base_entidade_id'], $rs['entidade_nome'], $rs['entidade_nome_jogo'], $rs['entidade_descricao_jogo']);
	
			$base = new Base($rs['base_id'], $rs['base_nome'], $rs['base_nome_arquivo'], $rs['base_nome_jogo'], $rs['base_nome_tabela'], $entidade);
	
		}
	
		$cn->disconnect();
	
		return $base;
	}
	
	public function recuperaCamposTabela($id){
	
		$cn = new Conexao();
		$campos = array();
		
		$sql = "SELECT nome_atributo
				FROM meta_base_dados
				WHERE base_dados_id = '".$id."'";
			
		$result = $cn->execute($sql);
	
		while ($rs = sqlsrv_fetch_array($result)) {
	
			array_push($campos , $rs['nome_atributo']);			
	
		}
	
		$cn->disconnect();
	
		return $campos;
	}
	
	public function recuperaRegistrosTabela($nomeTabela){
	
		$cn = new Conexao();
		$registros = array();
	
		$sql = "SELECT top(20)*
				FROM ".$nomeTabela;
			
		$result = $cn->execute($sql);
	
		while ($rs = sqlsrv_fetch_array($result)) {
			
			array_push($registros , $rs);
	
		}
	
		$cn->disconnect();
	
		return $registros;
	}
	
}


?>