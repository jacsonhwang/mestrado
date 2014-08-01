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
	$situacao = '1';
	
	echo $nome."/".$email."/".$senha."/".$idade."/".$genero."/".$escolaridade."/".$formacaoAcademica;
	
	if(empty($nome) || empty($email) || empty($senha) || empty($idade) || !isset($genero, $escolaridade)) {
		echo "\nPÁGINA DE CADASTRO 1";
		//header("location: ../view/cadastro.php");
	}
	else {
		if(intval($escolaridade) > 3 && empty($formacaoAcademica)) {
			echo "\nPÁGINA DE CADASTRO 2";
			//header("location: ../view/cadastro.php");
		}
		else {
			echo "\nPÁGINA INICIAL";
			
			$usuario = new Usuario($nome, $email, $senha, $idade, $genero, $escolaridade, $formacaoAcademica, $situacao);
			
			$usuarioDAO = new UsuarioDAO();
			
			$usuarioDAO->inserirUsuario($usuario);
			
			//header("location: ../index.php");
		}
	}
}

?>