$(document).ready(function() {
	$("#filtro, #comparador, #dicionario, #arquivos, #tabelaFiltro").hide();
	
	$(".divTabelaFiltro").hide();
	
	$("#opcaoFiltro").click(function(){
	    
	    if($("#filtro").is(":visible")) {
	    	$(this).parent().removeClass("active");
	    	
	    	$(this).find("img").attr("src", "img/icone-filtro.png");
	    	
	        $("#filtro").hide();
	    }
	    else {
	    	$(this).parent().addClass("active");
	    	
	    	$(this).find("img").attr("src", "img/icone-filtro-ativo.png");
	    	
	    	$("#opcaoComparador").parent().removeClass("active");
	    	$("#opcaoDicionario").parent().removeClass("active");
	    	$("#opcaoArquivos").parent().removeClass("active");
	    	
	    	$("#opcaoComparador").find("img").attr("src", "img/icone-comparador.png");
	    	$("#opcaoDicionario").find("img").attr("src", "img/icone-dicionario.png");
	    	$("#opcaoArquivos").find("img").attr("src", "img/icone-arquivos.png");
	    	
	    	$("#comparador, #dicionario, #arquivos").hide();
	        $("#filtro").show();
	    }
	});
	
	$("#opcaoComparador").click(function() {
	    if($("#comparador").is(":visible")) {
	    	$(this).parent().removeClass("active");
	    	$(this).find("img").attr("src", "img/icone-comparador.png");
            $("#comparador").hide();
        }
        else {
        	$(this).parent().addClass("active");
        	
        	$(this).find("img").attr("src", "img/icone-comparador-ativo.png");
        	
        	$("#opcaoFiltro").parent().removeClass("active");
	    	$("#opcaoDicionario").parent().removeClass("active");
	    	$("#opcaoArquivos").parent().removeClass("active");
	    	
	    	$("#opcaoFiltro").find("img").attr("src", "img/icone-filtro.png");
	    	$("#opcaoDicionario").find("img").attr("src", "img/icone-dicionario.png");
	    	$("#opcaoArquivos").find("img").attr("src", "img/icone-arquivos.png");
	    	
        	$("#filtro, #dicionario, #arquivos").hide();
            $("#comparador").show();
        }
	});
	
	$("#opcaoDicionario").click(function() {
        if($("#dicionario").is(":visible")) {
        	$(this).parent().removeClass("active");
        	$(this).find("img").attr("src", "img/icone-dicionario.png");
            $("#dicionario").hide();
        }
        else {
        	$(this).parent().addClass("active");
        	
        	$(this).find("img").attr("src", "img/icone-dicionario-ativo.png");
        	
        	$("#opcaoFiltro").parent().removeClass("active");
	    	$("#opcaoComparador").parent().removeClass("active");
	    	$("#opcaoArquivos").parent().removeClass("active");
	    	
	    	$("#opcaoFiltro").find("img").attr("src", "img/icone-filtro.png");
	    	$("#opcaoComparador").find("img").attr("src", "img/icone-comparador.png");
	    	$("#opcaoArquivos").find("img").attr("src", "img/icone-arquivos.png");
	    	
        	$("#filtro, #comparador, #arquivos").hide();
            $("#dicionario").show();
        }
    });
	
	$("#opcaoArquivos").click(function() {
        if($("#arquivos").is(":visible")) {
        	$(this).parent().removeClass("active");
        	$(this).find("img").attr("src", "img/icone-arquivos.png");
            $("#arquivos").hide();
        }
        else {
        	$(this).parent().addClass("active");
        	
        	$(this).find("img").attr("src", "img/icone-arquivos-ativo.png");
        	
        	$("#opcaoFiltro").parent().removeClass("active");
	    	$("#opcaoComparador").parent().removeClass("active");
	    	$("#opcaoDicionario").parent().removeClass("active");
	    	
	    	$("#opcaoFiltro").find("img").attr("src", "img/icone-filtro.png");
	    	$("#opcaoComparador").find("img").attr("src", "img/icone-comparador.png");
	    	$("#opcaoDicionario").find("img").attr("src", "img/icone-dicionario.png");
	    	
        	$("#filtro, #dicionario, #comparador").hide();
            $("#arquivos").show();
        }
    });
	
	$(".abaFiltro").click(function() {
		$("#buttonLimparBusca").click();
	});
	
	$(".botaoFiltrar").click(function() {
		var baseDadosId = $('.abaFiltro.active').attr('value');
		var baseDadosNomeJogo = $('.abaFiltro.active').text().trim();
		
		criarTabela("#form"+baseDadosNomeJogo, "#tabelaFiltro"+baseDadosNomeJogo, "#divTabelaFiltro"+baseDadosNomeJogo, baseDadosId);
	});

	$("#buttonLimparBusca").click(function() {
		
		$("#divFiltro").find("input:text").each(function() {
			$(this).val("");
		});
		
		$(".divTabelaFiltro").hide();
	});
	
	$("#buttonEncerrarJogo").click(function() {	    
	    finalizarJogo(1);
	});
	
	$("#buttonLimparTudo").click(function() {	    
	    $("#viewsList").empty();
	    $("#poolList").children().not("#entidadeAlvo").each(function() {
	    	$(this).remove();
	    });
	});
	
	$("#buttonDesistirJogo").click(function() {	    
		desistirJogo();
	});
	
	$(".main").click(function() {
		$(".menu-slider").hide();
		$(".sidebar > .menu-ferramentas > ul > li").removeClass("active");
		
		$("#opcaoFiltro").find("img").attr("src", "img/icone-filtro.png");
    	$("#opcaoComparador").find("img").attr("src", "img/icone-comparador.png");
    	$("#opcaoDicionario").find("img").attr("src", "img/icone-dicionario.png");
    	$("#opcaoArquivos").find("img").attr("src", "img/icone-arquivos.png");
	});
	
	/*$(".sidebar").click(function(e) {
		alert("fechou");
		$(".menu-slider").hide();
		$(".sidebar > ul > li").removeClass("active");
	});*/
	
	/*$(".sidebar").on('click', ':not(.menu-ferramentas, ul, li, a)', function (e) {
		e.stopPropagation();
		alert("fechou");
		console.log(e);
		//$(".menu-slider").hide();
		//$(".sidebar > ul > li").removeClass("active");
	});*/
});

