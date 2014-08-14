<?php

if(isset($_POST["buttonCadastrarBD"])) {
	
	session_start();
	
	if(isset($_SESSION["emailAdmin"])) {
		
		echo "Nome: " . $_POST["inputNome"] . "<br />";
		echo "Nome no Jogo: " . $_POST["inputNomeNoJogo"] . "<br />";
		
		echo "<br>Adicionar atributos:<br><br>";
		
		foreach ($_POST["nomeNoJogo"] as $nomeNoJogo) {
			echo "Nome no jogo: " . $nomeNoJogo . "<br>";
		}
		
		foreach ($_POST["descricaoNoJogo"] as $descricaoNoJogo) {
			echo "Descrição no jogo: " . $descricaoNoJogo . "<br>";
		}
		
	}
	else {
		
		echo "Erro 1.";
		
	}
	
}
else {
	
	echo "Erro 2.";
	
}

?>