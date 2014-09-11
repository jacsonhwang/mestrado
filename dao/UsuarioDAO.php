<?php

include_once __DIR__ . '/../inc/conexao.php';
include_once __DIR__ . '/../model/Usuario.php';

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
					formacao_academica='" . $usuario->getFormacaoAcademica() . "',
					marketplace='" . $usuario->getMarketplace() . "',
					science='" . $usuario->getScience() . "',
					gaming='" . $usuario->getGaming() . "'
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

		$sql = "SELECT id, nome, idade, genero, escolaridade, formacao_academica, marketplace, science, gaming, situacao
				FROM usuario
				WHERE email = '".$usuario."'
		              AND senha = '".$senha."'";
		
		$result = $cn->execute($sql);
		
		while ($rs = sqlsrv_fetch_array($result)) {
		
			$novoUsuario = new Usuario($rs["nome"], $usuario, null, $rs["idade"], $rs["genero"], $rs["escolaridade"],
									   $rs["formacao_academica"], $rs["marketplace"], $rs["science"], $rs["gaming"],
									   $rs['situacao'], $rs['id']);
		}
		
		$cn->disconnect();
		
		return $novoUsuario;
		
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
		
		if($quantidade != 0) {
			return true;
		}
		else {
			return false;
		}
		
	}
	
	public function listarUsuarios() {
		
		$cn = new Conexao();
		
		$sql = "SELECT id, nome, email, idade, genero, escolaridade, formacao_academica, marketplace, science, gaming, situacao FROM usuario";
		
		$result = $cn->execute($sql);
		
		$usuarioArray = array();
		
		while ($rs = sqlsrv_fetch_array($result)) {
			$id = $rs["id"];
			$nome = $rs["nome"];
			$email = $rs["email"];
			$idade = $rs["idade"];
			$genero = $rs["genero"];
			$escolaridade = $rs["escolaridade"];
			$formacaoAcademica = $rs["formacao_academica"];
			$marketplace = $rs["marketplace"];
			$science = $rs["science"];
			$gaming = $rs["gaming"];
			$situacao = $rs["situacao"];
			
			$usuario = new Usuario($nome, $email, null, $idade, $genero, $escolaridade, $formacaoAcademica, $marketplace, $science, $gaming, $situacao);
			
			array_push($usuarioArray, $usuario);
		}
		
		$cn->disconnect();
		
		return $usuarioArray;
	}
	
	public function recuperarUsuario ($email) {
	
		$cn = new Conexao();
	
		$sql = "SELECT nome, idade, genero, escolaridade, formacao_academica, marketplace, science, gaming, situacao FROM usuario WHERE email='" . $email . "'";
	
		$result = $cn->execute($sql);
	
		while ($rs = sqlsrv_fetch_array($result)) {
			$nome = $rs["nome"];
			$idade = $rs["idade"];
			$genero = $rs["genero"];
			$escolaridade = $rs["escolaridade"];
			$formacaoAcademica = $rs["formacao_academica"];
			$marketplace = $rs["marketplace"];
			$science = $rs["science"];
			$gaming = $rs["gaming"];
			$situacao = $rs["situacao"];
			
			$usuario = new Usuario($nome, $email, null, $idade, $genero, $escolaridade, $formacaoAcademica, $marketplace, $science, $gaming, $situacao);
		}
	
		$cn->disconnect();
	
		return $usuario;
	
	}
	
	public function alterarSituacaoUsuario ($email, $situacao) {
		
		$cn = new Conexao();
		
		if($situacao == 1) {
			$novaSituacao = 0;
		}
		else {
			$novaSituacao = 1;
		}
		
		$sql = "UPDATE usuario SET situacao = " . $novaSituacao . " WHERE email = '" . $email . "'";
		
		$cn->execute($sql);
		
		$cn->disconnect();
	}
	
	public function recuperarObjetoUsuarioPorEmail($email) {
	
		$cn = new Conexao();
	
		$sql = "SELECT id, nome, email, senha, idade, genero, situacao FROM usuario WHERE email = '" . $email . "'";
	
		$result = $cn->execute($sql);
	
		while ($rs = sqlsrv_fetch_array($result)) {
			$usuario = new Usuario($rs["id"], $rs["nome"], $rs["email"], $rs["senha"], $rs["idade"], $rs["genero"], null, null, null, null, null, $rs["situacao"]);
		}
	
		$cn->disconnect();
	
		return $usuario;
	}
	
	public function recuperarIdUsuario($email){
			
	}
}

?>