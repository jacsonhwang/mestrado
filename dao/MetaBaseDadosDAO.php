<?php

include_once __DIR__ . '/../inc/conexao.php';
include_once __DIR__ . '/../model/MetaBaseDados.php';

class MetaBaseDadosDAO {
	
	private $cn;
	private $tabela = "meta_base_dados";
	
	public function inserirMetaBase($metaBase) {
	
		$cn = new Conexao();
	
		$metaBaseArray = $metaBase->recuperarArrayMetaBase();

		$cn->insert($this->tabela, $metaBaseArray);
	
		$cn->disconnect();
	}	
	
	public function listarDados($idBaseDados) {
		
		$cn = new Conexao();
		
		$sql = "SELECT id, nome_atributo, nome_jogo, descricao, exibir_atributo FROM " . $this->tabela . " WHERE base_dados_id = " . $idBaseDados;
		
		$result = $cn->execute($sql);
		
		$dadosArray = array();
		
		while ($rs = sqlsrv_fetch_array($result)) {
			$id = $rs["id"];
			$nomeAtributo = $rs["nome_atributo"];
			$nomeJogo = $rs["nome_jogo"];
			$descricaoAtributo = $rs["descricao"];
			$exibirAtributo = $rs["exibir_atributo"];
			
			$metaBaseDados = new MetaBaseDados($id, $nomeAtributo, $idBaseDados, $nomeJogo, $descricaoAtributo, $exibirAtributo);
			
			array_push($dadosArray, $metaBaseDados);
		}
		
		$cn->disconnect();
		
		return $dadosArray;
		
	}
	
	public function recuperarNomesColunas($idBaseDados) {
		
		$cn = new Conexao();
		
		$sql = " SELECT nome_atributo FROM " . $this->tabela . " WHERE base_dados_id = " . $idBaseDados;
		//$sql .=" UNION ";
		//$sql .= "SELECT DISTINCT('entidade_' +  LOWER(e.nome) + '_id') FROM base_dados bd INNER JOIN entidade e ON bd.entidade_id = e.id where bd.id = ".$idBaseDados; 
		
		$result = $cn->execute($sql);
		
		$dadosArray = array();
		
		while ($rs = sqlsrv_fetch_array($result)) {
			$nomeAtributo = $rs["nome_atributo"];
				
			array_push($dadosArray, $nomeAtributo);
		}
		
		$cn->disconnect();
		
		$atributos = implode(", ", $dadosArray);
		
		return $atributos;
	}
	
	public function recuperarNomeJogo($idBaseDados) {
	
		$cn = new Conexao();
	
		$sql = "SELECT nome_jogo FROM " . $this->tabela . " WHERE base_dados_id = " . $idBaseDados;
	
		$result = $cn->execute($sql);
	
		$dadosArray = array();
	
		while ($rs = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
			$nomeJogo = $rs["nome_jogo"];
	
			array_push($dadosArray, $nomeJogo);
		}
	
		$cn->disconnect();
	
		return $dadosArray;
	}
	
	function recuperarValorExibicaoAtributo ($idBaseDados) {
	
		$cn = new Conexao();
		
		$sql = "SELECT exibir_atributo FROM " . $this->tabela . " WHERE base_dados_id = " . $idBaseDados;
		
		$result = $cn->execute($sql);
		
		$exibirAtributosArray = array();
		
		while ($rs = sqlsrv_fetch_array($result)) {
			$exibirAtributo = $rs["exibir_atributo"];
			
			array_push($exibirAtributosArray, $exibirAtributo);
		}
		
		$cn->disconnect();
		
		return $exibirAtributosArray;
	}
	
	public function recuperarObjetoPorBaseDadoId($idBaseDados) {
	
		$cn = new Conexao();
	
		$sql  = " SELECT id, nome_atributo, descricao, nome_jogo, exibir_atributo, identificador"; 
		$sql .= " FROM " . $this->tabela;
		$sql .= " WHERE exibir_atributo = 1";
		$sql .= " AND base_dados_id = " . $idBaseDados;
	
		$result = $cn->execute($sql);
	
		$arrayMetaBaseDados = array();
	
		while ($rs = sqlsrv_fetch_array($result)) {
			
			$metaBaseDados = new MetaBaseDados($rs["id"], $rs["nome_atributo"], null, $rs["nome_jogo"], $rs["descricao"], $rs["exibir_atributo"], $rs["identificador"]);
				
			array_push($arrayMetaBaseDados, $metaBaseDados);
		}
	
		$cn->disconnect();
		
		return $arrayMetaBaseDados;
	}
}

?>