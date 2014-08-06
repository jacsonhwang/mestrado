<?php

class Administrador {
	
	private $nome;
	private $email;
	private $senha;
	
	public function __construct($nome, $email, $senha) {
		$this->nome = $nome;
		$this->email = $email;
		$this->senha = $senha;
	}
	
	function getNome() {
		return $this->nome;
	}
	
	function getEmail() {
		return $this->email;
	}
	
	function getSenha() {
		return $this->senha;
	}
	
	function recuperarArrayAdministrador() {
		$adminArray['nome']  = $this->nome;
		$adminArray['email'] = $this->email;
		$adminArray['senha'] = $this->senha;
		
		return $adminArray;
	}
}

?>