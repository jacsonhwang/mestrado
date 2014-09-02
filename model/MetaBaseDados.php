<?php

class MetaBaseDados {
	
	private $id;
	private $nomeAtributo;
	private $base;
	private $nomeJogo;
	private $descricaoAtributo;
	private $exibirAtributo;
	
	
	public function __construct($id, $nomeAtributo, $base, $nomeJogo, $descricaoAtributo, $exibirAtributo) {
		
		$this->id = $id;
		$this->nomeAtributo = $nomeAtributo;
		$this->base = $base;
		$this->nomeJogo = $nomeJogo;
		$this->descricaoAtributo = $descricaoAtributo;
		$this->exibirAtributo = $exibirAtributo;
		
	}
	
	function getId() {
		return $this->id;
	}
	
	function getNomeAtributo() {
		return $this->nomeAtributo;
	}
	
	function getBase() {
		return $this->base;
	}
	
	function getNomeJogo() {
		return $this->nomeJogo;
	}
	
	function getDescricaoAtributo() {
		return $this->descricaoAtributo;
	}
	
	function getExibirAtributo() {
		return $this->exibirAtributo;
	}

	function recuperarArrayMetaBase() {
				
		//$baseArray['id']				      = $this->id;
		$metaBaseArray['nome_atributo']       = $this->nome;
		$metaBaseArray['base_dados_id']       = $this->nomeArquivo;
		$metaBaseArray['descricao']           = $this->nomeJogo;
		$metaBaseArray['nome_jogo']           = $this->nomeTabela;
		$metaBaseArray['exibir_atributo']	  = $this->exibirAtributo;
	
		return $metaBaseArray;
	}
}

?>