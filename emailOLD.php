<?php

// Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer
require("phpmailer/class.phpmailer.php");

// Inicia a classe PHPMailer
$mail = new PHPMailer();

$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->SMTPSecure = 'ssl';
$mail->Username = "michel.diasdearruda@gmail.com"; // my email which I hope to receive the data inputed on the field
$mail->Password = "";

$mail->SetFrom($email, 'Interessado'); // the email from the person who filled the form, that will be in the body of the message that I will receive
$address = "micheldarruda@yahoo.com.br"; // my email which I hope to receive the data inputed on the field
$mail->AddAddress($address, "Fine Design");
$mail->Subject = "Fine Design - Avise me!";
//$mail->MsgHTML($email);


$mail->SMTPDebug = true;


// Define os dados do servidor e tipo de conex�o
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
/* $mail->IsSMTP(); // Define que a mensagem ser� SMTP
$mail->Host = "smtp.gmail.com"; */ // Endere�o do servidor SMTP
//$mail->SMTPAuth = true; // Usa autentica��o SMTP? (opcional)
//$mail->Username = 'seumail@dominio.net'; // Usu�rio do servidor SMTP
//$mail->Password = 'senha'; // Senha do servidor SMTP

// Define o remetente
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
/* $mail->From = "michel.diasdearruda@gmail.com"; // Seu e-mail
$mail->FromName = "yahoo"; */ // Seu nome

// Define os destinat�rio(s)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
/* $mail->AddAddress('michel.diasdearruda@gmail.com', 'gmail');
$mail->AddAddress('gomes.karine92@gmail.com'); */
//$mail->AddCC('ciclano@site.net', 'Ciclano'); // Copia
//$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // C�pia Oculta

// Define os dados t�cnicos da Mensagem
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
//								$mail->IsHTML(true); // Define que o e-mail ser� enviado como HTML
//$mail->CharSet = 'iso-8859-1'; // Charset da mensagem (opcional)

// Define a mensagem (Texto e Assunto)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->Subject  = "Mensagem Teste"; // Assunto da mensagem

$mail->Body = "Este � o corpo da mensagem de teste, em <b>HTML</b>! ";
$mail->AltBody = "Este � o corpo da mensagem de teste, em Texto Plano! ";

// Define os anexos (opcional)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
//$mail->AddAttachment("c:/temp/documento.pdf", "novo_nome.pdf");  // Insere um anexo
// Envia o e-mail
$enviado = $mail->Send();

// Limpa os destinat�rios e os anexos
$mail->ClearAllRecipients();
$mail->ClearAttachments();

// Exibe uma mensagem de resultado
if ($enviado) {
echo "E-mail enviado com sucesso!";
} else {
echo "N�o foi poss�vel enviar o e-mail.<br /><br />";
echo "<b>Informa��es do erro:</b> <br />" . $mail->ErrorInfo;
}

?>