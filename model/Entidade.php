<?php

class Entidade {
	
	private $id;
	private $nome;
	private $nomeJogo;
	private $descJogo;
	private $arrayBaseDados;
		
	public function __construct($id, $nome, $nomeJogo, $descJogo, $arrayBaseDados) {
		$this->id = $id;
		$this->nome = $nome;
		$this->nomeJogo = $nomeJogo;
		$this->descJogo = $descJogo;
		$this->arrayBaseDados = $arrayBaseDados;
	}
	
	function getId() {
		return $this->id;
	}
	
	function getNome() {
		return $this->nome;
	}
	
	function getNomeJogo() {
		return $this->nomeJogo;
	}
	
	function getDescJogo() {
		return $this->descJogo;
	}
	
	function getArrayBaseDados() {
		return $this->arrayBaseDados;
	}
	
	function setArrayBaseDados($arrayBaseDados) {
		return $this->arrayBaseDados = $arrayBaseDados;
	}
	
	function recuperarArrayEntidade() {
		$entidadeArray['id']				= $this->id;
		$entidadeArray['nome']              = $this->nome;
		$entidadeArray['nome_jogo']         = $this->nomeJogo;
		$entidadeArray['descricao_jogo']    = $this->descJogo;
		
		return $entidadeArray;
	}
}

?>