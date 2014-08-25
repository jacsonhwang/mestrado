<?php

class Entidade {
	
	private $id;
	private $nome;
	private $nomeJogo;
	private $descJogo;
		
	public function __construct($id, $nome, $nomeJogo, $descJogo) {
		$this->id = $id;
		$this->nome = $nome;
		$this->nomeJogo = $nomeJogo;
		$this->descJogo = $descJogo;
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
	
	function recuperarArrayEntidade() {
		$entidadeArray['id']				= $this->id;
		$entidadeArray['nome']              = $this->nome;
		$entidadeArray['nome_jogo']         = $this->nomeJogo;
		$entidadeArray['descricao_jogo']    = $this->descJogo;
		
		return $entidadeArray;
	}
}

?>