<?php
include_once '../dao/BaseDAO.php';
include_once '../dao/EntidadeDAO.php';

include_once '../model/BaseDados.php';
include_once 'model/BaseDados.php';

include_once("../dBug.php");


if(isset($_POST["buttonCadastrarBD"])) {
	
	session_start();
	
	if(isset($_SESSION["emailAdmin"])) {
		
		$nomeBase = $_POST["inputNome"];
		$nomeBaseNoJogo = $_POST["inputNomeNoJogo"];
		$nomeEntidade = $_POST["selectEntidade"];
		$nomeArquivo = $_SESSION["nomeArquivo"];
		
		echo "Nome: " . $_POST["inputNome"] . "<br />";
		echo "Nome no Jogo: " . $_POST["inputNomeNoJogo"] . "<br />";
		echo "Entidade no Jogo: " . $_POST["selectEntidade"] . "<br />";
		echo "Nome Arquivo: " . $_SESSION["nomeArquivo"] . "<br />";
		echo "<br>Adicionar atributos:<br><br>";
		
		new dBug($_POST);
		//$baseDAO = new BaseDAO();

		//$entidadeDAO = new EntidadeDAO();	
		
		//$entidade = $entidadeDAO->recuperaEntidadePorNome($nomeEntidade);
		
		//$base = new Base(null, $nomeBase, $nomeArquivo, $nomeBaseNoJogo, $nomeEntidade."_csv", $entidade);
		
		//$idBase = $baseDAO->inserirBase($base);
		//$base->setId($idBase);
		
		$descricaoNoJogo = $_POST["descricaoNoJogo"];
		$nomeNoJogo = $_POST["nomeNoJogo"];

		/*
		$arquivo = recuperaDadosArquivo($_SESSION['caminho'], ';');
		
		for($i = 0; $i < count($nomeNoJogo); $i++){
			
			$metaBase = new MetaBaseDados(null, $nomeAtributo, $base, $nomeNoJogo[$i], $descricaoNoJogo[$i]);
			$metaBaseDAO->inserirMetaBase($metaBase);
			
		} */
		
		foreach ($_POST["nomeNoJogo"] as $nomeNoJogo) {
			
			
			echo "Nome no jogo: " . $nomeNoJogo . "<br>";
		}
		
		foreach ($_POST["descricaoNoJogo"] as $descricaoNoJogo) {
			echo "Descrição no jogo: " . $descricaoNoJogo . "<br>";
		}
		
		
		
		
		
	}
	else {
		
		echo "Erro 1.";
		
	}
	
}
else {
	
	echo "Erro 2.";
	
}

?>