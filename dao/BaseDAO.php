<?php
include_once("../inc/conexao.php");
include_once("inc/conexao.php");
include_once("../model/Base.php");
include_once("model/Base.php");


class EntidadeDAO {

	private $cn;
	private $tabela = "entidade";

	public function listarBase(){
	
		$cn = new Conexao();
		$entidades = array();
	
		$sql = "SELECT id, nome, descricao_jogo, nome_jogo
					FROM entidade";
	
		$result = $cn->execute($sql);
	
		while ($rs = sqlsrv_fetch_array($result)) {
			$entidade = new Entidade($rs['id'], $rs['nome'], $rs['nome_jogo'], $rs['descricao_jogo']);
			array_push($entidades , $entidade);
		}
	
		$cn->disconnect();
	
		return $entidades;
	}
}


?>