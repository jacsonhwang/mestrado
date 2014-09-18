<?php

include_once __DIR__ . '/../inc/conexao.php';
include_once __DIR__ . '/../dao/EntidadeDAO.php';
//include_once __DIR__ . '/inc/dBug.php';

class EntidadeAlvoDAO {
	
	private $cn;
	
	public function listarQualidadeUsuarios($idEntidade) {
		
		$entidadeDAO = new EntidadeDAO();
		
		$nomeEntidade = $entidadeDAO->recuperarNomeEntidade($idEntidade);
		
		$cn = new Conexao();
		
		$sql = "SELECT eu.usuario_id, eu.nome, SUM(ISNULL(pa.qualidade,0)) AS qualidade
				FROM dbo.entidade_" . $nomeEntidade . "_alvo pa
				INNER JOIN (SELECT u.id AS usuario_id, u.nome AS nome, eu.id AS entidade_usuario_id 
							FROM entidade_usuario eu 
							INNER JOIN usuario u 
							ON eu.usuario_id = u.id 
							WHERE eu.entidade_id = " . $idEntidade . ") eu
				ON pa.entidade_usuario_id = eu.entidade_usuario_id
				GROUP BY eu.usuario_id, eu.nome
				ORDER BY qualidade DESC";
		
		$result = $cn->execute($sql);
		
		$dadosArray = array();
		
		while ($rs = sqlsrv_fetch_array($result)) {
			$id = $rs["usuario_id"];
			$nome = $rs["nome"];
			$qualidade = $rs["qualidade"];
			
			array_push($dadosArray, array("id" => $id, "nome" => $nome, "qualidade" => $qualidade));
		}
		
		$cn->disconnect();
		
		return $dadosArray;
		
	}
}

?>