$(document).ready(function() {
	$("#filtro, #comparador, #dicionario, #arquivos, #tabelaFiltro").hide();
	
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
	
	$("#formCaixaA").submit(function() {
		
		var atributo = new Array();
		var valor = new Array();
		
		event.preventDefault();
		
		$(this).find("input").each(function() {
			
			if($(this).val() != "") {
				atributo.push($(this).attr("id"));
				valor.push($(this).val());
			}
			
		});
		
		var jogadaAjax = new JogadaAjax();
		
		var dados = jogadaAjax.getDadosEntidade(atributo, valor, "entidades_lista_a");
		
		//console.log(dados);
		
		var nomesColunas = jogadaAjax.getNomesColunas(1);
		
		console.log(nomesColunas);
		
		/*$("#tabelaFiltro").show();
		
		$("<th>").appendTo("#tabelaFiltro > thead > tr").html("oi");*/
		
	});
});