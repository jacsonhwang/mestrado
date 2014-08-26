<?php
include_once("../inc/conexao.php");
include_once("inc/conexao.php");
include_once("../model/Base.php");
include_once("model/Base.php");

include_once '../model/Entidade.php';
include_once 'model/Entidade.php';

class BaseDAO {

	private $cn;
	private $tabela = "base";

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
			var_dump($base);
			array_push($bases , $base);
		}
	
		$cn->disconnect();
	
		return $bases;
	}
}


?>