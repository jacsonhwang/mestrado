<?php
include_once("../inc/conexao.php");
include_once("../model/Usuario.php");
include_once("../dao/UsuarioDAO.php");

if(isset($_POST['buttonAlterarSenha'])) {

	$senhaAtual = md5(addslashes($_POST["inputSenhaAtual"]));
	$novaSenha = md5(addslashes($_POST["inputNovaSenha"]));

	$situacao = '1';
	
	session_start();
		
	$email = $_SESSION["email"];
	$usuarioDAO = new UsuarioDAO();
	$senhaBanco = $usuarioDAO->recuperarSenhaUsuario($email);

	if(empty($senhaAtual) || empty($novaSenha)) {
		$_SESSION["erroSenha"] = "Favor preencher todos os campos.";
		
		header("location: ../view/alterar-senha.php");
	}
	else if($senhaAtual == $novaSenha) {
		$_SESSION["erroSenha"] = "A nova senha não pode ser idêntica à senha atual.";
		
		header("location: ../view/alterar-senha.php");
	}
	else if($senhaAtual != $senhaBanco) {
		$_SESSION["erroSenha"] = "Senha incorreta.";
		
		header("location: ../view/alterar-senha.php");
	}
	else {			
		$usuarioDAO = new UsuarioDAO();
			
		$usuarioDAO->alterarSenha($email, $novaSenha);
			
		header("location: ../view/alterar-dados-sucesso.php");
	}
}

?>