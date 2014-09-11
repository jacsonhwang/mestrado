<?php
include_once __DIR__ . '/../inc/conexao.php';
include_once __DIR__ . '/../model/Usuario.php';
include_once __DIR__ . '/../dao/UsuarioDAO.php';

if(isset($_POST['buttonAlterar'])) {
	
	session_start();
	
	if(isset($_SESSION["emailAdmin"])) {
		
		$nome = addslashes($_POST["inputNome"]);
		$email = addslashes($_POST["inputEmail"]);
		$idade = addslashes($_POST["inputIdade"]);
		$genero = addslashes($_POST["radioGenero"]);
		$escolaridade = addslashes($_POST["selectEscolaridade"]);
		$formacaoAcademica = addslashes($_POST["inputFormacaoAcademica"]);
		$marketplace = addslashes($_SESSION["edicao"]["marketplace"]);
		$science = addslashes($_SESSION["edicao"]["science"]);
		$gaming = addslashes($_SESSION["edicao"]["gaming"]);
		
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
			elseif ($emailCadastrado == true && $email != $_SESSION["edicao"]["email"]) {
				$_SESSION["erroAlteracao"] = "O e-mail inserido já está cadastrado no sistema.";
					
				header("location: ../editar_usuario.php");
			}
			else {
				$usuario = new Usuario($nome, $email, null, $idade, $genero, $escolaridade, $formacaoAcademica, $marketplace, $science, $gaming, null);
					
				$usuarioDAO->alterarUsuario($usuario, $_SESSION["edicao"]["emailAtual"]);
				
				unset($_SESSION["edicao"]);
					
				header("location: ../usuarios.php");
				
				if(isset($_SESSION["erroAlteracao"])) {
					unset($_SESSION["erroAlteracao"]);
				}
			}
		}
	}
}

?>