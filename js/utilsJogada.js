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
	
	$("#buttonFiltrar").click(function() {
	    $("#tabelaFiltro").show();
	});
});