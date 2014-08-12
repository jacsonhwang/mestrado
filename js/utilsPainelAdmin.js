$(document).ready(function() {
	$('#buttonUsuarios').click(function () {
		window.location = 'usuarios.php';
	});
	
	$('#buttonTarefa').click(function () {
		window.location = 'tarefa.php';
	});
	
	$('#buttonRodada').click(function () {
		window.location = 'rodada.php';
	});
	
	$('#buttonEntidades').click(function () {
		window.location = 'entidades.php';
	});
	
	$('#buttonBaseDeDados').click(function () {
		window.location = 'base_de_dados.php';
	});
	
	$('#buttonCadastrarEntidade').click(function() {
		window.location = 'cadastrar_entidade.php';
	});
	
	$('#buttonCadastrarTarefa').click(function() {
		window.location = 'cadastrar_tarefa.php';
	});
	
	$('#buttonCadastrarRodada').click(function() {
		window.location = 'cadastrar_rodada.php';
	});
	
	$('#buttonCadastrarBaseDeDado').click(function() {
		window.location = 'cadastrar_base_de_dado.php';
	});
	
	$('#buttonCadastrarUsuario').click(function() {
		window.location = 'cadastro_usuario.php';
	});
	
	$('#buttonExcluirUsuario').click(function() {
	    window.location = 'controller/desativar_usuario.php';
	});
	
	// ---------------------- TABELAS ----------------------
	
	$("#tabelaUsuarios").tablesorter({
		headers: {
			0: { sorter: true },
			1: { sorter: true },
			2: { sorter: false },
			3: { sorter: false }
		}
	}).tablesorterPager({ container: $(".pager"), output: '{startRow}/{endRow} (Total de {totalRows})', });
	
	$("#tabelaEntidades").tablesorter({
		headers: {
			0: { sorter: true },
			1: { sorter: true },
			2: { sorter: true },
			3: { sorter: false },
			4: { sorter: false },
			5: { sorter: false }
		}
	}).tablesorterPager({ container: $(".pager"), output: '{startRow}/{endRow} (Total de {totalRows})', });
	
	$("#tabelaBaseDeDadosGeral").tablesorter({
		headers: {
			0: { sorter: true },
			1: { sorter: true },
			2: { sorter: true },
			3: { sorter: false }
		}
	}).tablesorterPager({ container: $(".pager"), output: '{startRow}/{endRow} (Total de {totalRows})', });
	
	$("#tabelaTarefas").tablesorter({
		headers: {
			0: { sorter: true },
			1: { sorter: true },
			2: { sorter: false },
			3: { sorter: false },
			4: { sorter: false }
		}
	}).tablesorterPager({ container: $(".pager"), output: '{startRow}/{endRow} (Total de {totalRows})', });
	
	$("#tabelaRodadas").tablesorter({
		headers: {
			0: { sorter: true },
			1: { sorter: true },
			2: { sorter: false },
			3: { sorter: false },
			4: { sorter: false }
		}
	}).tablesorterPager({ container: $(".pager"), output: '{startRow}/{endRow} (Total de {totalRows})', });
	
	$("#tabelaBaseDeDados").tablesorter({
		headers: {
			0: { sorter: true },
			1: { sorter: true },
			2: { sorter: true },
			3: { sorter: true },
			4: { sorter: false },
			5: { sorter: false },
			6: { sorter: false }
		}
	}).tablesorterPager({ container: $(".pager"), output: '{startRow}/{endRow} (Total de {totalRows})', });
	
});