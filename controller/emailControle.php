<?php
include_once("../model/Email.php");

$assunto = $_POST["inputAssunto"];
$mensagem = $_POST["inputMensagem"];

if (empty($email) || empty($senha)) {
	header("location: ../contato-erro.php");
}

else {
	$email = new Email($_SESSION["nome"], $_SESSION["email"], $assunto, $mensagem);

	$resposta = $email->enviarEmail();
	
	if($resposta){
		header("location: ../contato-sucesso.php");
	}else if(!$resposta){
		header("location: ../contato-erro.php");
	}	
}

?>

