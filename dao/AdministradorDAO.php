<?php

include_once("../inc/conexao.php");

class AdministradorDAO {
	
	private $cn;
	private $tabela = "administrador";
	
	public function loginAdministrador($usuario, $senha){
		
		$cn = new Conexao();
		
		$sql = "SELECT COUNT(1) as quant
				FROM administrador
				WHERE email = '".$usuario."'
		              AND senha = '".$senha."'";
		
		$result = $cn->execute($sql);
		
		while ($rs = sqlsrv_fetch_array($result)) {			
			if($rs['quant'] != 1){
				return false;							
			}
		}

		$sql = "SELECT nome
				FROM administrador
				WHERE email = '".$usuario."'
		              AND senha = '".$senha."'";
		
		$result = $cn->execute($sql);
		
		while ($rs = sqlsrv_fetch_array($result)) {
		
			$novoAdmin = new Administrador($rs["nome"], $usuario, null);
			
			$cn->disconnect();
		
			return $novoAdmin;
		}
		
	}
}

?>