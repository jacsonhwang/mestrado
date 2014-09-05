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
	
	$email = new Email(null, $enderecoEmail, "Recuperação de Senha", $mensagem);
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
	
		// Variáveis internas
		$retorno = '';
		$caracteres = '';
	
		// Agrupamos todos os caracteres que poderão ser utilizados
		$caracteres .= $lmin;
		if ($maiusculas) $caracteres .= $lmai;
		if ($numeros) $caracteres .= $num;
		if ($simbolos) $caracteres .= $simb;
	
		// Calculamos o total de caracteres possíveis
		$len = strlen($caracteres);
	
		for ($n = 1; $n <= $tamanho; $n++) {
			// Criamos um número aleatório de 1 até $len para pegar um dos caracteres
			$rand = mt_rand(1, $len);
			// Concatenamos um dos caracteres na variável $retorno
			$retorno .= $caracteres[$rand-1];
		}
	
		return $retorno;
	}
?>