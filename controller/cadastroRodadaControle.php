<?php
include_once '../dao/UsuarioDAO.php';
include_once '../dao/EntidadeDAO.php';
include_once '../dao/RodadaDAO.php';
include_once '../dao/RodadaUsuarioDAO.php';

include_once '../model/Rodada.php';

if(isset($_POST['buttonCadastrar'])) {
	session_start();
		
	$usuarioDAO = new UsuarioDAO();
	$entidadeDAO = new EntidadeDAO();	
	$rodadaDAO = new RodadaDAO();
	$rodadaUsuarioDAO = new RodadaUsuarioDAO(); 	
	
	$nome = $_POST["inputNome"];
	$entidadeNome = $_POST["selectEntidade"];
	$inicio = $_POST["inicioRodada"];
	$fim = $_POST["fimRodada"];
	$todosUsuario = $_POST["radioTodosUsuarios"];
	
	if(isset($_SESSION["emailAdmin"])) {
		
		$entidade = $entidadeDAO->recuperaEntidadePorNome($entidadeNome);
		
		$rodada = new Rodada(null, $nome, $inicio, $fim, $entidade);
		
		$rodadaDAO->inserirRodada($rodada);
					
		if($todosUsuario == "n"){
			$emailArray = Array();
			foreach($_POST["emailUsuario"] as $email) {
				array_push($emailArray , $email);
			}
			
			$rodadaUsuarioDAO->inserirUsuarioRodada($rodada, $emailArray);			
			
		} else if ($todosUsuario == "s"){	
			$emailArray = Array();
			$usuariosArray = $usuarioDAO->listarUsuarios();
			
			foreach($usuariosArray as $usuario) {				
				array_push($emailArray , $usuario->getEmail());
			}
			
			$rodadaUsuarioDAO->inserirUsuarioRodada($rodada, $emailArray);
		}		
	}
	else {
		echo "Erro.";
	}
}
else {
	echo "Erro.";
}

?>