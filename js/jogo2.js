$(document).ready(function() {
	
	$("#pool").droppable({
		accept: ":not(.fromPool)",
		drop: function(event, ui) {
			//addToPool(ui.draggable);
			drop("#poolList", 'fromPool', "#viewsList", ui.draggable);
		}
	});
	
	$("#views").droppable({
		accept: ":not(.fromViewer)",
		drop: function(event, ui) {
			//addToViewer(ui.draggable);
			drop("#viewsList", 'fromViewer', "#poolList", ui.draggable);
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

function drop(lista, classe, listaOposta, item) {

	var iguais = false;

	$(lista).children().each(function() {
		if (item.data("id") == $(this).data("id") && item.data("idBaseDados") == $(this).data("idBaseDados")) {			
			iguais = true;
		}
	});

	if(iguais == true) {
		return;
	}
	
	fecharMenuSlider();

	var html = "<li class='pull-left'><div class='box'><ul class='box-list'><li><div>ReferÍncia suspeita</div><div>Caixa #</div><div class='clearfix'></div></li>";

	if($(item).find("td").length > 0) {
		$(item).find("td").each(function() {
			html += "<li>" + $(this).html() + "</li>";
		});
	}
	else {
		$(item).find("li:not(:first-child)").each(function() {
			html += "<li>" + $(this).html() + "</li>";
		});
	}

	html += "</ul></div></li>";

	$(lista).append(html);

	$(lista).children(":last").addClass(classe).data("id", item.data("id")).data("idBaseDados", item.data("idBaseDados"));

	$(listaOposta).find(item).remove();

	$("." + classe).draggable({
		//revert: 'invalid',
		containment: '.main',
		cursor: 'auto',
		opacity: 0.75,
		//helper: 'clone',
		//appendTo: 'body'
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
}

function fecharMenuSlider() {
	
	$("#filtro").hide();
	$("#opcaoFiltro").parent().removeClass("active");
	
}