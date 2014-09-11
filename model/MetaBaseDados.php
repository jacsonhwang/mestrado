<?php

include_once __DIR__ . '/../model/BaseDados.php';

class MetaBaseDados {
	
	private $id;
	private $nomeAtributo;
	private $base;
	private $nomeJogo;
	private $descricaoAtributo;
	private $exibirAtributo;
	private $identificador;
		
	public function __construct($id, $nomeAtributo, $base, $nomeJogo, $descricaoAtributo, $exibirAtributo, $identificador) {
		
		$this->id = $id;
		$this->nomeAtributo = $nomeAtributo;
		$this->base = $base;
		$this->nomeJogo = $nomeJogo;
		$this->descricaoAtributo = $descricaoAtributo;
		$this->exibirAtributo = $exibirAtributo;
		$this->identificador = $identificador;
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
	
	function getIdentificador() {
		return $this->identificador;
	}	
	
	function recuperarArrayMetaBase() {
				
		//$baseArray['id']				      = $this->id;
		$metaBaseArray['nome_atributo']       = $this->nomeAtributo;
		$metaBaseArray['base_dados_id']       = $this->base->getId();
		$metaBaseArray['descricao']           = $this->nomeJogo;
		$metaBaseArray['nome_jogo']           = $this->descricaoAtributo;
		$metaBaseArray['exibir_atributo']     = $this->exibirAtributo;
			
		return $metaBaseArray;
	}
}

?>
