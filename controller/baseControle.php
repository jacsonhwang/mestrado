<?php
include_once __DIR__ . '/../dao/BaseDAO.php';

function listarBase() {

	$baseDAO = new BaseDAO();

	$baseArray = $baseDAO->listarBase();

	return $baseArray;
}

function recuperaBasePorId($id){
	$baseDAO = new BaseDAO();

	$base = $baseDAO->recuperaBasePorId($id);

	return $base;
}

function recuperaCamposTabela($id){
	$baseDAO = new BaseDAO();

	$campos = $baseDAO->recuperaCamposTabela($id);

	return $campos;
}

function recuperaRegistrosTabela($nomeTabela){
	$baseDAO = new BaseDAO();

	$registros = $baseDAO->recuperaRegistrosTabela($nomeTabela);

	return $registros;
}

function recuperaDadosArquivo($caminho, $separador){
		
	$campos = array();
	$registros = array();
	$registro = array();
	$retorno = array();
	
	$row = 1;

	if (($handle = fopen($caminho, "r")) !== FALSE) {
		while (($data = fgetcsv($handle, 1000, $separador)) !== FALSE) {
			$num = count($data);
	
			for ($c=0; $c < $num; $c++) {
				if($row == 1){
					array_push($campos , utf8_encode($data[$c]));
				}
				else{
					array_push($registro , utf8_encode($data[$c]));
				}
			}
	
			if($row != 1)
				array_push($registros, $registro);
	
			$registro = array();
	
			$row++;
		}
		fclose($handle);
	}else {
		echo "Erro ao abrir o arquivo";
	}

	$retorno = array("campos"=>$campos,
	            	 "registros"=>$registros);
			
	return $retorno;
}

function recuperarNomeTabela ($idBaseDados) {
	$baseDAO = new BaseDAO();
	
	$nomeTabela = $baseDAO->recuperarNomeTabela($idBaseDados);
	
	return $nomeTabela;
}


/* function excluirEntidade($id){
	$entidadeDAO = new EntidadeDAO();
	
	$entidadeArray = $entidadeDAO->excluirEntidade($id);	
}

function recuperarEntidade($id){
	$entidadeDAO = new EntidadeDAO();

	$entidade = $entidadeDAO->recuperaEntidadePorId($id);
	
	return $entidade; 
}

function guardarEntidadeSessao($entidade) {

	$_SESSION["edicao"]["id"] = $entidade->getId();
	$_SESSION["edicao"]["nome"] = $entidade->getNome();
	$_SESSION["edicao"]["descricao_jogo"] = $entidade->getNomeJogo();
	$_SESSION["edicao"]["nome_jogo"] = $entidade->getDescJogo();	

} */

?>