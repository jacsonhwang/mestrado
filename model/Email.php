<?php

include_once __DIR__ . '/../phpmailer/class.phpmailer.php';

class Email {

	private $nome;
	private $email;
	private $assunto;
	private $mensagem;
	
	//configuracoes
	private $host = 'smtp.gmail.com';
	private $port = 465;
	private $SMTPSecure = 'ssl';
	private $username = 'sistema.gcer@gmail.com';
	private $password = 's1st3m4gc3r';
	
	
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
		$mail->Username = $this->$username;
		$mail->Password = $this->password;
		
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
		$mail->Username = $this->username;
		$mail->Password = $this->password;
		
		$mail->From = $this->email;
		$mail->FromName = $this->nome;
		
		$mail->AddAddress($this->username, "GCER SITE");
		
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
		$mail->Username = $this->username;
		$mail->Password = $this->password;
		
		$mail->From = $this->username;
		$mail->FromName = "GCER SITE";
		
		$mail->AddAddress($this->email);
		$mail->AddBCC("GCER Recuperacao Senha", $this->username); // Cópia Oculta
		
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