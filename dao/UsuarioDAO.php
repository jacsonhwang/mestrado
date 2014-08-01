<?php

include_once("../inc/conexao.php");

class UsuarioDAO {
	
	private $cn;
	private $tabela = "usuario";
	
	public function inserirUsuario($usuario) {
		echo "teste";
		
		$cn = new Conexao();
		
		$usuarioArray = $usuario->recuperarArrayUsuario();
		
		$cn->insert($this->tabela, $usuarioArray);
		
		$cn->disconnect();
	}
}

?>