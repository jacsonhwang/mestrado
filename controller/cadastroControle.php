<?php
include_once("../inc/conexao.php");
include_once("../model/Usuario.php");
include_once("../dao/UsuarioDAO.php");

if(isset($_POST['buttonCadastrar'])) {
	
	$nome = $_POST["inputNome"];
	$email = $_POST["inputEmail"];
	$senha = $_POST["inputSenha"];
	$idade = $_POST["inputIdade"];
	$genero = $_POST["radioGenero"];
	$escolaridade = $_POST["selectEscolaridade"];
	$formacaoAcademica = $_POST["inputFormacaoAcademica"];
	
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
			
			$usuario = new Usuario($nome, $email, $senha, $idade, $genero, $escolaridade, $formacaoAcademica);
			
			echo "oi";
			
			$usuarioDAO = new UsuarioDAO();
			echo "oi2";
			
			$usuarioDAO->inserirUsuario($usuario);
			
			//header("location: ../index.php");
		}
	}
}

?>