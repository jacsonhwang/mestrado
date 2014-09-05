<?php
include_once("../model/Email.php");

$assunto = $_POST["inputAssunto"];
$mensagem = $_POST["inputMensagem"];
$email = $_POST["inputEmail"];
$nome = $_POST["inputNome"];

if (empty($email)) {
	header("location: ../contato-erro.php");
} else {
	
	$email = new Email($nome, $email, $assunto, $mensagem);
		
	$resposta = $email->enviarEmail();

	if($resposta){	
		header("location: ../contato-sucesso.php");
		
	}else if(!$resposta){		
		header("location: ../contato-erro.php");
	}	
}

?>