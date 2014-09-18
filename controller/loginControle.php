<?php
include_once("../model/Usuario.php");
include_once("../model/Administrador.php");
include_once("../dao/UsuarioDAO.php");
include_once("../dao/AdministradorDAO.php");

$email = addslashes($_POST["inputEmail"]);
$senha = addslashes($_POST["inputSenha"]);

if (empty($email) || empty($senha)) {
	header("location: ../login-erro.php");
}

else {
	$usuarioDAO = new UsuarioDAO();
		
	$usuario = $usuarioDAO->loginUsuario($email, $senha);

	if ($usuario == false) {
		
		$adminDAO = new AdministradorDAO();
		
		$admin = $adminDAO->loginAdministrador($email, $senha);
		
		if($admin == false) {
			header("location: ../login-erro.php");
		}
		else {			
			session_start();
			
			$_SESSION["nomeAdmin"] = $admin->getNome();
			$_SESSION["emailAdmin"] = $admin->getEmail();
			
			header("location: ../login-sucesso.php");
		}
	}
	else {
		
		if($usuario->getSituacao() == 0) {
			header("location: ../login-erro.php");
		}
		else {
			session_start();
			
			$_SESSION["id"] = $usuario->getId();
			$_SESSION["nome"] = $usuario->getNome();
			$_SESSION["email"] = $usuario->getEmail();
			$_SESSION["idade"] = $usuario->getIdade();
			$_SESSION["genero"] = $usuario->getGenero();
			$_SESSION["escolaridade"] = $usuario->getEscolaridade();
			$_SESSION["formacaoAcademica"] = $usuario->getFormacaoAcademica();
			$_SESSION["marketplace"] = $usuario->getMarketplace();
			$_SESSION["science"] = $usuario->getScience();
			$_SESSION["gaming"] = $usuario->getGaming();
			
			header("location: ../login-sucesso.php");
		}
	}
}
?>