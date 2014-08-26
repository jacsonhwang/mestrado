$(document).ready(function() {
	$(".pool").droppable({
		//accept: ".entity:not(.fromPool)",
		drop: function(event, ui) {
			addToPool(ui.draggable);
		}
	});
});

function getEntityLayout(item) {
	
	var html = "<div style='border: 1px solid black; z-index: 15; padding-right: 15px'><ul>";
	
	//console.log(item);
	
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
	$("#views").find(item).remove();
	$('#data').find(item).css({
		'background':'grey'
	});
	
	var html = "<li class='pull-left'><div><ul class='list-group'>";
	
	$(item).find("td").each(function() {
		html += "<li class='list-group-item'>" + $(this).html() + "</li>";
	});
	
	html += "</ul></div></li>";
	
	$('#data').find(item).css({
		'background':'grey'
	}).removeClass('entity');
	
	$('#poolList').append(html);
	
	$('#poolList').find('li:last-child').addClass('fromPool');
	$('#poolList').find('li:last-child').draggable({
		//revert: 'invalid',
		containment: 'document',
		helper: 'original',
		cursor: 'move',
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