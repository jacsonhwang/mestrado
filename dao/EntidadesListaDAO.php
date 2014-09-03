<?php

include_once("../inc/conexao.php");

include_once("inc/conexao.php");
include_once("MetaBaseDadosDAO.php");
include_once("BaseDAO.php");

include '../dBug.php';

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
	
	public function recuperarDados($atributos, $valores, $tabela, $idBaseDados) {
		
		$mbd = new MetaBaseDadosDAO();
		
		$nomesColunas = $mbd->recuperarNomesColunas($idBaseDados);
		
		$cn = new Conexao();
		
		$where = "";
		
		$arrayTypeColumns = $cn->typeColumns($tabela);
		
		for($i = 0; $i < count($atributos); $i++) {
			$where .= $atributos[$i] . "=";
			
			switch ($arrayTypeColumns[$atributos[$i]]) {
				case 'char':
					$where .= "'" . $valores[$i] . "'";
					break;
				case 'datetime':
					$where .= "'" . $valores[$i] . "'";
					break;
				case 'float':
					$where .= $valores[$i];
					break;
				case 'int':
					$where .= $valores[$i];
					break;
				case 'numeric':
					$where .= $valores[$i];
					break;
				case 'smallint':
					$where .= $valores[$i];
					break;
				case 'text':
					$where .= "'" . $valores[$i] . "'";
					break;
				case 'varchar':
					$where .= "'" . $valores[$i] . "'";
					break;
			}
			
			if($i != count($atributos) - 1) {
				$where .= " AND ";
			}
		}
		
		$sql = "SELECT " . $nomesColunas . " FROM " . $tabela . " WHERE " . $where;
		
		$result = $cn->execute($sql);
		
		$dadosArray = array();
		
		//new dBug(sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC));
		
		while ($rs = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
			array_push($dadosArray, $rs);
		}
		
		$cn->disconnect();
		
		return $dadosArray;
	}
	
	function recuperarIdCSV ($idBaseDados, $id) {
		
		$baseDAO = new BaseDAO();
		
		$nomeTabela = $baseDAO->recuperarNomeTabela($idBaseDados);
		
		$cn = new Conexao();
		
		$sql = "SELECT pessoa_csv_id FROM " . $nomeTabela . " WHERE id = " . $id;
		
		$result = $cn->execute($sql);
		
		while ($rs = sqlsrv_fetch_array($result)) {
			$idCSV = $rs["pessoa_csv_id"];
		}
		
		$cn->disconnect();
		
		return $idCSV;
	}
}

?>