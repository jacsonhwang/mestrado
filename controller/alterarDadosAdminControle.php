<?php
include_once("../inc/conexao.php");
include_once("../model/Usuario.php");
include_once("../dao/UsuarioDAO.php");

if(isset($_POST['buttonAlterar'])) {
	
	session_start();
	
	if(isset($_SESSION["emailAdmin"])) {
		
		$nome = addslashes($_POST["inputNome"]);
		$email = addslashes($_POST["inputEmail"]);
		$idade = addslashes($_POST["inputIdade"]);
		$genero = addslashes($_POST["radioGenero"]);
		$escolaridade = addslashes($_POST["selectEscolaridade"]);
		$formacaoAcademica = addslashes($_POST["inputFormacaoAcademica"]);
		
		if(intval($escolaridade) <= 3) {
			$formacaoAcademica = null;
		}
		
		$usuarioDAO = new UsuarioDAO();
		
		$emailCadastrado = $usuarioDAO->buscarEmail($email);
		
		if(empty($nome) || empty($email) || empty($idade) || !isset($genero, $escolaridade)) {
			$_SESSION["erroAlteracao"] = "Favor preencher todos os campos.";
		
			header("location: ../editar_usuario.php");
		}
		else {
			if(intval($escolaridade) > 3 && empty($formacaoAcademica)) {
				$_SESSION["erroAlteracao"] = "Favor preencher todos os campos.";
			
				header("location: ../editar_usuario.php");
			}
			elseif ($emailCadastrado == true && $email != $_SESSION["email"]) {
				$_SESSION["erroAlteracao"] = "O e-mail inserido já está cadastrado no sistema.";
					
				header("location: ../editar_usuario.php");
			}
			else {
				$usuario = new Usuario($nome, $email, null, $idade, $genero, $escolaridade, $formacaoAcademica, $marketplace, $science, $gaming, $situacao);
					
				$usuarioDAO->alterarUsuario($usuario, $_SESSION["email"]);
					
				$_SESSION["nome"] = $usuario->getNome();
				$_SESSION["email"] = $usuario->getEmail();
				$_SESSION["idade"] = $usuario->getIdade();
				$_SESSION["genero"] = $usuario->getGenero();
				$_SESSION["escolaridade"] = $usuario->getEscolaridade();
				$_SESSION["formacaoAcademica"] = $usuario->getFormacaoAcademica();
				$_SESSION["marketplace"] = $usuario->getMarketplace();
				$_SESSION["science"] = $usuario->getScience();
				$_SESSION["gaming"] = $usuario->getGaming();
					
				header("location: ../alterar-dados-sucesso.php");
				
				if(isset($_SESSION["erroAlteracao"])) {
					unset($_SESSION["erroAlteracao"]);
				}
			}
		}
	}
}

?>