<?php

include_once("../inc/conexao.php");

class UsuarioDAO {
	
	private $cn;
	private $tabela = "usuario";
	
	public function inserirUsuario($usuario) {
		
		$cn = new Conexao();
		
		$usuarioArray = $usuario->recuperarArrayUsuario();
		
		$cn->insert($this->tabela, $usuarioArray);
		
		$cn->disconnect();
	}
	
	public function loginUsuario($usuario, $senha){
		
		$usuario = $usuario;
		$senha = md5($senha);
		
		$cn = new Conexao();
		
		$sql = "SELECT COUNT(1) as quant
				FROM usuario
				WHERE email = '".$usuario."'
		              AND senha = '".$senha."'";
		
		$result = $cn->execute($sql);
		
		while ($rs = sqlsrv_fetch_array($result)) {
			if($rs['quant'] != 1){
				return false;							
			}
		}

		$sql = "SELECT nome, idade, genero, escolaridade, formacao_academica, situacao
				FROM usuario
				WHERE email = '".$usuario."'
		              AND senha = '".$senha."'";
		
		$result = $cn->execute($sql);
		
		while ($rs = sqlsrv_fetch_array($result)) {
		
			$novoUsuario = new Usuario($rs["nome"], $usuario, null, $rs["idade"], $rs["genero"], $rs["escolaridade"], $rs["formacao_academica"], $rs['situacao']);
		
			$cn->disconnect();
		
			return $novoUsuario;
		}
		
	}
}

?>