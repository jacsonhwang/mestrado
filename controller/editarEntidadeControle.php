<?php

if(isset($_POST["buttonEditarEntidade"])) {
	
	session_start();
	
	if (isset($_SESSION["emailAdmin"])) {
		
		echo $_POST["inputNome"] . "<br />";
		echo $_POST["inputNomeNoJogo"] . "<br />";
		echo $_POST["descricaoNoJogo"] . "<br />";
		
		foreach($_POST["nomeBD"] as $nomeBD) {
			
			echo $nomeBD . "<br />";
			
		}
		
	}
	else {
		
		echo "Erro.";
		
	}
}
else {
	
	echo "Erro.";
	
}

?>