<?php

include_once("dao/UsuarioDAO.php");

function listarUsuarios() {
	$usuarioDAO = new UsuarioDAO();
	
	$usuariosArray = $usuarioDAO->listarUsuarios();
	
	return $usuariosArray;
}

?>