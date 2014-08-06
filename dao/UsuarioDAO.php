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
	
	public function alterarUsuario ($usuario, $emailAtual) {
		
		$cn = new Conexao();
		
		$sql = "UPDATE usuario
				SET nome='" . $usuario->getNome() . "',
					email='" . $usuario->getEmail() . "',
					idade='" . $usuario->getIdade() . "',
					genero='" . $usuario->getGenero() . "',
					escolaridade='" . $usuario->getEscolaridade() . "',
					formacao_academica='" . $usuario->getFormacaoAcademica() . "'
				WHERE email='" . $emailAtual . "';";
		
		$cn->execute($sql);
		
		$cn->disconnect();	
	}
	
	public function loginUsuario($usuario, $senha){
		
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

		$sql = "SELECT nome, idade, genero, escolaridade, formacao_academica, marketplace, science, gaming, situacao
				FROM usuario
				WHERE email = '".$usuario."'
		              AND senha = '".$senha."'";
		
		$result = $cn->execute($sql);
		
		while ($rs = sqlsrv_fetch_array($result)) {
		
			$novoUsuario = new Usuario($rs["nome"], $usuario, null, $rs["idade"], $rs["genero"], $rs["escolaridade"],
									   $rs["formacao_academica"], $rs["marketplace"], $rs["science"], $rs["gaming"],
									   $rs['situacao']);
		
			$cn->disconnect();
		
			return $novoUsuario;
		}
		
	}
	
	public function recuperarSenhaUsuario($email) {
		
		$cn = new Conexao();
		
		$sql = "SELECT senha FROM usuario WHERE email = '" . $email . "'";
		
		$result = $cn->execute($sql);
		
		while ($rs = sqlsrv_fetch_array($result)) {		
			$senha = $rs["senha"];
		}
		
		$cn->disconnect();
		
		return $senha;
	}
	
	public function alterarSenha ($email, $senha) {
		
		$cn = new Conexao();
		
		$sql = "UPDATE usuario SET senha='" . $senha . "' WHERE email='" . $email . "'";
		
		$cn->execute($sql);
		
		$cn->disconnect();
	}
	
	public function buscarEmail ($email) {
		
		$cn = new Conexao();
		
		$sql = "SELECT COUNT(*) FROM usuario WHERE email='" . $email . "'";
		
		$result = $cn->execute($sql);
		
		while ($rs = sqlsrv_fetch_array($result)) {		
			$quantidade = $rs[0];
		}
		
		$cn->disconnect();
		
		if($quantidade != 0) return true;
		else return false;
	}
}

?>