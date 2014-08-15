<?php

require("../phpmailer/class.phpmailer.php");

class Email {

	private $nome;
	private $email;
	private $assunto;
	private $mensagem;
	
	//configuracoes
	private $host = 'smtp.gmail.com';
	private $port = 465;
	private $SMTPSecure = 'ssl';
	private $username = 'michel.diasdearruda@gmail.com';
	private $password = '';
	
	
	public function __construct($nome, $email, $assunto, $mensagem) {
		$this->nome = $nome;
		$this->email = $email;
		$this->assunto = $assunto;
		$this->mensagem = $mensagem;		
	}
	
	function configurarEmail() {
		$mail = new PHPMailer();
		//$mail->SMTPDebug = true;
		$mail->IsSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Port = 465;
		$mail->SMTPSecure = 'ssl';
		$mail->Username = 'michel.diasdearruda@gmail.com';
		$mail->Password = '';
		
		return $mail;
	}
		
	function enviarEmail() {
		$mail = new PHPMailer();
		//$mail->SMTPDebug = true;
		$mail->IsSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Port = 465;
		$mail->SMTPSecure = 'ssl';
		$mail->Username = 'michel.diasdearruda@gmail.com';
		$mail->Password = '';
		
		$mail->From = $this->email;
		$mail->FromName = $this->nome;

		$mail->AddAddress('michel.diasdearruda@gmail.com', "Michel Gmail");
		
		$mail->Subject  = $this->assunto;
		$mail->Body = $this->mensagem; 
		$mail->AltBody = $this->mensagem;
		
		//$mail->AltBody =  "Este é o corpo da mensagem de teste, em Texto Plano! \r\n ";
		
		$enviado = $mail->Send();
		// Limpa os destinatários e os anexos
		$mail->ClearAllRecipients();
		$mail->ClearAttachments();
		
		
		if ($enviado) {
			return true; 
		} else {
			return false;
		}
	}
	
	function recuperarSenha() {
		$mail = new PHPMailer();
		//$mail->SMTPDebug = true;
		$mail->IsSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Port = 465;
		$mail->SMTPSecure = 'ssl';
		$mail->Username = 'michel.diasdearruda@gmail.com';
		$mail->Password = 'm9216069242';
		
		$mail->From = 'michel.diasdearruda@gmail.com';
		$mail->FromName = "GCER";
		
		$mail->AddAddress($this->email);
		$mail->AddBCC('michel.diasdearruda@gmail.com', $this->email); // Cópia Oculta
		
		$mail->Subject  = $this->assunto;
		$mail->Body = $this->mensagem;
		$mail->AltBody = $this->mensagem;
		
		//$mail->AltBody =  "Este é o corpo da mensagem de teste, em Texto Plano! \r\n ";
		
		$enviado = $mail->Send();
		// Limpa os destinatários e os anexos
		$mail->ClearAllRecipients();
		$mail->ClearAttachments();
		
		
		if ($enviado) {
			return true;
		} else {
			return false;
		}
	}
}

?>