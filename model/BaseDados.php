<?php
include_once __DIR__ . '/../model/Entidade.php';
include_once __DIR__ . '/../model/MetaBaseDados.php';

class Base {
	
	private $id;
	private $nome;
	private $nomeArquivo;
	private $nomeJogo;
	private $nomeTabela;
	private $entidade;
	private $metaBaseDados;
	
	public function __construct($id, $nome, $nomeArquivo, $nomeJogo, $nomeTabela, $entidade, $metaBaseDados) {
		$this->id = $id;
		$this->nome = $nome;
		$this->nomeArquivo = $nomeArquivo;
		$this->nomeJogo = $nomeJogo;
		$this->nomeTabela = $nomeTabela;
		$this->entidade = $entidade;
		$this->metaBaseDados = $metaBaseDados;
	}
	
	function getId() {
		return $this->id;
	}
	
	function getNome() {
		return $this->nome;
	}
	
	function getNomeArquivo() {
		return $this->nomeArquivo;
	}	
		
	function getNomeJogo() {
		return $this->nomeJogo;
	}
	
	function getNomeTabela() {
		return $this->nomeTabela;
	}
	
	function getEntidade() {
		return $this->entidade;
	}

	function getMetaBaseDados() {
		return $this->metaBaseDados;
	}
	
	function setId($id) {
		$this->id = $id;
	}
		
	function recuperarArrayBase() {
		//$baseArray['id']				= $this->id;
		$baseArray['nome']              = $this->nome;
		$baseArray['nome_arquivo']      = $this->nomeArquivo;
		$baseArray['nome_jogo']         = $this->nomeJogo;
		$baseArray['nome_tabela']       = $this->nomeTabela;
		$baseArray['entidade_id']       = $this->entidade->getId();
		
		return $baseArray;
	}
}

?>