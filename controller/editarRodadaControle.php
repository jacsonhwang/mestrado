<?php
include_once __DIR__ . '/../dao/UsuarioDAO.php';
include_once __DIR__ . '/../dao/EntidadeDAO.php';
include_once __DIR__ . '/../dao/RodadaDAO.php';
include_once __DIR__ . '/../dao/RodadaUsuarioDAO.php';

include_once '../model/Rodada.php';

if(isset($_POST['buttonCadastrar'])) {
	session_start();
	
	if(isset($_SESSION["emailAdmin"])) {
		
		session_start();
		
		$usuarioDAO = new UsuarioDAO();
		$entidadeDAO = new EntidadeDAO();
		$rodadaDAO = new RodadaDAO();
		$rodadaUsuarioDAO = new RodadaUsuarioDAO();
		
		$id = $_POST["idRodadaEditar"];
		$nome = $_POST["inputNome"];
		$entidadeNome = $_POST["selectEntidade"];
		$inicio = $_POST["inicioRodada"];
		$fim = $_POST["fimRodada"];
		$emailArray = $_POST["emailUsuarioEditar"];
		
		$entidade = $entidadeDAO->recuperaEntidadePorNome($entidadeNome);
		
		$rodada = new Rodada($id, $nome, $inicio, $fim, $entidade);

		$rodadaDAO->atualizarRodada($rodada);
		
		$rodadaUsuarioDAO->alterarUsuarioRodada($rodada, $emailArray);
		
		header("location: ../rodada.php");
	}
	else {
		echo "Erro.";
	}
}
else {
	echo "Erro.";
}

?>