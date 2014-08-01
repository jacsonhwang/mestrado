<?php

class Usuario {
	
	private $nome;
	private $email;
	private $senha;
	private $idade;
	private $genero;
	private $escolaridade;
	private $formacaoAcademica;
	private $situacao;
	
	public function __construct($nome, $email, $senha, $idade, $genero, $escolaridade, $formacaoAcademica, $situacao) {
		$this->nome = $nome;
		$this->email = $email;
		$this->senha = $senha;
		$this->idade = $idade;
		$this->genero = $genero;
		$this->escolaridade = $escolaridade;
		$this->formacaoAcademica = $formacaoAcademica;
		$this->situacao = $situacao;
	}
	
	/* function getNome() {
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
	} */
	
	function getSituacao() {
		return $this->situacao;
	}
	
	function recuperarArrayUsuario() {
		$usuarioArray['nome']               = $this->nome;
		$usuarioArray['email']              = $this->email;
		$usuarioArray['senha']              = $this->senha;
		$usuarioArray['idade']              = $this->idade;
		$usuarioArray['genero']             = $this->genero;
		$usuarioArray['escolaridade']       = $this->escolaridade;
		$usuarioArray['formacao_academica'] = $this->formacaoAcademica;
		$usuarioArray['situacao']           = $this->situacao;
		
		return $usuarioArray;
	}
}

?>