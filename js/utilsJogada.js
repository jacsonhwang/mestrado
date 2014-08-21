$(document).ready(function() {
	$("#filtro, #comparador, #dicionario, #arquivos, #tabelaFiltro").hide();
	
	$("#divTabelaFiltroA, #divTabelaFiltroB, #divTabelaFiltroC").hide();
	
	$("#opcaoFiltro").click(function(){
	    
	    if($("#filtro").is(":visible")) {
	        $("#filtro").hide();
	    }
	    else {
	        $("#filtro").show();
	    }
	});
	
	$("#opcaoComparador").click(function() {
	    if($("#comparador").is(":visible")) {
            $("#comparador").hide();
        }
        else {
            $("#comparador").show();
        }
	});
	
	$("#opcaoDicionario").click(function() {
        if($("#dicionario").is(":visible")) {
            $("#dicionario").hide();
        }
        else {
            $("#dicionario").show();
        }
    });
	
	$("#opcaoArquivos").click(function() {
        if($("#arquivos").is(":visible")) {
            $("#arquivos").hide();
        }
        else {
            $("#arquivos").show();
        }
    });
	
	$("#liCaixaA").click(function() {
		$("#divTabelaFiltroA").hide();
		$("#divTabelaFiltroB").hide();
		$("#divTabelaFiltroC").hide();
	});
	
	$("#liCaixaB").click(function() {
		$("#divTabelaFiltroA").hide();
		$("#divTabelaFiltroB").hide();
		$("#divTabelaFiltroC").hide();
	});
	
	$("#liCaixaC").click(function() {
		$("#divTabelaFiltroA").hide();
		$("#divTabelaFiltroB").hide();
		$("#divTabelaFiltroC").hide();
	});
	
	$("#formCaixaA").submit(function() {
		
		criarTabela(this, "#tabelaFiltroA", "#divTabelaFiltroA", "entidades_lista_a", 1);
		
	});
	
	$("#formCaixaB").submit(function() {
		
		criarTabela(this, "#tabelaFiltroB", "#divTabelaFiltroB", "entidades_lista_b", 2);
		
	});
	
	$("#formCaixaC").submit(function() {
		
		criarTabela(this, "#tabelaFiltroC", "#divTabelaFiltroC", "entidades_lista_c", 3);
		
	});
});

function criarTabela(form, tabela, divTabela, tabelaBanco, idBaseDados) {
	
	$(tabela + " > thead > tr").empty();
	$(tabela + " > tbody").empty();
	
	var atributo = new Array();
	var valor = new Array();
	
	event.preventDefault();
	
	$(form).find("input").each(function() {
		
		if($(this).val() != "") {
			atributo.push($(this).attr("id"));
			valor.push($(this).val());
		}
		
	});
	
	var jogadaAjax = new JogadaAjax();
	
	var dadosArray = jogadaAjax.getDadosEntidade(atributo, valor, tabelaBanco, idBaseDados);
	
	var nomesColunas = jogadaAjax.getNomesColunas(idBaseDados);
	
	$(divTabela).show();
	
	for(var i in nomesColunas) {
		$("<th class='text-center'>").appendTo(tabela + " > thead > tr").html(nomesColunas[i]);
	}
	
	for(var i in dadosArray) {
		$("<tr>").appendTo(tabela + " > tbody");
		
		for(var j in dadosArray[i]) {
			$("<td class='text-center'>").appendTo(tabela + " > tbody > tr:last").html(dadosArray[i][j]);
		}
	}
}