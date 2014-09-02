<?php

include_once("../model/MetaBaseDados.php");

include_once("inc/conexao.php");

class MetaBaseDadosDAO {
	
	private $cn;
	private $tabela = "meta_base_dados";
	
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
		
		$sql = "SELECT nome_atributo FROM " . $this->tabela . " WHERE base_dados_id = " . $idBaseDados;
		
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
	
		$sql = "SELECT id, nome_jogo FROM " . $this->tabela . " WHERE base_dados_id = " . $idBaseDados;
	
		$result = $cn->execute($sql);
	
		$dadosArray = array();
	
		while ($rs = sqlsrv_fetch_array($result)) {
			$id = $rs["id"];
			$nomeJogo = $rs["nome_jogo"];
			
			$dados = array($id, $nomeJogo);
	
			array_push($dadosArray, $dados);
		}
	
		$cn->disconnect();
	
		return $dadosArray;
	}
	
	function recuperarValorExibicaoAtributo ($idBaseDados) {
	
	}
}

?>