<?php
include_once("../inc/conexao.php");
include_once("inc/conexao.php");


include_once '../model/BaseDados.php';
include_once 'model/BaseDados.php';


include_once '../model/Entidade.php';
include_once 'model/Entidade.php';

class BaseDAO {

	private $cn;
	private $tabela = "base_dados";
	
	public function inserirBase($base) {
	
		$cn = new Conexao();

		$baseArray = $base->recuperarArrayBase();
	
		$idBase = $cn->insert($this->tabela, $baseArray);
	
		$cn->disconnect();
		
		return $idBase;
	}

	public function listarBase(){
	
		$cn = new Conexao();
		$bases = array();
		
		$sql = "SELECT b.id as base_id, b.nome as base_nome, b.nome_arquivo as base_nome_arquivo, b.nome_jogo as base_nome_jogo, 
				       b.nome_tabela as base_nome_tabela, b.entidade_id as base_entidade_id,
	                   e.nome as entidade_nome, e.nome_jogo as entidade_nome_jogo, e.descricao_jogo as entidade_descricao_jogo	
                FROM base_dados b
                     INNER JOIN entidade e on b.entidade_id = e.id";
		$result = $cn->execute($sql);
	
		while ($rs = sqlsrv_fetch_array($result)) {
				
			$entidade = new Entidade($rs['base_entidade_id'], $rs['entidade_nome'], $rs['entidade_nome_jogo'], $rs['entidade_descricao_jogo']);

			$base = new Base($rs['base_id'], $rs['base_nome'], $rs['base_nome_arquivo'], $rs['base_nome_jogo'], $rs['base_nome_tabela'], $entidade);
		
			array_push($bases , $base);
		}
	
		$cn->disconnect();
	
		return $bases;
	}
	
	public function recuperaBasePorId($id){
	
		$cn = new Conexao();
	
		$sql = "SELECT b.id as base_id, b.nome as base_nome, b.nome_arquivo as base_nome_arquivo, b.nome_jogo as base_nome_jogo,
				       b.nome_tabela as base_nome_tabela, b.entidade_id as base_entidade_id,
	                   e.nome as entidade_nome, e.nome_jogo as entidade_nome_jogo, e.descricao_jogo as entidade_descricao_jogo
                FROM base_dados b
                     INNER JOIN entidade e on b.entidade_id = e.id
				WHERE b.id = '".$id."'";
		
		$result = $cn->execute($sql);
	
		while ($rs = sqlsrv_fetch_array($result)) {
	
			$entidade = new Entidade($rs['base_entidade_id'], $rs['entidade_nome'], $rs['entidade_nome_jogo'], $rs['entidade_descricao_jogo']);
	
			$base = new Base($rs['base_id'], $rs['base_nome'], $rs['base_nome_arquivo'], $rs['base_nome_jogo'], $rs['base_nome_tabela'], $entidade);
	
		}
	
		$cn->disconnect();
	
		return $base;
	}
	
	public function recuperaCamposTabela($id){
	
		$cn = new Conexao();
		$campos = array();
		
		$sql = "SELECT nome_atributo
				FROM meta_base_dados
				WHERE base_dados_id = '".$id."'";
			
		$result = $cn->execute($sql);
	
		while ($rs = sqlsrv_fetch_array($result)) {
	
			array_push($campos , $rs['nome_atributo']);			
	
		}
	
		$cn->disconnect();
	
		return $campos;
	}
	
	public function recuperaRegistrosTabela($nomeTabela){
	
		$cn = new Conexao();
		$registros = array();
	
		$sql = "SELECT top(20)*
				FROM ".$nomeTabela;
			
		$result = $cn->execute($sql);
	
		while ($rs = sqlsrv_fetch_array($result)) {
			
			array_push($registros , $rs);
	
		}
	
		$cn->disconnect();
	
		return $registros;
	}
	
	public function recuperarNomeTabela ($idBaseDados) {
	
		$cn = new Conexao();
	
		$sql = "SELECT nome_tabela FROM " . $this->tabela . " WHERE id = " . $idBaseDados;
	
		$result = $cn->execute($sql);
	
		$nomeTabela = "";
	
		while($rs = sqlsrv_fetch_array($result)) {
			$nomeTabela = $rs["nome_tabela"];
		}
	
		$cn->disconnect();
	
		return $nomeTabela;
	}
	
