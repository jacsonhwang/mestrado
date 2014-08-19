<?php

class MetaBaseDados {
	
	private $id;
	private $nomeAtributo;
	private $nomeJogo;
	private $descricaoAtributo;
	
	public function __construct($id, $nomeAtributo, $nomeJogo, $descricaoAtributo) {
		
		$this->id = $id;
		$this->nomeAtributo = $nomeAtributo;
		$this->nomeJogo = $nomeJogo;
		$this->descricaoAtributo = $descricaoAtributo;
		
	}
	
	function getId() {
		return $this->id;
	}
	
	function getNomeAtributo() {
		return $this->nomeAtributo;
	}
	
	function getNomeJogo() {
		return $this->nomeJogo;
	}
	
	function getDescricaoAtributo() {
		return $this->descricaoAtributo;
	}
	
}

?>