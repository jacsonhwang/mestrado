$(document).ready(function() {
	$("#filtro, #comparador, #dicionario, #arquivos, #tabelaFiltro").hide();
	
	$("#divTabelaFiltroA, #divTabelaFiltroB, #divTabelaFiltroC").hide();
	
	$(".example").TimeCircles({
		time: {
			Days: {
				show: false
			},
			Hours: {
				show: false
			},
			Minutes: {
				text: "Minutos"
			},
			Seconds: {
				text: "Segundos"
			}
		},
		count_past_zero: false
	}).addListener(function(unit, value, total) {
		if(total == 0) {
			alert("O jogo acabou.");
		}
	});
	
	$("#opcaoFiltro").click(function(){
	    
	    if($("#filtro").is(":visible")) {
	    	$(this).parent().removeClass("active");
	        $("#filtro").hide();
	    }
	    else {
	    	$(this).parent().addClass("active");
	    	
	    	$("#opcaoComparador").parent().removeClass("active");
	    	$("#opcaoDicionario").parent().removeClass("active");
	    	$("#opcaoArquivos").parent().removeClass("active");
	    	
	    	$("#comparador, #dicionario, #arquivos").hide();
	        $("#filtro").show();
	    }
	});
	
	$("#opcaoComparador").click(function() {
	    if($("#comparador").is(":visible")) {
	    	$(this).parent().removeClass("active");
            $("#comparador").hide();
        }
        else {
        	$(this).parent().addClass("active");
        	
        	$("#opcaoFiltro").parent().removeClass("active");
	    	$("#opcaoDicionario").parent().removeClass("active");
	    	$("#opcaoArquivos").parent().removeClass("active");
	    	
        	$("#filtro, #dicionario, #arquivos").hide();
            $("#comparador").show();
        }
	});
	
	$("#opcaoDicionario").click(function() {
        if($("#dicionario").is(":visible")) {
        	$(this).parent().removeClass("active");
            $("#dicionario").hide();
        }
        else {
        	$(this).parent().addClass("active");
        	
        	$("#opcaoFiltro").parent().removeClass("active");
	    	$("#opcaoComparador").parent().removeClass("active");
	    	$("#opcaoArquivos").parent().removeClass("active");
	    	
        	$("#filtro, #comparador, #arquivos").hide();
            $("#dicionario").show();
        }
    });
	
	$("#opcaoArquivos").click(function() {
        if($("#arquivos").is(":visible")) {
        	$(this).parent().removeClass("active");
            $("#arquivos").hide();
        }
        else {
        	$(this).parent().addClass("active");
        	
        	$("#opcaoFiltro").parent().removeClass("active");
	    	$("#opcaoComparador").parent().removeClass("active");
	    	$("#opcaoDicionario").parent().removeClass("active");
	    	
        	$("#filtro, #dicionario, #comparador").hide();
            $("#arquivos").show();
        }
    });
	
	$("#liCaixaA").click(function() {
		$("#buttonLimparBusca").click();
		/*$("#divTabelaFiltroA").hide();
		$("#divTabelaFiltroB").hide();
		$("#divTabelaFiltroC").hide();*/
	});
	
	$("#liCaixaB").click(function() {
		$("#buttonLimparBusca").click();
		/*$("#divTabelaFiltroA").hide();
		$("#divTabelaFiltroB").hide();
		$("#divTabelaFiltroC").hide();*/
	});
	
	$("#liCaixaC").click(function() {
		$("#buttonLimparBusca").click();
		/*$("#divTabelaFiltroA").hide();
		$("#divTabelaFiltroB").hide();
		$("#divTabelaFiltroC").hide();*/
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
	
	$("#buttonLimparBusca").click(function() {
		
		$("#divFiltro").find("input:text").each(function() {
			$(this).val("");
		});
		
		$(".divTabelaFiltro").hide();
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