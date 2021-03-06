<?php
include_once __DIR__ . '/../inc/conexao.php';
include_once __DIR__ . '/../model/Usuario.php';
include_once __DIR__ . '/../dao/UsuarioDAO.php';

if(isset($_POST['buttonAlterar'])) {
	
	session_start();
	
	if(isset($_SESSION["email"])) {
		
		$nome = addslashes($_POST["inputNome"]);
		$email = addslashes($_POST["inputEmail"]);
		$idade = addslashes($_POST["inputIdade"]);
		$genero = addslashes($_POST["radioGenero"]);
		$escolaridade = addslashes($_POST["selectEscolaridade"]);
		$formacaoAcademica = addslashes($_POST["inputFormacaoAcademica"]);
		$marketplace = addslashes($_POST["radioMarketplace"]);
		$science = addslashes($_POST["radioScience"]);
		$gaming = addslashes($_POST["radioGaming"]);
		$situacao = '1';
		
		if(intval($escolaridade) <= 3) {
			$formacaoAcademica = null;
		}
		
		$usuarioDAO = new UsuarioDAO();
		
		$emailCadastrado = $usuarioDAO->buscarEmail($email);
		
		if(empty($nome) || empty($email) || empty($idade) || !isset($genero, $escolaridade, $marketplace, $science, $gaming)) {
			$_SESSION["erroAlteracao"] = "Favor preencher todos os campos.";
		
			header("location: ../alterar-dados.php");
		}
		else {
			if(intval($escolaridade) > 3 && empty($formacaoAcademica)) {
				$_SESSION["erroAlteracao"] = "Favor preencher todos os campos.";
			
				header("location: ../alterar-dados.php");
			}
			elseif ($emailCadastrado == true && $email != $_SESSION["email"]) {
				$_SESSION["erroAlteracao"] = "O e-mail inserido j� est� cadastrado no sistema.";
					
				header("location: ../alterar-dados.php");
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