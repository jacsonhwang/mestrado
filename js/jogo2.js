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
		//accept: ".entity",
		drop: function(event, ui) {
			addToTrash(ui.draggable);
		}
	});
	
	/*$('.fromViewer').draggable({
		revert: 'invalid',
		containment: '.main',
		helper: function(event) {
			return getEntityLayout(this);
		},
		cursor: 'move',
		opacity: 0.75
	});
	
	$('.fromPool').draggable({
		revert: 'invalid',
		containment: '.main',
		helper: function(event) {
			return getEntityLayout(this);
		},
		cursor: 'move',
		opacity: 0.75
	});*/
	
});

function getEntityLayout(item) {
	
	var html = "<div style='border: 1px solid black; z-index: 15; padding-right: 15px'><ul>";
	
	$(item).find("td").each(function() {
		html += "<li>" + $(this).html() + "</li>";
	});
	
	html += "</ul></div>";
	
	
	/*var atributos = recuperarDadosPorID(item.id);
			var nome = atributos.nome;
			var endereco = atributos.endereco;
			var cpf = atributos.cpf;
			var classe = atributos.classe;*/
	//var html = "<div style='border: 1px solid black; z-index: 15'>oi</div>";
	//var html = "<div class='entity ui-corner-all grey' id='"+item.id+"' style='max-width:128px'><img src='stickman.png' class='stickman'></img><h5>"+nome+"</h5><h5>"+endereco+"</h5><h5>"+cpf+"</h5></div>";
	return html;
}

function addToPool(item) {
	
	var pool = $("#pool");
	
	var html = "<li class='pull-left'><div class='box'><ul class='list-group'>";
	
	if($(item).find("td").length > 0) {
		$(item).find("td").each(function() {
			html += "<li class='list-group-item'>" + $(this).html() + "</li>";
		});
	}
	else {
		$(item).find("li").each(function() {
			html += "<li class='list-group-item'>" + $(this).html() + "</li>";
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
		helper: 'clone',
		cursor: 'auto',
		opacity: 0.75
	});	
	
	/*$selected = new Entity();
	$selected.setNome(nome);
	$selected.setEndereco(endereco);
	$selected.setCPF(cpf);
	$selected.setID(id);
	$pool.addEntity($selected);
	$viewer.removeEntity($selected);*/
}

function addToViewer(item) {
	
	//$("#poolList").find(item).remove();
	
	/*var id = item.attr('id');
	var atributos = recuperarDadosPorID(id);
	var nome = atributos.nome;
	var endereco = atributos.endereco;
	var cpf = atributos.cpf;
	var classe = atributos.classe;*/

	var html = "<li class='pull-left'><div class='box'><ul class='list-group'>";
	
	if($(item).find("td").length > 0) {
		$(item).find("td").each(function() {
			html += "<li class='list-group-item'>" + $(this).html() + "</li>";
		});
	}
	else {
		$(item).find("li").each(function() {
			html += "<li class='list-group-item'>" + $(this).html() + "</li>";
		});
	}
	
	html += "</ul></div></li>";
	
	var views = $("#viewsList");
	
	/*$('#data').find(item).css({
		'background':'grey'
	}).removeClass('entity');
	*/
	views.append(html);
	
	views.children(":last").addClass('fromViewer').data("id", item.data("id"))
	                                              .data("idBaseDados", item.data("idBaseDados"));
	
	$("#poolList").find(item).remove();
	
	$(".fromViewer").draggable({
		revert: 'invalid',
		containment: '.main',
		//helper: 'clone',
		cursor: 'auto',
		opacity: 0.75
	});
	
	/*$selected = new Entity();
	$selected.setNome(nome);
	$selected.setEndereco(endereco);
	$selected.setCPF(cpf);
	$selected.setID(id);
	$viewer.addEntity($selected);
	$pool.removeEntity($selected);*/
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