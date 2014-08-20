var JogadaAjax = function() {
};

JogadaAjax.prototype.getDadosEntidade = function(atributo, valor, tabela) {
	var resultado = "";
	
	$.ajax({
		type: "POST",
		url: "controller/jogadaAjaxControle.php",
		data: { idConsulta: 1, atributo: atributo, valor: valor, tabela: tabela },
		async: false,
		success: function(msg) {
			resultado = JSON.parse(msg);
		}
	});
	
	return resultado;
};

JogadaAjax.prototype.getNomesColunas = function(idBaseDados) {
	var resultado = "";
	
	$.ajax({
		type: "POST",
		url: "controller/jogadaAjaxControle.php",
		data: { idConsulta: 2, idBaseDados: idBaseDados },
		async: false,
		success: function(msg) {
			resultado = JSON.parse(msg);
		}
	});
	
	return resultado;
}