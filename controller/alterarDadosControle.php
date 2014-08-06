<?php
include_once("../inc/conexao.php");
include_once("../model/Usuario.php");
include_once("../dao/UsuarioDAO.php");

if(isset($_POST['buttonAlterar'])) {
	
	session_start();
	
	if(isset($_SESSION["email"])) {
		
		$nome = addslashes($_POST["inputNome"]);
		$email = addslashes($_POST["inputEmail"]);
		$idade = addslashes($_POST["inputIdade"]);
		$genero = addslashes($_POST["radioGenero"]);
		$escolaridade = addslashes($_POST["selectEscolaridade"]);
		$formacaoAcademica = addslashes($_POST["inputFormacaoAcademica"]);
		$situacao = '1';
		
		if(empty($nome) || empty($email) || empty($idade) || !isset($genero, $escolaridade)) {
			echo "\nPÁGINA DE CADASTRO 1";
			//header("location: ../view/cadastro.php");
		}
		else {
			if(intval($escolaridade) > 3 && empty($formacaoAcademica)) {
				echo "\nPÁGINA DE CADASTRO 2";
				//header("location: ../view/cadastro.php");
			}
			else {
				$usuario = new Usuario($nome, $email, null, $idade, $genero, $escolaridade, $formacaoAcademica, $situacao);
					
				$usuarioDAO = new UsuarioDAO();
					
				$usuarioDAO->alterarUsuario($usuario, $_SESSION["email"]);
					
				$_SESSION["nome"] = $usuario->getNome();
				$_SESSION["email"] = $usuario->getEmail();
				$_SESSION["idade"] = $usuario->getIdade();
				$_SESSION["genero"] = $usuario->getGenero();
				$_SESSION["escolaridade"] = $usuario->getEscolaridade();
				$_SESSION["formacaoAcademica"] = $usuario->getFormacaoAcademica();
					
				header("location: ../view/alterar-dados-sucesso.php");
			}
		}
	}
}

?>