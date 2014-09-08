var JogadaAjax = function() {
};

JogadaAjax.prototype.getDadosEntidade = function(atributo, valor, tabela, idBaseDados) {
	var resultado = "";
	
	$.ajax({
		type: "POST",
		url: "controller/filtroJogoControle.php",
		data: { idConsulta: 1, atributo: atributo, valor: valor, tabela: tabela, idBaseDados: idBaseDados },
		async: false,
		success: function(msg) {
			resultado = jQuery.parseJSON(msg);
		}
	});
	
	return resultado;
};

JogadaAjax.prototype.getNomesColunas = function(idBaseDados) {
	var resultado = "";
	
	$.ajax({
		type: "POST",
		url: "controller/filtroJogoControle.php",
		data: { idConsulta: 2, idBaseDados: idBaseDados },
		async: false,
		success: function(msg) {
			resultado = jQuery.parseJSON(msg);
		}
	});
	
	return resultado;
};

JogadaAjax.prototype.getNomesAtributos = function(idBaseDados) {
	var resultado = "";
	
	$.ajax({
		type: "POST",
		url: "controller/filtroJogoControle.php",
		data: { idConsulta: 3, idBaseDados: idBaseDados },
		async: false,
		success: function(msg) {
			resultado = jQuery.parseJSON(msg);
		}
	});
	
	return resultado;
};

JogadaAjax.prototype.getValorExibicaoAtributos = function(idBaseDados) {
    var resultado = "";
    
    $.ajax({
        type: "POST",
        url: "controller/filtroJogoControle.php",
        data: { idConsulta: 4, idBaseDados: idBaseDados },
        async: false,
        success: function(msg) {
            resultado = jQuery.parseJSON(msg);
        }
    });
    
    return resultado;
};

JogadaAjax.prototype.recuperarIdEntidade = function(idBaseDados, id) {
    var resultado = "";

    $.ajax({
        type: "POST",
        url: "ajaxController/entidadeAjaxControle.php",
        data: { idConsulta: 1, idBaseDados: idBaseDados, id: id },
        async: false,
        success: function(msg) {
            resultado = jQuery.parseJSON(msg);
        }
    });

    return resultado;
};

JogadaAjax.prototype.inserirResultadoEntidade = function(idBaseDados, idEntidade, idEntidadeAlvo) {
	var resultado = "";

    $.ajax({
        type: "POST",
        url: "ajaxController/resultadoAjaxControle.php",
        data: { idConsulta: 1, idBaseDados: idBaseDados, idEntidade: idEntidade, idEntidadeAlvo: idEntidadeAlvo },
        async: false,
        success: function(msg) {
            resultado = jQuery.parseJSON(msg);
        }
    });

    return resultado;
};

JogadaAjax.prototype.recuperarEntidadeAleatoria = function(idBaseDados, nomeTabela, idEntidade) {
	var resultado = "";

    $.ajax({
        type: "POST",
        url: "ajaxController/entidadeAjaxControle.php",
        data: { idConsulta: 2, idBaseDados: idBaseDados, nomeTabela: nomeTabela, idEntidade: idEntidade },
        async: false,
        success: function(msg) {
            resultado = jQuery.parseJSON(msg);
        }
    });

    return resultado;
};

JogadaAjax.prototype.recuperarNomeTabelaAleatoria = function(idEntidade) {
	var resultado = "";

    $.ajax({
        type: "POST",
        url: "ajaxController/baseAjaxControle.php",
        data: { idConsulta: 1, idEntidade: idEntidade },
        async: false,
        success: function(msg) {
            resultado = jQuery.parseJSON(msg);
        }
    });

    return resultado;
};