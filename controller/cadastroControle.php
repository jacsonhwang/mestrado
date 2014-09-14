<?php
include_once __DIR__ . '/../inc/conexao.php';
include_once __DIR__ . '/../model/Usuario.php';
include_once __DIR__ . '/../dao/UsuarioDAO.php';

if(isset($_POST['buttonCadastrar'])) {
	
	$nome = addslashes($_POST["inputNome"]);
	$email = addslashes($_POST["inputEmail"]);
	$senha = md5(addslashes($_POST["inputSenha"]));
	$idade = addslashes($_POST["inputIdade"]);
	$genero = addslashes($_POST["radioGenero"]);
	$escolaridade = addslashes($_POST["selectEscolaridade"]);
	$formacaoAcademica = addslashes($_POST["inputFormacaoAcademica"]);
	$marketplace = addslashes($_POST["radioMarketplace"]);
	$science = addslashes($_POST["radioScience"]);
	$gaming = addslashes($_POST["radioGaming"]);
	
	$situacao = '1';
	
	session_start();
	
	$_SESSION["nomeCadastro"] = $nome;
	$_SESSION["emailCadastro"] = $email;
	$_SESSION["idadeCadastro"] = $idade;		
	$_SESSION["generoCadastro"] = $genero;
	$_SESSION["escolaridadeCadastro"] = $escolaridade;
	$_SESSION["formacaoAcademicaCadastro"] = $formacaoAcademica;
	$_SESSION["marketplaceCadastro"] = $marketplace;
	$_SESSION["scienceCadastro"] = $science;
	$_SESSION["gamingCadastro"] = $gaming;
	
	if(intval($escolaridade) <= 3) {
		$formacaoAcademica = null;
	}
	
	$usuarioDAO = new UsuarioDAO();
	
	$emailCadastrado = $usuarioDAO->buscarEmail($email);
	
	if(empty($nome) || empty($email) || empty($senha) || empty($idade) || !isset($genero, $escolaridade, $marketplace, $science, $gaming)) {
		$_SESSION["erro"] = "Favor preencher todos os campos.";
		
		if(!isset($_SESSION["emailAdmin"])) {
			header("location: ../cadastro.php");
		}
		else {
			header("location: ../cadastro_usuario.php");
		}
	}
	else {
		if(intval($escolaridade) > 3 && empty($formacaoAcademica)) {
			$_SESSION["erro"] = "Favor preencher todos os campos.";
			
			if(!isset($_SESSION["emailAdmin"])) {
				header("location: ../cadastro.php");
			}
			else {
				header("location: ../cadastro_usuario.php");
			}
		}
		elseif ($emailCadastrado == true) {
			$_SESSION["erro"] = "O e-mail inserido já está cadastrado no sistema.";
			
			if(!isset($_SESSION["emailAdmin"])) {
				header("location: ../cadastro.php");
			}
			else {
				header("location: ../cadastro_usuario.php");
			}
		}
		else {			
			$usuario = new Usuario($nome, $email, $senha, $idade, $genero, $escolaridade, $formacaoAcademica, $marketplace, $science, $gaming, $situacao);
			
			$usuarioDAO->inserirUsuario($usuario);
			
			header("location: ../cadastro-sucesso.php");
			
			if(isset($_SESSION["emailAdmin"])) {
				unset($_SESSION["nomeCadastro"], $_SESSION["emailCadastro"], $_SESSION["idadeCadastro"], $_SESSION["generoCadastro"],
					  $_SESSION["escolaridadeCadastro"], $_SESSION["formacaoAcademicaCadastro"], $_SESSION["marketplaceCadastro"], 
					  $_SESSION["scienceCadastro"], $_SESSION["gamingCadastro"], $_SESSION["erro"]);
			}
			else {
				session_destroy();
			}
		}
	}
}

?>