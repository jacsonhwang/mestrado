<?php
include_once("../inc/conexao.php");
include_once("inc/conexao.php");
include_once("../model/Entidade.php");
include_once("model/Entidade.php");


/* $cn = new Conexao();
$id = "1";
$sql = "SELECT id, nome, descricao_jogo, nome_jogo
				FROM entidade
				WHERE id = '".$id."'";

$result = $cn->execute($sql);

while ($rs = sqlsrv_fetch_array($result)) {
	$entidade = new Entidade($rs['id'], $rs['nome'], $rs['nome_jogo'], $rs['descricao_jogo']);
}

$cn->disconnect();
var_dump($entidade); */
 
class EntidadeDAO {
	
	private $cn;
	private $tabela = "entidade";
	
	public function listarEntidade(){
	
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
	
	public function recuperaEntidadePorNome($nome){
		$cn = new Conexao();

		$sql = "SELECT id, nome, descricao_jogo, nome_jogo
				FROM entidade
				WHERE nome = '".$nome."'";
		
		$result = $cn->execute($sql);
		
		while ($rs = sqlsrv_fetch_array($result)) {
			$entidade = new Entidade($rs['id'], $rs['nome'], $rs['nome_jogo'], $rs['descricao_jogo']);
		}
		
		$cn->disconnect();
		
		return $entidade;
	}
	
	public function recuperaEntidadePorId($id){
	 	$cn = new Conexao();
	
		$sql = "SELECT id, nome, descricao_jogo, nome_jogo
				FROM entidade
				WHERE id = '".$id."'";
	
		$result = $cn->execute($sql);
	
		while ($rs = sqlsrv_fetch_array($result)) {
			$entidade = new Entidade($rs['id'], $rs['nome'], $rs['nome_jogo'], $rs['descricao_jogo']);
		}
	
		$cn->disconnect();
	 
		return $entidade;
	}
	
	public function inserirEntidade($entidade){
		$cn = new Conexao();
		
		$entidadeArray = $entidade->recuperarArrayEntidade();
		
		$cn->insert($this->tabela, $entidadeArray);
		
		$cn->disconnect();
	}
	
	public function excluirEntidade($id){
		$cn = new Conexao();
	
		$sql = "DELETE FROM entidade WHERE id = '".$id."'";
		
		$result = $cn->execute($sql);
	
		$cn->disconnect();
	}
	
	public function alterarEntidade($entidade) {
	
		$cn = new Conexao();
	
		$sql = "UPDATE entidade
				SET nome='" . $entidade->getNome() . "',
					nome_jogo='" . $entidade->getNomeJogo() . "',
					descricao_jogo='" . $entidade->getDescJogo() . "'					
				WHERE id='" . $entidade->getId() . "';";
	
		$cn->execute($sql);
	
		$cn->disconnect();
	}	
}

?>