<?php 
include_once '../dao/EntidadeDAO.php';
include_once '../dao/RodadaDAO.php';

include_once '../model/Rodada.php';
include_once '../model/Entidade.php';
  
/*  $rodadaDAO = new RodadaDAO();

$rodadaArray = $rodadaDAO->listarRodada();



foreach ($rodadaArray as $rodada) {
	echo "<br /> Rodada :";
	echo $rodada->getNome();
	echo "<br />";
	echo $rodada->getInicio();
	echo "<br />";
	echo $rodada->getFim();
	echo "<br />";
	echo $rodada->getEntidade()->getNome();
	echo "<br />";
	

} 

print_r($rodadaArray); 

$rodadas = Array();

echo "<br /><br /><br /><br /><br />";
$rodada = new Rodada(null, "aaaaa", null, null, null);
array_push($rodadas , $rodada );
$rodada = new Rodada(null, "bbbb", null, null, null);
array_push($rodadas , $rodada );
print_r($rodadas); 



echo "<br /><br /><br /><br /><br />";
$rodadas1 = Array();
$entidade = new Entidade("1", "Entidade", "ha", "ha1");
	$rodada = new Rodada(null, "aaaaa", null, null, $entidade);
	array_push($rodadas1 , $rodada );
	$rodada = new Rodada(null, "bbbb", null, null, $entidade);
	array_push($rodadas1 , $rodada );
	
	print_r($rodadas1);  */



/* function listarRodada() {
	
	$rodadaDAO = new RodadaDAO();

	$rodadaArray = $rodadaDAO->listarRodada();
 	$rodadaArray = Array();
	$entidade = new Entidade(null, "Entidade", null, null);
	$rodada = new Rodada("1", "Teste", "16/06/1992", "NUNCA !", $entidade);
	array_push($rodadaArray , $rodada);
	
	var_dump($rodadaArray);
	
	return $rodadaArray;
} */

function listarRodada() {

/* 	$rodadaDAO = new RodadaDAO();

	$rodadaArray = $rodadaDAO->listarRodada();
	
	return $rodadaArray; */
	/* $rodadas = Array();
	
	$entidade = new Entidade("1", "Entidade", "ha", "ha1");
	$rodada = new Rodada(null, "aaaaa", null, null, $entidade);
	array_push($rodadas , $rodada );
	$rodada = new Rodada(null, "bbbb", null, null, $entidade);
	array_push($rodadas , $rodada );
	return $rodadas; */
	
	//echo "<br /><br /><br /><br /><br />";
	/* $rodadas1 = Array();
	$entidade = new Entidade("1", "Entidade", "ha", "ha1");
	$rodada = new Rodada(null, "aaaaa", null, null, $entidade);
	array_push($rodadas1 , $rodada );
	$rodada = new Rodada(null, "bbbb", null, null, $entidade);
	array_push($rodadas1 , $rodada );
	
	return $rodadas1; */
	
	$rodadaDAO = new RodadaDAO();
	
	$rodadaArray = array();
	$rodadaArray = $rodadaDAO->listarRodada();
	
	return $rodadaArray;
}  

?>