<?php
include_once("../inc/conexao.php");
include_once("inc/conexao.php");

include_once 'dao/EntidadeDAO.php';
include_once '../dao/EntidadeDAO.php';

include_once '../model/Rodada.php';
include_once 'model/Rodada.php';

include_once '../model/Entidade.php';
include_once 'model/Entidade.php';

include_once '../model/Usuario.php';
include_once 'model/Usuario.php';

class RodadaDAO {

	private $cn;
	private $tabela = "rodada";

	public function inserirRodada($rodada) {
		
		$cn = new Conexao();
		
		$rodadaArray = $rodada->recuperarArrayRodada();
		
		$cn->insert($this->tabela, $rodadaArray);
		
		$cn->disconnect();
	}
	
	public function listarRodada() {
		
		$cn = new Conexao();
		
		$entidadeDAO = new EntidadeDAO();
		
		$rodadas = Array();
		
		$sql = "SELECT id, nome, convert(varchar(10),inicio,103) as inicio, convert(varchar(10),fim,103) as fim, entidade_id
				FROM rodada";
		
		$result = $cn->execute($sql);
		
		while ($rs = sqlsrv_fetch_array($result)) {
				
			$entidade = $entidadeDAO->recuperaEntidadePorId($rs['entidade_id']);
					
			$rodada = new Rodada($rs['id'], $rs['nome'], $rs['inicio'], $rs['fim'], $entidade);
				
			array_push($rodadas , $rodada);
		}
		
		$cn->disconnect();
		return $rodadas;
	}
	
	public function recuperaRodadaPorId($id){
		$cn = new Conexao();
		
		$sql = "SELECT r.id as id_rodada, r.nome as nome_rodada, convert(varchar(10),r.inicio ,103) as inicio_rodada, convert(varchar(10),r.fim ,103) as fim_rodada,
						   e.id as id_entidade, e.nome as nome_entidade, e.descricao_jogo as descricao_jogo_entidade, e.nome_jogo as nome_jogo_entidade
					FROM rodada r	
					INNER JOIN entidade e on e.id = r.entidade_id
					WHERE r.id = '".$id."'";

		$result = $cn->execute($sql);				
	
		while ($rs = sqlsrv_fetch_array($result)) {			
			$entidade = new Entidade($rs['id_entidade'], $rs['nome_entidade'], $rs['nome_jogo_entidade'], $rs['descricao_jogo_entidade']);
			
			$rodada = new Rodada($rs['id_rodada'], $rs['nome_rodada'], $rs['inicio_rodada'], $rs['fim_rodada'], $entidade);
		}
	
		$cn->disconnect();
		
		return $rodada;
	}
	
	public function excluirRodadaPorId($id){
		$cn = new Conexao();
	
		$sql = "DELETE FROM rodada_usuario WHERE idrodada = '".$id."'";
		echo $sql;
		$result = $cn->execute($sql);			
		
		$sql = "DELETE FROM rodada WHERE id = '".$id."'";
		echo $sql;
		$result = $cn->execute($sql);
			
		$cn->disconnect();
	}	
	
	public function listarUsuarios($id) {
	
		$cn = new Conexao();
	
		$usuarios = Array();
	
		$sql = "SELECT nome, email, idade, genero, escolaridade, formacao_academica, marketplace, science, gaming, situacao
				FROM rodada_usuario ru
				INNER JOIN usuario u on u.id = ru.idusuario
				WHERE idrodada = '".$id."'";
	
		$result = $cn->execute($sql);
	
		while ($rs = sqlsrv_fetch_array($result)) {
	
			$usuario = new Usuario($rs['nome'], $rs['email'], null, $rs['idade'], $rs['genero'], $rs['escolaridade'], $rs['formacao_academica'], $rs['marketplace'], $rs['science'], $rs['gaming'], $rs['situacao']);			
	
			array_push($usuarios , $usuario);
		}
	
		$cn->disconnect();
		return $usuarios;
	}
	
	
	public function atualizarRodada($rodada) {
	
		$cn = new Conexao();
	
		$sql = "UPDATE rodada
				SET nome='" . $rodada->getNome() . "',
					inicio='" . $rodada->getInicio() . "',
					fim='" . $rodada->getFim() . "',
					entidade_id='" . $rodada->getEntidade()->getId() . "'					
				WHERE id='" . $rodada->getId() . "';";
		
		$cn->execute($sql);
	
		$cn->disconnect();
	}
	
}

?>