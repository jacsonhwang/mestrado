<?php

class MetaBaseDados {
	
	private $id;
	private $nomeAtributo;
	private $base;
	private $nomeJogo;
	private $descricaoAtributo;
	
	
	public function __construct($id, $nomeAtributo, $base, $nomeJogo, $descricaoAtributo) {
		
		$this->id = $id;
		$this->nomeAtributo = $nomeAtributo;
		$this->base = $base;
		$this->nomeJogo = $nomeJogo;
		$this->descricaoAtributo = $descricaoAtributo;
		
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

	function recuperarArrayMetaBase() {
				
		//$baseArray['id']				      = $this->id;
		$metaBaseArray['nome_atributo']       = $this->nome;
		$metaBaseArray['base_dados_id']       = $this->nomeArquivo;
		$metaBaseArray['descricao']           = $this->nomeJogo;
		$metaBaseArray['nome_jogo']           = $this->nomeTabela;
	
		return $metaBaseArray;
	}
}

?>