<?php
include_once __DIR__ . '/../inc/conexao.php';
include_once __DIR__ . '/../model/Entidade.php';
include_once __DIR__ . '/../model/Usuario.php';

class EntidadUsuarioeDAO {

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

}
?>