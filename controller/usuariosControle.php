<?php

include_once __DIR__ . '/../dao/UsuarioDAO.php';

function listarUsuarios() {
	
	$usuarioDAO = new UsuarioDAO();
	
	$usuariosArray = $usuarioDAO->listarUsuarios();
	
	return $usuariosArray;
}

function recuperarUsuario($email) {
	$usuarioDAO = new UsuarioDAO();
	
	$usuario = $usuarioDAO->recuperarUsuario($email);
	
	return $usuario;
}

function guardarUsuarioSessao($usuario) {
	
	$_SESSION["edicao"]["emailAtual"] = $usuario->getEmail();
	$_SESSION["edicao"]["nome"] = $usuario->getNome();
	$_SESSION["edicao"]["email"] = $usuario->getEmail();
	$_SESSION["edicao"]["idade"] = $usuario->getIdade();
	$_SESSION["edicao"]["genero"] = $usuario->getGenero();
	$_SESSION["edicao"]["escolaridade"] = $usuario->getEscolaridade();
	$_SESSION["edicao"]["formacaoAcademica"] = $usuario->getFormacaoAcademica();
	$_SESSION["edicao"]["marketplace"] = $usuario->getMarketplace();
	$_SESSION["edicao"]["science"] = $usuario->getScience();
	$_SESSION["edicao"]["gaming"] = $usuario->getGaming();
	
}

function alterarSituacaoUsuario($email) {
	
	$usuarioDAO = new UsuarioDAO();
	
	$usuario = $usuarioDAO->recuperarUsuario($email);
	
	$usuarioDAO->alterarSituacaoUsuario($email, $usuario->getSituacao());
}

?>