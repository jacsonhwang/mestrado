<?php
include_once __DIR__ . '/../inc/conexao.php';
include_once __DIR__ . '/../model/Entidade.php';
include_once __DIR__ . '/../model/Usuario.php';

class EntidadeUsuarioDAO {

	private $cn;
	private $tabela = "entidade_usuario";
/* 
	public function recuperarIdEntidadeUsuario($usuario) {
	
		$cn = new Conexao();
		
		$sql = "SELECT entidade_id FROM entidade_usuario WHERE usuario_id = ". $usuario->getId();
	
		$result = $cn->execute($sql);
	
		while ($rs = sqlsrv_fetch_array($result)) {
	
			$entidade = new Entidade($rs["id"]);
		}
	
		$cn->disconnect();
	
		return $idEntidadeUsuario;
	} */
	
	
	public function insereEntidadeUsuario($usuario_id, $entidade_id) {
	
		$cn = new Conexao();
		
		$arrayEntidadeUsuario['usuario_id'] = $usuario_id;
		$arrayEntidadeUsuario['entidade_id'] = $entidade_id;
		
		$cn->insert('entidade_usuario', $arrayEntidadeUsuario);
		
		$cn->disconnect();
		
		return $idEntidadeUsuario;
	}
	
	public function listarPontuacaoUsuarios($idEntidade) {
	
		$entidadeDAO = new EntidadeDAO();
	
		$nomeEntidade = $entidadeDAO->recuperarNomeEntidade($idEntidade);
	
		$cn = new Conexao();
	
		$sql = "SELECT u.id, u.nome, ISNULL(SUM(epa.qualidade), 0) as qualidade
				FROM " . $this->tabela . " eu
				LEFT JOIN usuario u ON eu.usuario_id = u.id
				LEFT JOIN entidade_" . $nomeEntidade . "_alvo epa ON eu.id = epa.entidade_usuario_id
				GROUP BY u.id, u.nome
				ORDER BY qualidade DESC";
	
		$result = $cn->execute($sql);
	
		$dadosArray = array();
	
		while ($rs = sqlsrv_fetch_array($result)) {
			$id = $rs["id"];
			$nome = $rs["nome"];
			$qualidade = $rs["qualidade"];
				
			array_push($dadosArray, array("id" => $id, "nome" => $nome, "qualidade" => $qualidade));
		}
	
		$cn->disconnect();
	
		return $dadosArray;
	
	}
}
?>