<?php


		if( $_FILES['file'] ) { // Verifica se o campo n�o est� vazio.
			
			$dir = '\file\\'; // Diret�rio que vai receber o arquivo.
			$tmpName = $_FILES['file']['tmp_name']; // Recebe o arquivo tempor�rio.
			$name = $_FILES['file']['name']; // Recebe o nome do arquivo.				
			
			$raiz = end(explode("/", $_SERVER['DOCUMENT_ROOT']));

 			$pasta = explode("/", $_SERVER['PHP_SELF']);
	
			$caminho = $raiz;
			
			$i = 0;
			
			while($pasta[$i] != 'controller'){
				if($pasta[$i] != '')
						$caminho = $caminho.'\\'.$pasta[$i];
				$i++;
			}
			
			$caminho = $caminho.$dir;
						
			if( move_uploaded_file( $tmpName, $caminho.$name)) {
				session_start();
								
				$_SESSION['inputNome'] = $_POST["inputNome"];
				$_SESSION['inputNomeNoJogo'] = $_POST["inputNomeNoJogo"];
				$_SESSION['selectEntidade'] = $_POST["selectEntidade"];
				$_SESSION['caminho'] = $caminho.$name;
				$_SESSION['nomeArquivo'] = $name;
				
				header("location: ../cadastrar_base_de_dado_arquivo.php");
				
			} else{
				echo "erro ao copiar para o servidor";
			}				

	}
	else {
		echo "erro ao enviar o arquivo";
	}



?>