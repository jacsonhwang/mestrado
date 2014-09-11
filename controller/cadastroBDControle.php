<?php
include_once __DIR__ . '/../dao/BaseDAO.php';
include_once __DIR__ . '/../dao/MetaBaseDadosDAO.php';
include_once __DIR__ . '/../dao/EntidadeDAO.php';
include_once __DIR__ . '/../model/BaseDados.php';
include_once __DIR__ . '/../model/MetaBaseDados.php';
include_once __DIR__ . '/../controller/baseControle.php';
include_once __DIR__ . '/../inc/dBug.php';


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
		
		
		$baseDAO->criarTabelaBase($chave, $atributos, $entidade, $nomeTabela);
		
		$arquivo = recuperaDadosArquivo($_SESSION['caminho'], ';');
				
		$baseDAO->inserirDados($arquivo, $nomeTabela, $entidade);
		
	}
	else {
		
		echo "Erro 1.";
		
	}
	
}
else {
	
	echo "Erro 2.";
	
}

?>