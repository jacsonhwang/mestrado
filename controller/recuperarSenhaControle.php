<?php
	include_once("../model/Email.php");
	include_once("../dao/UsuarioDAO.php");
	
	if(isset($_POST['email'])){
		$enderecoEmail = $_POST['email'];
	}
	
	$novaSenha = geraSenha();
	
	$mensagem =  'Nova senha: '.$novaSenha.
	'<br />Acesse normalmente seu perfil com sua nova senha e a altere para uma senha pessoal';
		
	$usuarioDAO = new UsuarioDAO();
	$usuarioDAO->alterarSenha($enderecoEmail, md5($novaSenha));
	
	$email = new Email(null, $enderecoEmail, "Recupera��o de Senha", $mensagem);
	$resposta = $email->recuperarSenha();
	
	if($resposta){
		echo true;
	}else if(!$resposta){		
		echo false;
	}

	function geraSenha($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false)
	{
		// Caracteres de cada tipo
		$lmin = 'abcdefghijklmnopqrstuvwxyz';
		$lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$num = '1234567890';
		$simb = '!@#$%*-';
	
		// Vari�veis internas
		$retorno = '';
		$caracteres = '';
	
		// Agrupamos todos os caracteres que poder�o ser utilizados
		$caracteres .= $lmin;
		if ($maiusculas) $caracteres .= $lmai;
		if ($numeros) $caracteres .= $num;
		if ($simbolos) $caracteres .= $simb;
	
		// Calculamos o total de caracteres poss�veis
		$len = strlen($caracteres);
	
		for ($n = 1; $n <= $tamanho; $n++) {
			// Criamos um n�mero aleat�rio de 1 at� $len para pegar um dos caracteres
			$rand = mt_rand(1, $len);
			// Concatenamos um dos caracteres na vari�vel $retorno
			$retorno .= $caracteres[$rand-1];
		}
	
		return $retorno;
	}
?>