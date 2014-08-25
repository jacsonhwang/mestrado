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
		
		
		/* foreach($_POST["nomeBD"] as $nomeBD) {
			
			echo $nomeBD . "<br />";
			
		} */
		
	}
	else {
		
		echo "Erro.";
		
	}
}
else {
	
	echo "Erro.";
	
}

?>