<?php

include_once("../phpmailer/class.phpmailer.php");

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

	function configurarEmail(){
		$mail = new PHPMailer();
		
		$mail->IsSMTP(); 
		$mail->Host = $this->host;
		$mail->SMTPAuth = true;
		$mail->Port = $this->port;
		$mail->SMTPSecure = $this->SMTPSecure;
		$mail->Username = $this->username;
		$mail->Password = $this->password;		
	}
		
	function enviarEmail() {
		
		$this->configurarEmail();
		
		$mail->From = $this->email;
		$mail->FromName = $this->nome;
				
		$mail->Subject  = $this->assunto;
		$mail->Body = $this->mensagem; 
		//$mail->AltBody = "Este é o corpo da mensagem de teste, em Texto Plano! \r\n ";
		
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



?>