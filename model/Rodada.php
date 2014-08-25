<?php
include_once '../model/Entidade.php';

class Rodada {
	
	private $id;
	private $nome;
	private $inicio;
	private $fim;
	private $entidade;
		
	public function __construct($id, $nome, $inicio, $fim, $entidade) {
		$this->id = $id;
		$this->nome = $nome;
		$this->inicio = $inicio;
		$this->fim = $fim;
		$this->entidade = $entidade;
	}
	
	function getId() {
		return $this->id;
	}
	
	function getNome() {
		return $this->nome;
	}
	
	function getInicio() {
		return $this->inicio;
	}
	
	function getFim() {
		return $this->fim;
	}
	
	function getEntidade() {
		return $this->entidade;
	}
	
	function recuperarArrayRodada() {
		$rodadaArray['id']				   = $this->id;
		$rodadaArray['nome']               = $this->nome;
		$rodadaArray['inicio']             = $this->inicio;
		$rodadaArray['fim']                = $this->fim;
		$rodadaArray['entidade_id']        = $this->entidade->getId();
		
		return $rodadaArray;
	}
}

?>