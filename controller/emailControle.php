<?php
include_once("../model/Email.php");

$assunto = $_POST["inputAssunto"];
$mensagem = $_POST["inputMensagem"];

session_start();

$email = $_SESSION["email"];
$nome = $_SESSION["nome"];

//$email = 'micheldarruda@yahoo.com.br';
//$nome = 'Michel Testes';

if (empty($email)) {
	header("location: ../contato-erro.php");
}

else {
	$email = new Email($nome, $email, $assunto, $mensagem);
	$resposta = $email->enviarEmail();
	
	if($resposta){		
		header("location: ../contato-sucesso.php");
		
	}else if(!$resposta){
		header("location: ../contato-erro.php");
	}	
}

?>