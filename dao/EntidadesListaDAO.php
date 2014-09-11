<?php

include_once  __DIR__ . '/../inc/conexao.php';
include_once  __DIR__ . '/../inc/dBug.php';
include_once  __DIR__ . '/../dao/MetaBaseDadosDAO.php';
include_once  __DIR__ . '/../dao/BaseDAO.php';
include_once  __DIR__ . '/../dao/EntidadeDAO.php';
include_once  __DIR__ . '/../model/Entidade.php';

class EntidadesListaDAO {
	
	private $cn;
	
	public function __construct__ () {
		echo "lalala";
	}
	
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
	
	//public function recuperarDados($atributos, $valores, $tabela, $idBaseDados) {
	public function recuperarDados($atributos, $valores, $idBaseDados) {
		
		$cn = new Conexao();
		$baseDadosDAO = new BaseDAO();
		$metaBaseDadosDAO = new MetaBaseDadosDAO();
		
		$nomesColunas = $metaBaseDadosDAO->recuperarNomesColunas($idBaseDados);
		$baseDados = $baseDadosDAO->recuperaObjetoPorBaseDadosId($idBaseDados); 
		$table = $baseDados->getNomeTabela();
		
		$where = null;
		$arrayWhere[] = "(1=1)";
		
		//$arrayTypeColumns = $cn->typeColumns($tabela);
		$arrayTypeColumns = $cn->typeColumns($table);
		
		for($i = 0; $i < count($atributos); $i++) {
			//$where .= $atributos[$i] . "=";
			
			switch ($arrayTypeColumns[$atributos[$i]]) {
				case 'char':
					$arrayWhere[] = $atributos[$i] . " LIKE '%" . $valores[$i] . "%'";
					
					//$where .= "'" . $valores[$i] . "'";
					break;
				case 'datetime':
					$arrayWhere[] = $atributos[$i] . " = '" . $valores[$i] . "'";
					
					///$where .= "'" . $valores[$i] . "'";
					break;
				case 'float':
					$arrayWhere[] = $atributos[$i] . " = " . $valores[$i];
					
					//$where .= $valores[$i];
					break;
				case 'int':
					$arrayWhere[] = $atributos[$i] . " = " . $valores[$i];
					
					//$where .= $valores[$i];
					break;
				case 'numeric':
					$arrayWhere[] = $atributos[$i] . " = " . $valores[$i];
					
					//$where .= $valores[$i];
					break;
				case 'smallint':
					$arrayWhere[] = $atributos[$i] . " = " . $valores[$i];
					
					//$where .= $valores[$i];
					break;
				case 'text':
					$arrayWhere[] = $atributos[$i] . " LIKE '%" . $valores[$i] . "%'";
					
					//$where .= "'" . $valores[$i] . "'";
					break;
				case 'varchar':
					$arrayWhere[] = $atributos[$i] . " LIKE '%" . $valores[$i] . "%'";
					
					//$where .= "'" . $valores[$i] . "'";
					break;
			}
	/* 		
			if($i != count($atributos) - 1) {
				$where .= " AND ";
			} */
		}
		$where = implode(' AND ', $arrayWhere);
				
		$sql =  " SELECT " . $nomesColunas;
		$sql .= " FROM " . $table;
		$sql .= " WHERE " . $where;
				
		/* if ($where != "" && $where != null) {
			$sql .= "WHERE " . $where;	
		 }*/

		$result = $cn->execute($sql);
		
		$dadosArray = array();
		
		//new dBug(sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC));
		
		while ($rs = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
			array_push($dadosArray, $rs);
		}
		
		$cn->disconnect();
		
		return $dadosArray;
	}
	
	function recuperarIdEntidade ($idBaseDados, $id) {
		
		$baseDAO = new BaseDAO();
		
		$baseDados = $baseDAO->recuperaBasePorId($idBaseDados);
		
		$idBaseEntidade = $baseDados->getEntidade()->getId();		
		$nomeTabela = $baseDados->getNomeTabela();
		
		$entidadeDAO = new EntidadeDAO();
		
		$entidade = $entidadeDAO->recuperaEntidadePorId($idBaseEntidade);
		
		$nomeEntidade = strtolower($entidade->getNome());
		
		$cn = new Conexao();
		
		$sql = "SELECT entidade_" . $nomeEntidade . "_id FROM " . $nomeTabela . " WHERE id = " . $id;
		
		$result = $cn->execute($sql);
		
		while ($rs = sqlsrv_fetch_array($result)) {
			$idEntidade = $rs["entidade_" . $nomeEntidade . "_id"];
		}
		
		$cn->disconnect();
		
		return $idEntidade;
	}
	
	function recuperarEntidadeAleatoria($idBaseDados, $nomeTabela, $idEntidade) {
		
		/* $baseDAO = new BaseDAO();
		
		$dados = $baseDAO->recuperarNomeTabelaAleatoria($idEntidade); */
		
		$mbd = new MetaBaseDadosDAO();
		
		$nomesColunas = $mbd->recuperarNomesColunas($idBaseDados);
		
		$cn = new Conexao();
		
		$sql = "SELECT TOP 1 " . $nomesColunas . " FROM " . $nomeTabela . " ORDER BY NEWID()";
		
		$result = $cn->execute($sql);
		
		while ($rs = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
			$entidade = $rs;
		}
		
		//$entidade["idBaseDados"] = $dados["idBaseDados"]; // guarda o id da base de dados
		
		$cn->disconnect();
		
		return $entidade;
	}
}

?>