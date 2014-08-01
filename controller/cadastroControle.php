<?php
include_once("../inc/conexao.php");

if(isset($_POST['buttonCadastrar'])) {
	
	$nome = $_POST["inputNome"];
	$email = $_POST["inputEmail"];
	$senha = $_POST["inputSenha"];
	$idade = $_POST["inputIdade"];
	$genero = $_POST["inlineRadioOptions"];
	$escolaridade = $_POST["selectEscolaridade"];
	$formacaoAcademica = $_POST["inputFormacaoAcademica"];
	echo $nome."/".$email."/".$senha."/".$idade."/".$genero."/".$escolaridade."/".$formacaoAcademica;
	if(empty($nome) || empty($email) || empty($senha) || empty($idade) || !isset($genero, $escolaridade)) {
		//echo "\nPÁGINA DE CADASTRO";
		//header("location: ../view/cadastro.php");
	}
	else {
		if(intval($escolaridade) > 3 && empty($formacaoAcademica)) {
			//echo "\nPÁGINA DE CADASTRO";
			//header("location: ../view/cadastro.php");
		}
		else {
			//echo "\nPÁGINA INICIAL";
			$cn = new Conexao;				
			$sql = "INSERT INTO usuario (nome, email, senha, idade, genero, escolaridade, formacao_academica) VALUES ('".$nome."','".$email."','".$senha."','".$idade."','".$genero."','".$escolaridade."','".$formacaoAcademica."')";
			$result = $cn->execute($sql);
			$cn->disconnect();
			//header("location: ../index.php");
		}
	}
}

?>