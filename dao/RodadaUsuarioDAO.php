<?php
include_once("../inc/conexao.php");
include_once("inc/conexao.php");

class RodadaUsuarioDAO {
	
	private $cn;
	private $tabela = "rodada_usuario";
	
	public function inserirUsuarioRodada($rodada, $emailArray) {
		
		$cn = new Conexao();
		
		$sql = "SELECT id FROM rodada r WHERE r.nome = '".$rodada->getNome()."' AND r.inicio = '".$rodada->getInicio()."'  AND r.fim = '".$rodada->getFim()."'";
		
		$result = $cn->execute($sql);
		
		while ($rs = sqlsrv_fetch_array($result)) {
			$rodadaUsuarioArray['idrodada'] = $rs['id'];	
		}
		
		foreach($emailArray as $email) {
			
			$sql = "SELECT id FROM usuario u WHERE u.email = '".$email."'";
			$result = $cn->execute($sql);
			
			while ($rs = sqlsrv_fetch_array($result)) {
				$rodadaUsuarioArray['idusuario'] = $rs['id'];				
			}
			$cn->insert($this->tabela, $rodadaUsuarioArray);				
		}				
		
		$cn->disconnect();
	}
}

?>