function criarTabela(form, tabela, divTabela, idBaseDados) {
	
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
	
	var dadosArray = jogadaAjax.getDadosEntidade(atributo, valor, idBaseDados);
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
	
	if(situacao == 1) { // jogo encerrado normalmente, pelo bot�o
		
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
					salvarDados(situacao);
				}
				else {
					$.unblockUI();
				}
			}
		});
		
	}
	else if(situacao == 2) { // jogo encerrado ap�s contador finalizar
		
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
	                salvarDados(situacao);
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
            finalizarJogo(2);
        }
    });
    
}

function desistirJogo() {
	$.blockUI({ message: null });
	
	new Messi("Deseja realmente sair do jogo? Os dados ser�o perdidos.", {
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

function salvarDados(situacao) {

	var jogadaAjax = new JogadaAjax();

	var idBaseDados = $("#poolList").find("#entidadeAlvo").data("idBaseDados");
	var idAlvo = $("#poolList").find("#entidadeAlvo").data("id");
	
	var idEntidade = jogadaAjax.recuperarIdEntidade(idBaseDados, idAlvo);
	
	var idEntidadeAlvo = jogadaAjax.inserirEntidadeAlvo(idEntidade, idBaseDados, situacao);

	$("#poolList").children().each(function() {

		var idBaseDados = $(this).data("idBaseDados");
		var id = $(this).data("id");

		var idEntidade = jogadaAjax.recuperarIdEntidade(idBaseDados, id);
		
		jogadaAjax.inserirResultadoEntidade(idBaseDados, idEntidade, idEntidadeAlvo);
	});
	
	$.unblockUI();
	
	/*setTimeout(function() {
		window.location = "painel_usuario.php";
	}, 2000);*/

}

function recuperarEntidadeAleatoria(idEntidade) {
	
	var jogadaAjax = new JogadaAjax();
	
	var dadosTabela = jogadaAjax.recuperarNomeTabelaAleatoria(idEntidade);
	
	var entidade = jogadaAjax.recuperarEntidadeAleatoria(dadosTabela["idBaseDados"], dadosTabela["nomeTabela"], idEntidade);
	
	var valorExibicaoAtributos = jogadaAjax.getValorExibicaoAtributos(dadosTabela["idBaseDados"]);
	
	//var baseDados = jogadaAjax.recuperaObjetoPorBaseDadosId(dadosTabela["idBaseDados"]);
	
	//console.log(baseDados);
	
	var html = "<li class='pull-left' id='entidadeAlvo'><div class='box'><ul class='box-list'>";
	
	html += "<li><div>Refer&ecirc;ncia Alvo</div><div>Caixa #</div><div class='clearfix'></div></li>";
	
	var j = 0;
	
	for(var i in entidade) {
		if(valorExibicaoAtributos[j] == 1) {
			html += "<li>" + entidade[i] + "</li>";
		}
		
		j++;
	}
	
	html += "</ul></div></div></li>";
	
	$('#poolList').append(html);
	
	$("#entidadeAlvo").data("idBaseDados", dadosTabela["idBaseDados"]).data("id", entidade["id"]);
}