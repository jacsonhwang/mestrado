<?php
include '../dao/EntidadeDAO.php';

include 'dao/EntidadeDAO.php';
include_once '../model/Entidade.php';

$entidadeDAO = new EntidadeDAO();

if(isset($_POST["buttonCadastrarEntidade"])) {
	
	session_start();
	
	if (isset($_SESSION["emailAdmin"])) {
		echo $_POST["inputNome"] . "<br />";
		echo $_POST["inputNomeNoJogo"] . "<br />";
		echo $_POST["descricaoNoJogo"] . "<br />";
		
		$nome = $_POST["inputNome"];
		$nomeJogo = $_POST["inputNomeNoJogo"];
		$descJogo = $_POST["descricaoNoJogo"];

		$entidade = new Entidade(null, $nome, $nomeJogo, $descJogo);
		
		$entidadeDAO->inserirEntidade($entidade);
		
		$entidadeDAO->criarTabelaEntidade($entidade);
		
		$entidadeDAO->criarTabelaEntidadeAlvo($entidade);
		
		$entidadeDAO->criarTabelaResultadoEntidade($entidade);
		
		$entidadeDAO->criarTabelaResultadoEntidadeFinal($entidade);

		$entidadeDAO->criarTabelaGabaritoEntidade($entidade);
	
		$entidadeDAO->inserirTabelaEntidade($entidade);
		
	}
	else {
		
		echo "Erro.";
		
	}
}
else {
	
	echo "Erro.";
	
}

?>