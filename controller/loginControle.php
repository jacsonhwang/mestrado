<?php
	include_once("../model/Usuario.php");
	include_once("../dao/UsuarioDAO.php");

	$email = addslashes($_POST["inputEmail"]);
	$senha = addslashes($_POST["inputSenha"]);

	if(empty($email) || empty($senha)) {
		echo "email ou senh avazio";
		//header("location: ../view/cadastro.php");
	}else{
		$usuarioDAO = new UsuarioDAO();
			
		$usuario = $usuarioDAO->loginUsuario($email, $senha);
		
		if($usuario == false){
			/* header("location: ../view/cadastro.php"); */
			echo "login não aceito";
		}else{
			echo "login aceito";
		}
		
		$situacao = $usuario->getSituacao();
		
		if($situacao == 1){
			echo "ativo";
		}elseif ($situacao == 0){
			echo "desativado";
		}
		
		header("location: ../view/cadastro.php");
	}
	
	
?>