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
	    		
	    	$("#filtro table > thead > tr").empty();
	    	$("#filtro table > tbody").empty();
	    	
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
		
		criarTabela(baseDadosNomeJogo, baseDadosId);
	});
	
	$(".formFiltro > div > div > input").keypress(function(event) {
	    
	    var keycode = (event.keyCode ? event.keyCode : event.which);
	    
	    if(keycode == '13'){
	        
	        var baseDadosId = $('.abaFiltro.active').attr('value');
	        var baseDadosNomeJogo = $('.abaFiltro.active').text().trim();
	        
	        criarTabela(baseDadosNomeJogo, baseDadosId);
	        
	    }
	});

	$("#buttonLimparBusca").click(function() {
		
		$("#divFiltro").find("input:text").each(function() {
			$(this).val("");
		});
		
		$(".divTabelaFiltro").hide();
	});
	
	$("#buttonComparar").click(function() {
		/*$("#divFiltro").find("input:text").each(function() {
			$(this).val("");
		});
		
		$(".divTabelaFiltro").hide();*/
	});
	
	$("#buttonEncerrarJogo").click(function() {	    
	    finalizarJogo(1);
	});
	
	$("#buttonLimparTudo").click(function() {
		limparJogo();
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

function criarTabela(baseDadosNomeJogo, idBaseDados) {
	
	var form = "#form" + baseDadosNomeJogo; 
	var tabela = "#tabelaFiltro"+ baseDadosNomeJogo;
	var divTabela = "#divTabelaFiltro"+ baseDadosNomeJogo;
	
	
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
		
		if(valorExibicaoAtributos[i] == 1 && nomesColunas[i] != 'Imagem') {
			$("<th class='text-center'>").appendTo(tabela + " > thead > tr").html(nomesColunas[i]);
		}
		
		else if(valorExibicaoAtributos[i] == 1 && nomesColunas[i] == 'Imagem') {
			$("<th class='text-center hide'>").appendTo(tabela + " > thead > tr").html(nomesColunas[i]);
		}
	}
	
	for(var i in dadosArray) {
		$("<tr>").appendTo(tabela + " > tbody")/*.data("id", dadosArray[i]["id"]).data("idBaseDados", idBaseDados)*/;
		
		var k = 0;
		var dados = {};
		var objeto = {};
		var teste = false;
		for(var j in dadosArray[i]) {
			teste = false;
			for(var m in dropArray){
				if(dropArray[m] == dadosArray[i]["id"]){
					teste = true;
					break;
				}						
			}
			if(teste == false){
				if(valorExibicaoAtributos[k] == 1 && nomesColunas[k] != 'Imagem' && dadosArray[i]["id"] != $("#poolList").find("#entidadeAlvo").data("id")) {
			        dados[nomesColunas[k]] = dadosArray[i][j];
			        $("<td class='text-center' style='cursor:move'>").appendTo(tabela + " > tbody > tr:last").html(dadosArray[i][j]);
			    }	
				
				else if(valorExibicaoAtributos[k] == 1 && nomesColunas[k] == 'Imagem' && dadosArray[i]["id"] != $("#poolList").find("#entidadeAlvo").data("id")) {
			        dados[nomesColunas[k]] = dadosArray[i][j];
			        $("<td class='text-center hide' style='cursor:move'>").appendTo(tabela + " > tbody > tr:last").html(dadosArray[i][j]);			       
			    }
			}
			
			k++;
		}
		
		objeto["dados"] = dados;
		objeto["id"] = dadosArray[i]["id"];
		objeto["idBaseDados"] = idBaseDados;
		objeto["baseDadosNomeJogo"] = baseDadosNomeJogo;
		
		$(tabela + " > tbody > tr:last").data("dadosEntidade", objeto);
		
		//$("<tr>").appendTo(tabela + " > tbody").data(objeto);
		//$("<tr>").appendTo(tabela + " > tbody").data({name:"dasda", idade:"23123"});
		//console.log ($("<tr>").appendTo(tabela + " > tbody").data());
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
        "circle_bg_color": "#1a1a1a",
        time: {
            Days: {
                show: false
            },
            Hours: {
                show: false
            },
            Minutes: {
                text: "Minutos",
                "color": "#ffcc00",
            },
            Seconds: {
                text: "Segundos",
                "color": "#ffcc00",
            }
        },
        count_past_zero: false,
    }).addListener(function(unit, value, total) {
        if(total == 0) {            
            finalizarJogo(2);
        }
    });
    
}

