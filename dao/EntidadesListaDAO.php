<?php

include_once("inc/conexao.php");
include_once("MetaBaseDadosDAO.php");

class EntidadesListaDAO {
	
	private $cn;
	
	public function recuperarPrimeiraLinha($idBaseDados, $nomeTabela) {
		
		$mbd = new MetaBaseDadosDAO();
		
		$atributos = $mbd->recuperarNomesColunas($idBaseDados);
		
		$cn = new Conexao();
		
		$sql = "SELECT TOP 1 " . $atributos . " FROM " . $nomeTabela;
		
		$result = $cn->execute($sql);
		
		$dadosArray = array();
		
		while ($rs = sqlsrv_fetch_array($result, SQLSRV_FETCH_NUMERIC)) {
			for($i = 0; $i < count($rs); $i++) {
				array_push($dadosArray, $rs[$i]);
			}
		}
		
		$cn->disconnect();
		
		return $dadosArray;
		
	}
}

?>