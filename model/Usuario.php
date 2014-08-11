<?php

class Usuario {
	
	//private $id;
	private $nome;
	private $email;
	private $senha;
	private $idade;
	private $genero;
	private $escolaridade;
	private $formacaoAcademica;
	private $marketplace;
	private $science;
	private $gaming;
	private $situacao;
	
	public function __construct($nome, $email, $senha, $idade, $genero, $escolaridade, $formacaoAcademica, $marketplace, $science, $gaming, $situacao) {
		//$this->id = $id;
		$this->nome = $nome;
		$this->email = $email;
		$this->senha = $senha;
		$this->idade = $idade;
		$this->genero = $genero;
		$this->escolaridade = $escolaridade;
		$this->formacaoAcademica = $formacaoAcademica;
		$this->marketplace = $marketplace;
		$this->science = $science;
		$this->gaming = $gaming;
		$this->situacao = $situacao;
	}
	
	/* function getId() {
		return $this->id;
	} */
	
	function getNome() {
		return $this->nome;
	}
	
	function getEmail() {
		return $this->email;
	}
	
	function getSenha() {
		return $this->senha;
	}
	
	function getIdade() {
		return $this->idade;
	}
	
	function getGenero() {
		return $this->genero;
	}
	
	function getEscolaridade() {
		return $this->escolaridade;
	}
	
	function getFormacaoAcademica() {
		return $this->formacaoAcademica;
	}
	
	function getMarketplace() {
		return $this->marketplace;
	}
	
	function getScience() {
		return $this->science;
	}
	
	function getGaming() {
		return $this->gaming;
	}
	
	function getSituacao() {
		return $this->situacao;
	}
	
	function recuperarArrayUsuario() {
		//$usuarioArray['id']					= $this->id;
		$usuarioArray['nome']               = $this->nome;
		$usuarioArray['email']              = $this->email;
		$usuarioArray['senha']              = $this->senha;
		$usuarioArray['idade']              = $this->idade;
		$usuarioArray['genero']             = $this->genero;
		$usuarioArray['escolaridade']       = $this->escolaridade;
		$usuarioArray['formacao_academica'] = $this->formacaoAcademica;
		$usuarioArray['marketplace']		= $this->marketplace;
		$usuarioArray['science']			= $this->science;
		$usuarioArray['gaming']				= $this->gaming;
		$usuarioArray['situacao']           = $this->situacao;
		
		return $usuarioArray;
	}
}

?>