function limparJogo() {
	$.blockUI({ message: null });
	
	new Messi("Deseja realmente limpar todas as refer&ecirc;ncias do jogo?", {
		title : "Limpar refer&ecirc;ncias",
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
				$("#viewsList").empty();
			    $("#poolList").children().not("#entidadeAlvo").each(function() {
			    	$(this).remove();
			    });
			}
			else {
				$.unblockUI();
			}
		}
	});
}

function desistirJogo() {
	$.blockUI({ message: null });
	
	new Messi("Deseja realmente sair do jogo? Os dados ser&atilde;o perdidos.", {
		title : "Desistir do jogo",
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
	
	var idRegistro = jogadaAjax.recuperarIdEntidade(idBaseDados, idAlvo);

	var idEntidadeAlvo = jogadaAjax.inserirEntidadeAlvo(idRegistro, idBaseDados, situacao);
	
	var resultadoArray = new Array();

	$("#poolList").children().each(function() {
				
		var idBaseDados = $(this).data("idBaseDados");
		var id = $(this).data("id");
				
		if(id == undefined || idBaseDados == undefined){
			var dados = $(this).data("dadosEntidade");
			
			var idBaseDados = dados.idBaseDados;
			var id = dados.id;			
		}
		
		var idRegistro = jogadaAjax.recuperarIdEntidade(idBaseDados, id);
				
		resultadoArray.push({"idBaseDados"    : idBaseDados,
							 "idRegistro"     : idRegistro,
							 "idEntidadeAlvo" : idEntidadeAlvo});
		
	});
	
	jogadaAjax.inserirResultadoEntidade(resultadoArray);
	
	$.unblockUI();
	
	window.location = "painel_usuario.php";
	/*setTimeout(function() {
		window.location = "painel_usuario.php";
	}, 2000);*/

}

function recuperarEntidadeAleatoria(idEntidade, idUsuario) {
	
	var jogadaAjax = new JogadaAjax();
	
	var dadosTabela = jogadaAjax.recuperarNomeTabelaAleatoria(idEntidade);
	
	var entidade = jogadaAjax.recuperarEntidadeAleatoria(dadosTabela["idBaseDados"], dadosTabela["nomeTabela"], idEntidade, idUsuario);
	
	var valorExibicaoAtributos = jogadaAjax.getValorExibicaoAtributos(dadosTabela["idBaseDados"]);
	
	var nomeJogo = jogadaAjax.recuperaNomeJogo(dadosTabela["idBaseDados"]);
	
	var html = "<li class='pull-left resize' id='entidadeAlvo'><div class='box'><ul class='box-list'>";
	
	html += "<li><div>Refer&ecirc;ncia Alvo</div><div> " + nomeJogo + "</div><div class='clearfix'></div></li>";
	
	var j = 0;
	
	for(var i in entidade) {
		if(valorExibicaoAtributos[j] == 1) {
			if(entidade[i].indexOf('http://') == -1)
				html += "<li>" + entidade[i] + "</li>";
			else
				html += "<li><img src='" + entidade[i] + "'></img></li>";
		}
		
		j++;
	}
	
	html += "</ul></div></div></li>";
	
	$('#poolList').append(html);
	
	$("#entidadeAlvo").data("idBaseDados", dadosTabela["idBaseDados"]).data("id", entidade["id"]);
	
	$(".resize").resizable({		
		maxHeight: 350,
	    maxWidth: 350,
	    minHeight: 200,
	    minWidth: 200	
	});
}