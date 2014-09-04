$(document).ready(function() {
	
	$("#pool").droppable({
		accept: ":not(.fromPool)",
		drop: function(event, ui) {
			addToPool(ui.draggable);
		}
	});
	
	$("#views").droppable({
		accept: ":not(.fromViewer)",
		drop: function(event, ui) {
			addToViewer(ui.draggable);
		}
	});
	
	$("#trash").droppable({
		drop: function(event, ui) {
			addToTrash(ui.draggable);
		}
	});
	
});

function getEntityLayout(item) {
	
	var html = "<div class='drag'><ul class='box-list'>";
	
	$(item).find("td").each(function() {
		html += "<li>" + $(this).html() + "</li>";
	});
	
	html += "</ul></div>";
	
	return html;
}

function addToPool(item) {
	
	var iguais = false;
	
	$("#poolList").children().each(function() {
		if (item.data("id") == $(this).data("id") && item.data("idBaseDados") == $(this).data("idBaseDados")) {			
			iguais = true;
		}
	});
	
	if(iguais == true) {
		return;
	}
	
	fecharMenuSlider();
	
	var pool = $("#pool");
	
	var html = "<li class='pull-left'><div class='box'><ul class='box-list'>";
	
	if($(item).find("td").length > 0) {
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
	
	$('#poolList').children(":last").addClass('fromPool').data("id", item.data("id"))
	                                                     .data("idBaseDados", item.data("idBaseDados"));
	
	$("#viewsList").find(item).remove();
	
	$('.fromPool').draggable({
		revert: 'invalid',
		containment: '.main',
		cursor: 'auto',
		opacity: 0.75,
		helper: 'clone',
		appendTo: 'body'
	});
}

function addToViewer(item) {
	
	fecharMenuSlider();
	
	var iguais = false;
	
	$("#viewsList").children().each(function() {
		if (item.data("id") == $(this).data("id") && item.data("idBaseDados") == $(this).data("idBaseDados")) {			
			iguais = true;
		}
	});
	
	if(iguais == true) {
		return;
	}

	var html = "<li class='pull-left'><div class='box'><ul class='box-list'>";
	
	if($(item).find("td").length > 0) {
		$(item).find("td").each(function() {
			html += "<li>" + $(this).html() + "</li>";
		});
	}
	else {
		$(item).find("li").each(function() {
			html += "<li>" + $(this).html() + "</li>";
		});
	}
	
	html += "</ul></div></li>";
	
	var views = $("#viewsList");
	
	views.append(html);
	
	views.children(":last").addClass('fromViewer').data("id", item.data("id"))
	                                              .data("idBaseDados", item.data("idBaseDados"));
	
	$("#poolList").find(item).remove();
	
	$(".fromViewer").draggable({
		revert: 'invalid',
		containment: '.main',
		cursor: 'auto',
		opacity: 0.75,
		helper: 'clone',
		appendTo: 'body'
	});
}

function addToTrash(item) {
	
	$("body").css("cursor", "auto");
	
	var trash = $("#trash");
	
	$('#data').find(item).css({
		'background':'white'
	});
	
	$("#views").find(item).remove();
	
	$("#poolList").find(item).remove();
	
	/*var id = item.attr('id');
	var atributos = recuperarDadosPorID(id);
	var nome = atributos.nome;
	var endereco = atributos.endereco;
	var cpf = atributos.cpf;
	$selected = new Entity();
	$selected.setNome(nome);
	$selected.setEndereco(endereco);
	$selected.setCPF(cpf);
	$selected.setID(id);
	$trash.deleteEntity($selected);
	$viewer.removeEntity($selected);
	$pool.removeEntity($selected);*/
}

function fecharMenuSlider() {
	
	$("#filtro").hide();
	$("#opcaoFiltro").parent().removeClass("active");
	
}