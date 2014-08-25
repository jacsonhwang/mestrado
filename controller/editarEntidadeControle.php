<?php
include '../dao/EntidadeDAO.php';

include 'dao/EntidadeDAO.php';
include_once '../model/Entidade.php';

if(isset($_POST["buttonEditarEntidade"])) {
	
	session_start();
	$entidadeDAO = new EntidadeDAO();
	if (isset($_SESSION["emailAdmin"])) {
		
		$id = $_SESSION["edicao"]["id"];
		$nome = $_POST["inputNome"]; 
		$nomeJogo = $_POST["inputNomeNoJogo"];
		$descJogo = $_POST["descricaoNoJogo"];
		
		$entidade = new Entidade($id, $nome, $nomeJogo, $descJogo);
		
		$entidadeDAO->alterarEntidade($entidade);
		
		
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