<?php
include_once("../inc/conexao.php");
include_once("../model/Usuario.php");
include_once("../dao/UsuarioDAO.php");

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
	$_SESSION["gaming"] = $gaming;
	
	if(intval($escolaridade) <= 3) {
		$formacaoAcademica = null;
	}
	
	$usuarioDAO = new UsuarioDAO();
	
	$emailCadastrado = $usuarioDAO->buscarEmail($email);
	
	if(empty($nome) || empty($email) || empty($senha) || empty($idade) || !isset($genero, $escolaridade, $marketplace, $science, $gaming)) {
		$_SESSION["erro"] = "Favor preencher todos os campos.";
		
		header("location: ../cadastro.php");
	}
	else {
		if(intval($escolaridade) > 3 && empty($formacaoAcademica)) {
			$_SESSION["erro"] = "Favor preencher todos os campos.";
			
			header("location: ../cadastro.php");
		}
		elseif ($emailCadastrado == true) {
			$_SESSION["erro"] = "O e-mail inserido já está cadastrado no sistema.";
			
			header("location: ../cadastro.php");
		}
		else {			
			$usuario = new Usuario($nome, $email, $senha, $idade, $genero, $escolaridade, $formacaoAcademica, $marketplace, $science, $gaming, $situacao);
			
			$usuarioDAO->inserirUsuario($usuario);
			
			header("location: ../cadastro-sucesso.php");
			
			session_destroy();
		}
	}
}

?>