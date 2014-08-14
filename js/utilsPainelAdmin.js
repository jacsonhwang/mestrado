$(document).ready(function() {
    
    $("#divTabelaUsuariosRodada").hide();
    $("#tabelaUsuariosParticipantesRodada").hide();
    $("#avisoRodadas").hide();
    
    $("#divTabelaBaseDeDadosAssociadas").hide();
    $("#avisoEntidades").hide();
    
    $("#avisoBD").hide();
    
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
	
	$("#tabelaUsuariosRodada").tablesorter({
        headers: {
            0: { sorter: true },
            1: { sorter: true },
            2: { sorter: false }
        }
    }).tablesorterPager({ container: $(".pager"), output: '{startRow}/{endRow} (Total de {totalRows})', });
	
	// ---------------------- EVENT RODADAS ----------------------
	
	$(".radioTodosUsuarios").click(function() {
	    var value = $(this).val();
	    
	    if(value == "n") {
	        $("#divTabelaUsuariosRodada").show();
	        
	        if($("#tbodyTUP").children().length > 0) {
	            $("#tabelaUsuariosParticipantesRodada").show();
	        }
	        else {
	            $("#tabelaUsuariosParticipantesRodada").hide();
	        }
	    }
	    else if(value == "s") {
	        $("#divTabelaUsuariosRodada").hide();
	        $("#tabelaUsuariosParticipantesRodada").hide();
	    }
	});
	
	$(".associarUsuarioRodada").click(function() {
	    var nome = $(this).parent().parent().find(".nome").html();
	    var email = $(this).parent().parent().find(".email").html();

	    $("<tr>").appendTo("#tbodyTUP").html("<td>" + nome + "</td><input type='hidden' name='emailUsuario[]' value='"+email+"'><td>" + email + "</td><td class='text-center'><img src='img/deactivate.png' class='imagem removerUsuarioRodada'></td>");

	    $("#tabelaUsuariosParticipantesRodada").show();
	});
	
	$('#tabelaUsuariosParticipantesRodada').on('click', 'img.removerUsuarioRodada', function() {
	    $(this).parent().parent().remove();
	    
	    if($("#tbodyTUP").children().length == 0) {
	        $("#tabelaUsuariosParticipantesRodada").hide();
	    }
	});
	
	$(".excluirRodada").click(function() {
	    $(this).parent().parent().remove();
	    
	    if($("#tabelaRodadas tr").length <= 1) {
	        $("#divTabelaRodadas").hide();
	        $("#avisoRodadas").show();
	    }
	});
	
	// ---------------------- EVENT ENTIDADES ----------------------
	
	$(".associarBDEntidade").click(function() {
	    var nomeBD = $(this).parent().parent().find(".nomeBD").html();
	    var nomeNoJogo = $(this).parent().parent().find(".nomeNoJogo").html();
	    var nomeArquivo = $(this).parent().parent().find(".nomeArquivo").html();
	    
	    $("<tr>").appendTo("#tabelaBaseDeDadosAssociadas tbody").html(
	            "<td><input type='hidden' name='nomeBD[]' value='"+nomeBD+"'>" + nomeBD + "</td>" +
	    		"<td>" + nomeNoJogo + "</td>" +
	    		"<td>" + nomeArquivo + "</td>" +
	    		"<td class='text-center'><img src='img/deactivate.png' class='imagem removerBD'></td>"
	    );
	    
	    $("#divTabelaBaseDeDadosAssociadas").show();
	});
	
	$('#tabelaBaseDeDadosAssociadas').on('click', 'img.removerBD', function() {
        $(this).parent().parent().remove();
        
        if($("#tabelaBaseDeDadosAssociadas tbody").children().length == 0) {
            $("#divTabelaBaseDeDadosAssociadas").hide();
        }
    });
	
	$(".excluirEntidade").click(function() {
        $(this).parent().parent().remove();
        
        if($("#tabelaEntidades tr").length <= 1) {
            $("#divTabelaEntidades").hide();
            $("#avisoEntidades").show();
        }
    });
	
	// ---------------------- EVENT BASES DE DADOS ----------------------
	
	$(".adicionarAtributo").click(function() {
	    
	    if($(this).is(":checked")) {
	        
	        $(this).parent().siblings().find(":input").each(function() {
	            $(this).removeAttr("disabled");
	        });
	        
	        if($(this).parent().siblings().find(":checkbox").is(":checked")) {
	            
	            $(this).parent().siblings().find(":text").each(function() {
	                
	                if($(this).is(":disabled") == false) {
	                    $(this).attr("disabled", "");
	                }
	                
	            });
	        }
	        
	    }
	    else {

	        $(this).parent().siblings().find(":input").each(function() {
	            $(this).attr("disabled", "");
	        });

	    }
	});
	
	$(".id").click(function() {

	    if($(this).is(":checked")) {

	        $(this).parent().siblings().find(":text").attr("disabled", "");

	    }
	    else {

	        $(this).parent().siblings().find(":text").removeAttr("disabled");

	    }

	});
	
	$(".excluirBD").click(function() {
        $(this).parent().parent().remove();
        
        if($("#tabelaBaseDeDados tr").length <= 1) {
            $("#divTabelaBaseDeDados").hide();
            $("#avisoBD").show();
        }
    });
	
});