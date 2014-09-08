<?php

class Conexao{

// 	private $host = "146.164.34.73";
// 	private $user = "usuario_site_mestrado";
// 	private $pass = "147/*-mestradojacsonusuariocomum-*/741";
// 	private $db = "mestrado";

	private $host = "146.164.34.73";
	private $user = "sa";
	private $pass = "tG45y#78gHty";
	private $db = "mestrado";
	
	public $query;
	public $link;
	public $result;
	public $params;

	function __construct() {
		$this->connect();
	}

	function connect(){ //Método para abrir e testar a conexão.
		//$connectionInfo = array("UID"=>$this->user, "PWD"=>$this->pass,"Database"=>$this->db, "CharacterSet"  => 'UTF-8');
		$connectionInfo = array("UID"=>$this->user, "PWD"=>$this->pass,"Database"=>$this->db);
		$this->link = sqlsrv_connect($this->host, $connectionInfo);
		if($this->link == false ){
			echo "Conex&atilde;o Falhou.</br>";
			//die( print_r( sqlsrv_errors(), true));
		}else{
			return $this->link;
		}
	}

	function execute($query){ //Método para executar uma query.
		$this->query = $query;
		$this->result = sqlsrv_query($this->link, $this->query);
		//sqlsrv_query("SET NAMES 'utf8'");
		//sqlsrv_query('SET character_set_connection=utf8');
		//sqlsrv_query('SET character_set_client=utf8');
		//sqlsrv_query('SET character_set_results=utf8');
			
		if($this->result == false ){
			echo "Consulta Falhou.</br>";
			die( print_r( sqlsrv_errors(), true));
		}else{
			return $this->result;
		}
	}

	function disconnect(){ //Método para desconectar do banco
		return sqlsrv_close($this->link);
	}

	function typeColumns ($table) {
		$arrayType = null;

		$sql = "SELECT column_name, data_type FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$table';";
		$result = $this->execute($sql);
		while ($rs = sqlsrv_fetch_array($result)) {
			$arrayType[$rs['column_name']] = $rs['data_type'];
		}

		return $arrayType;
	}

	function getLastId ($table) {
		$sql = "SELECT IDENT_CURRENT('".$table."') AS id";
		$result = $this->execute($sql);
		while ($rs = sqlsrv_fetch_array($result)) {
			$id = $rs['id'];
		}

		return $id;
	}

	function insert($table, $data){
		$fields = "";
		$values = "";
		$arrayTypeColumns = $this->typeColumns($table);

		foreach ($data as $key => $value) {

			if (!is_null($value)) {
				$fields .= $key.",";

				switch ($arrayTypeColumns[$key]) {
					case 'char':
						$values .= "'".$value."',";
						break;
					case 'datetime':
						$values .= "'".$value."',";
						break;
					case 'float':
						$values .= $value.",";
						break;
					case 'int':
						$values .= $value.",";
						break;
					case 'numeric':
						$values .= $value.",";
						break;
					case 'smallint':
						$values .= $value.",";
						break;
					case 'text':
						$values .= "'".$value."',";
						break;
					case 'varchar':
						$values .= "'".$value."',";
						break;
				}

			}
		}

		$fields = rtrim ($fields, ",");
		$values = rtrim ($values, ",");

		$sql = "INSERT INTO $table ({$fields}) VALUES ({$values});";
		echo '</br>'.$sql.'</br>';

		$result = $this->execute($sql);

		if (!$result) {
			echo "Erro ao Inserir a consulta".$sql.".<br>";
			//exit;
		} else {
			$result = $this->getLastId($table);
		}

		return $result;
	}
}
?>