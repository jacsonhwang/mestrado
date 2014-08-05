<?php
include_once("../inc/conexao.php");
include_once("../model/Usuario.php");
include_once("../dao/UsuarioDAO.php");

if(isset($_POST['buttonAlterar'])) {
	
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
			
			$usuarioDAO->alterarUsuario($usuario);
			
			header("location: ../view/alterar-dados-sucesso.php");
		}
	}
}

?>