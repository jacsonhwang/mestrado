<?php
include_once '../dao/BaseDAO.php';
include_once '../dao/MetaBaseDadosDAO.php';
include_once '../dao/EntidadeDAO.php';

include_once '../model/BaseDados.php';
include_once 'model/BaseDados.php';

include_once '../model/MetaBaseDados.php';
include_once 'model/MetaBaseDados.php';

include_once '../controller/baseControle.php';


include_once("../dBug.php");


if(isset($_POST["buttonCadastrarBD"])) {
	
	session_start();
	
	if(isset($_SESSION["emailAdmin"])) {
		
		$nomeBase = $_POST["inputNome"];
		$nomeBaseNoJogo = $_POST["inputNomeNoJogo"];
		$nomeEntidade = $_POST["selectEntidade"];
		$nomeArquivo = $_SESSION["nomeArquivo"];
		$chave = $_POST["radio"];
		$atributos = $_POST["atributos"];
		$campos = $_POST["campos"];
		
		$descricaoNoJogo = $_POST["descricaoNoJogo"];
		$nomeNoJogo = $_POST["nomeNoJogo"];
		

		$baseDAO = new BaseDAO();
		$metaBaseDAO = new MetaBaseDadosDAO();

		$entidadeDAO = new EntidadeDAO();	
		
		$entidade = $entidadeDAO->recuperaEntidadePorNome($nomeEntidade);
		
		$nomeTabela = $baseDAO->recuperaNomeNovaTabelaArquivo($entidade);
		
		$base = new Base(null, $nomeBase, $nomeArquivo, $nomeBaseNoJogo, $nomeTabela, $entidade);
		
		$idBase = $baseDAO->inserirBase($base);
		
		foreach ($atributos as $atributo){
			if(in_array($atributo, $campos)){				
				for($i = 0; $i < count($nomeNoJogo); $i++){
					if($campos[$i] == $atributo){
						
						$metaBase = new MetaBaseDados(null, $nomeNoJogo[$i], $base, $nomeNoJogo[$i], $descricaoNoJogo[$i], "1");
						$metaBaseDAO->inserirMetaBase($metaBase);
						
						break;
					}
					
				}
			} else {
				
				$metaBase = new MetaBaseDados(null, $atributo, $base, $atributo, $atributo, "0");
				$metaBaseDAO->inserirMetaBase($metaBase);
			}
		}
	
		$arquivo = "arquivo_3";
		
		
		$baseDAO->criarTabelaBase($chave, $atributos, $entidade, $arquivo);
		
		echo $_SESSION['caminho'];
		$arquivo = recuperaDadosArquivo($_SESSION['caminho'], ';');
		
		new dBug($arquivo); 
			
		$baseDAO->inserirDados($arquivo, $entidade->getNome()."_".$arquivo, $entidade);
		
		/* foreach ($_POST["nomeNoJogo"] as $nomeNoJogo) {
			
			
			echo "<br>Nome no jogo: " . $nomeNoJogo . "<br>";
		}
		
		foreach ($_POST["descricaoNoJogo"] as $descricaoNoJogo) {
			echo "Descrição no jogo: " . $descricaoNoJogo . "<br>";
		} */
		
		
		
		
		
	}
	else {
		
		echo "Erro 1.";
		
	}
	
}
else {
	
	echo "Erro 2.";
	
}

?>