$(document).ready(function() {
	$("#filtro, #comparador, #dicionario, #arquivos, #tabelaFiltro").hide();
	
	$("#divTabelaFiltroA, #divTabelaFiltroB, #divTabelaFiltroC").hide();
	
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
	});
	
	$("#liCaixaB").click(function() {
		$("#buttonLimparBusca").click();
	});
	
	$("#liCaixaC").click(function() {
		$("#buttonLimparBusca").click();
	});
	
	$("#formCaixaA").submit(function() {
		
		criarTabela(this, "#tabelaFiltroA", "#divTabelaFiltroA", "entidade_pessoa_1", 1);
		
	});
	
	$("#formCaixaB").submit(function() {
		
		criarTabela(this, "#tabelaFiltroB", "#divTabelaFiltroB", "entidade_pessoa_2", 2);
		
	});
	
	$("#formCaixaC").submit(function() {
		
		criarTabela(this, "#tabelaFiltroC", "#divTabelaFiltroC", "entidade_pessoa_3", 3);
		
	});
	
	$("#buttonLimparBusca").click(function() {
		
		$("#divFiltro").find("input:text").each(function() {
			$(this).val("");
		});
		
		$(".divTabelaFiltro").hide();
	});
	
	$("#buttonEncerrarJogo").click(function() {	    
	    finalizarJogo(0);
	});
	
	$("#buttonLimparTudo").click(function() {	    
	    $("#poolList, #viewsList").empty();
	});
	
	$("#buttonDesistirJogo").click(function() {	    
		desistirJogo();
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
	var valorExibicaoAtributos = jogadaAjax.getValorExibicaoAtributos(idBaseDados);	
	var nomesAtributos = jogadaAjax.getNomesAtributos(idBaseDados).split(", ");
	
	$(divTabela).show();
	
	for(var i in nomesColunas) {
		
		if(valorExibicaoAtributos[i] == 1) {
			$("<th class='text-center'>").appendTo(tabela + " > thead > tr").html(nomesColunas[i]);
		}
	}
	
	for(var i in dadosArray) {
		$("<tr>").appendTo(tabela + " > tbody").data("id", dadosArray[i]["id"])
		                                                            .data("idBaseDados", idBaseDados);
		
		var k = 0;
		
		for(var j in dadosArray[i]) {
		    if(valorExibicaoAtributos[k] == 1) {
		        $("<td class='text-center'>").appendTo(tabela + " > tbody > tr:last").html(dadosArray[i][j]);
		    }
		    
		    k++;
		}
	}
	
	$(tabela + " > tbody").find("tr").each(function() {
		$(this).draggable({
			containment: ".main",
			helper: function(event) {
				return getEntityLayout(this);
			},
			appendTo: 'body'
		});
	});
}

function finalizarJogo(situacao) {
	
	if(situacao == 0) { // jogo encerrado normalmente, pelo botão
		
		$.blockUI({ message: null });
		
		new Messi("Deseja realmente finalizar o jogo?", {
			title : "Finalizar jogo",
			buttons : [ {
				id : 0,
				label : 'Sim',
				val : 'Y'
			}, {
				id : 1,
				label : 'N&atilde;o',
				val : 'N'
			} ],
			callback: 
				function(val) {
				
				if(val == 'Y') {
					$.unblockUI();
					salvarDados();
				}
				else {
					$.unblockUI();
				}
			}
		});
		
	}
	else if(situacao == 1) { // jogo encerrado após contador finalizar
		
		$.blockUI({ message: null });
	    
	    new Messi("O jogo foi finalizado.", {
	        title : "Fim de jogo",
	        titleClass : 'info',
	        buttons : [ {
	            id : 0,
	            label : 'OK',
	            val : 'X'
	        } ],
	        callback: function(val) {
	            if(val == 'X') {
	                salvarDados();
	            }
	        }
	    });
	}
    
}

function iniciarContador() {
    
    $(".contador").TimeCircles({
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
            finalizarJogo(1);
        }
    });
    
}

function desistirJogo() {
	$.blockUI({ message: null });
	
	new Messi("Deseja realmente sair do jogo? Os dados serão perdidos.", {
		title : "Sair do jogo",
		buttons : [ {
			id : 0,
			label : 'Sim',
			val : 'Y'
		}, {
			id : 1,
			label : 'N&atilde;o',
			val : 'N'
		} ],
		callback: 
			function(val) {
			
			if(val == 'Y') {
				$.unblockUI();
				window.location = "painel_usuario.php";
			}
			else {
				$.unblockUI();
			}
		}
	});
}

function salvarDados() {
	
	var jogadaAjax = new JogadaAjax();
    
    $("#poolList").children().each(function() {
        
        var idBaseDados = $(this).data("idBaseDados");
        var id = $(this).data("id");
        
        var idEntidade = jogadaAjax.recuperarIdEntidade(idBaseDados, id);
        
        console.log(idEntidade);
        
        // pegar os outros ids. como?
    });
    
    $.unblockUI();
    
}

function recuperarEntidadeAleatoria(idEntidade) {
	
	var jogadaAjax = new JogadaAjax();
	
	var dadosTabela = jogadaAjax.recuperarNomeTabelaAleatoria(idEntidade);
	
	console.log(dadosTabela);
	
	var entidade = jogadaAjax.recuperarEntidadeAleatoria(dadosTabela["idBaseDados"], dadosTabela["nomeTabela"], idEntidade);
	
	console.log(entidade);
	
	/*var valorExibicaoAtributos = jogadaAjax.getValorExibicaoAtributos(dadosTabela["idBaseDados"]);
	
	console.log(valorExibicaoAtributos);
	
	var html = "<li class='pull-left'><div class='box'><ul class='box-list'>";
	
	for(var i in entidade) {
		console.log(entidade[i]);
	}*/
	
	/*if($(item).find("td").length > 0) {
		$(item).find("td").each(function() {
			html += "<li>" + $(this).html() + "</li>";
		});
	}
	else {
		$(item).find("li").each(function() {
			html += "<li>" + $(this).html() + "</li>";
		});
	}
	
	html += "</ul></div></div></li>";
	
	$('#data').find(item).css({
		'background':'grey'
	}).removeClass('entity');
	
	$('#poolList').append(html);
	
	console.log(entidade);*/
}