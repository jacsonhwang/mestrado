<?php
include_once("../inc/conexao.php");
include_once("../model/Usuario.php");
include_once("../dao/UsuarioDAO.php");

if(isset($_POST['buttonAlterarSenha'])) {

	$senhaAtual = md5(addslashes($_POST["inputSenhaAtual"]));
	$novaSenha = md5(addslashes($_POST["inputNovaSenha"]));

	$situacao = '1';
	
	session_start();
	
	if(isset($_SESSION["email"])) {
		
		$email = $_SESSION["email"];
		$usuarioDAO = new UsuarioDAO();
		$senhaBanco = $usuarioDAO->recuperarSenhaUsuario($email);
	}
	else {
		echo "não está logado";
	}
	
	echo "<br />" . $_SESSION["senha"];
	echo "<br />" . $senhaAtual;

	if(empty($senhaAtual) || empty($novaSenha)) {
		echo "\nCAMPOS VAZIOS";
		//header("location: ../view/cadastro.php");
	}
	else if($senhaAtual == $novaSenha) {
		echo "\nSENHAS IGUAIS";
	}
	else if($senhaAtual != $senhaBanco) {
		echo "\nSENHA ERRADA";
	}
	else {
		echo "\n TUDO OK";
			
		$usuarioDAO = new UsuarioDAO();
			
		$usuarioDAO->alterarSenha($email, $novaSenha);
			
		header("location: ../view/alterar-dados-sucesso.php");
	}
}

?>