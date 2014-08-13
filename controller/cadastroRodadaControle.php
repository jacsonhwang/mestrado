<?php

if(isset($_POST['buttonCadastrar'])) {
	session_start();
	
	if(isset($_SESSION["emailAdmin"])) {
		echo $_POST["inputNome"] . "<br />";
		echo $_POST["selectEntidade"] . "<br />";
		echo $_POST["inicioRodada"] . "<br />";
		echo $_POST["fimRodada"] . "<br />";
		echo $_POST["radioTodosUsuarios"] . "<br />";
		//echo $_POST["emailUsuario"] . "<br />";
		
		foreach($_POST["emailUsuario"] as $email) {
			echo $email . "<br />";
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