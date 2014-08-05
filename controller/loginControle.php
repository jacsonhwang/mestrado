<?php
include_once("../model/Usuario.php");
include_once("../dao/UsuarioDAO.php");

$email = addslashes($_POST["inputEmail"]);
$senha = addslashes($_POST["inputSenha"]);

if (empty($email) || empty($senha)) {
	header("location: ../view/login-erro.php");
}

else {
	$usuarioDAO = new UsuarioDAO();
		
	$usuario = $usuarioDAO->loginUsuario($email, $senha);

	if ($usuario == false) {
		header("location: ../view/login-erro.php");
	}
	else {
		session_start();
		
		$_SESSION["nome"] = $usuario->getNome();
		$_SESSION["email"] = $usuario->getEmail();
		$_SESSION["idade"] = $usuario->getIdade();		
		$_SESSION["genero"] = $usuario->getGenero();
		$_SESSION["escolaridade"] = $usuario->getEscolaridade();
		$_SESSION["formacaoAcademica"] = $usuario->getFormacaoAcademica();
		
		//header("location: ../view/login-sucesso.php");
	}

	// não entendi
	$situacao = $usuario->getSituacao();

	if ($situacao == 1) {
		echo "ativo";
	}
	elseif ($situacao == 0) {
		echo "desativado";
	}
}


?>