	public function criarTabelaBase($chave, $atributos, $entidade, $nomeTabela) {
	
		$cn = new Conexao();
	
		$sql = "CREATE TABLE [dbo].[".$nomeTabela."]( ";
		
		foreach($atributos as $atributo){
			if($atributo == $chave)
				$sql = $sql."[".$atributo."][varchar](100) NOT NULL, ";
			else 
				$sql = $sql."[".$atributo."][varchar](100) NULL, ";
		}
		
		$sql = $sql."[".$entidade->getNome()."_id] INT NOT NULL,
 						CONSTRAINT [PK_".$nomeTabela."] PRIMARY KEY CLUSTERED(
 						[".$chave."] ASC
					)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
					) ON [PRIMARY] ";
		
		$sql = $sql."ALTER TABLE [dbo].[".$nomeTabela."]  WITH CHECK ADD  CONSTRAINT [FK_".$nomeTabela."_entidade_".$entidade->getNome()."] FOREIGN KEY([".$entidade->getNome()."_id])
					REFERENCES [dbo].[entidade_".$entidade->getNome()."] ([id])
	
				ALTER TABLE [dbo].[".$nomeTabela."] CHECK CONSTRAINT [FK_".$nomeTabela."_entidade_".$entidade->getNome()."]";

		$cn->execute($sql);
	
		$cn->disconnect();
	}
	
	public function inserirDados($arquivo, $tabela, $entidade) {
		$cn = new Conexao();

		$id = $cn->getLastId("entidade_".$entidade->getNome());
		
		$campos = $arquivo['campos'];
		$registros = $arquivo['registros'];
		
		$sql = "INSERT INTO ".$tabela." ( ";
		
		foreach($campos as $campo){
			$sql = $sql.$campo.", ";
		}
		
		$sql = $sql.$entidade->getNome()."_id";
				
		$sql = $sql." ) VALUES ( ";
		
		foreach($registros as $registro){
			$sql2 = $sql;
			foreach($registro as $dado){
				$sql2 = $sql2."'".$dado."', ";
			}
			$sql2 = $sql2.$id." );";
			
			$cn->execute($sql2);			
		}
		echo $sql2;
		$cn->disconnect();
	}
	
	public function recuperaNomeNovaTabelaArquivo($entidade){
	
		$cn = new Conexao();
	
		$sql = "SELECT top(1) b.nome_tabela 
				FROM entidade e 
				     INNER JOIN base_dados b on e.id = b.entidade_id
				WHERE e.nome = '".$entidade->getNome()."'
				ORDER BY b.nome_tabela DESC";
	
		$result = $cn->execute($sql);
	
		while ($rs = sqlsrv_fetch_array($result)) {
	
			$nome_tabela = $rs['nome_tabela'];
	
		}
		
		if(!empty($nome_tabela)){
			$pos = strrpos($nome_tabela, "_");
			
			$numero = substr($nome_tabela, $pos+1, count($nome_tabela));
			$numero = $numero+1;
			$nome_tabela = substr($nome_tabela, 0, $pos)."_".$numero;
		} else {
			$nome_tabela = "entidade_".$entidade->getNome()."_1";
		}
		
			
		$cn->disconnect();
	
		return $nome_tabela;
	}
	
	public function recuperarNomeTabelaAleatoria ($idEntidade) {
		
		$cn = new Conexao();
		
		$sql = "SELECT TOP 1 id, nome_tabela FROM base_dados WHERE entidade_id = " . $idEntidade . " ORDER BY NEWID()";
		
		$result = $cn->execute($sql);
		
		$dados = array();
		
		while ($rs = sqlsrv_fetch_array($result)) {
			
			$dados["idBaseDados"] = $rs['id'];
		
			$dados["nomeTabela"] = $rs['nome_tabela'];		
		}
		
		$cn->disconnect();
		
		return $dados;
	}
}

?>