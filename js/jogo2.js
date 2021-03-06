$(document).ready(function() {
	
	/*$("#buttonLimparTudo").hover(function() {
		$("#buttonLimparTudo > img").empty();
		$("#buttonLimparTudo").appendTo("<img src='../img/botao-limpar-hover.png'>");
	});*/
	
	dropArray = new Array();
	
	$("#pool").droppable({
		accept: ":not(.fromPool)",
		activeClass: "box-active",
	    hoverClass: "box-hover",
		drop: function(event, ui) {
			//addToPool(ui.draggable);
			dropArray.push({"id" : ui.draggable.data("dadosEntidade").id, "idBaseDados" : ui.draggable.data("dadosEntidade").idBaseDados});
			drop("#poolList", 'fromPool', "#viewsList", ui.draggable);
		}
	});
	
	$("#views").droppable({
		accept: ":not(.fromViewer)",		
		drop: function(event, ui) {
			//addToViewer(ui.draggable);
			dropArray.push({"id" : ui.draggable.data("dadosEntidade").id, "idBaseDados" : ui.draggable.data("dadosEntidade").idBaseDados});
			drop("#viewsList", 'fromViewer', "#poolList", ui.draggable);
		}
	});
	
	$("#trash").droppable({
		drop: function(event, ui) {
			addToTrash(ui.draggable);
			$("#trash").animate({ "height": 90, "width": 90 })
		},
		over: function(event, ui) {
			$("#trash").animate({ "height": 120, "width": 120 })
		},
		out: function(event, ui) {
			$("#trash").animate({ "height": 90, "width": 90 })
		},
		tolerance: "touch"
	});
	
	$("#comparador1").droppable({
		//accept: ":not(.fromPool)",
		drop: function(event, ui) {
			//addToPool(ui.draggable);
			drop("#comparador1List", 'fromComparador1', "#viewsList", ui.draggable);
		}
	});
	
	$("#comparador2").droppable({
		//accept: ":not(.fromPool)",
		drop: function(event, ui) {
			//addToPool(ui.draggable);
			drop("#comparador2List", 'fromComparador2', "#viewsList", ui.draggable);
		}
	});

	
});

function getEntityLayout(item) {
	
	var html = "<div class='drag' style='width:20%; z-index: 40'><ul class='box-list'>";
	
	$(item).find("td").each(function() {
	    if($(this).html().indexOf("http://") == -1) {
	        html += "<li>" + $(this).html() + "</li>";
	    }
	});
	
	html += "</ul></div>";
	
	return html;
}

function drop(lista, classe, listaOposta, item) {
    
    var existe = false;
    
    for(var i in dropArray) {
        if(dropArray[i].id == item.data("dadosEntidade").id && dropArray[i].idBaseDados == item.data("dadosEntidade").idBaseDados){
            existe = true;
            break;
        }
    }
    
    if(existe == false) {
        dropArray.push({
            id: item.data("dadosEntidade").id,
            idBaseDados: item.data("dadosEntidade").idBaseDados
        });
    }
    
    var dados = item.data("dadosEntidade");

	var iguais = false;

	// Percorre todas as li's da poollist e viewslist pra evitar que a mesma entidade seja adicionada
	$(lista).children().each(function() {

	    var idRegistro = $(this).data("dadosEntidade").id;
	    var idBaseDadosRegistro = $(this).data("dadosEntidade").idBaseDados;

	    if (dados.id == idRegistro && dados.idBaseDados == idBaseDadosRegistro) {
	        iguais = true;
	    }

	});

	if(iguais == true) {
		return;
	}
	
	fecharMenuSlider();

	var html = "<li class='pull-left resize'><div class='box'><ul class='box-list'><li><div>Refer&ecirc;ncia Suspeita</div><div> " + dados.baseDadosNomeJogo + "</div><div class='clearfix'></div></li>";
	
	var i = 0;
	if($(item).find("td").length > 0) {
		$(item).find("td").each(function() {
			if(i%2 == 0){
				if($(this).html().indexOf("http://") == -1)
					html += "<li style='background-color:#eee;'>" + $(this).html() + "</li>";
				else
					html += "<li><img src='" + $(this).html() + "'></li>";
			}else{
				if($(this).html().indexOf("http://") == -1)
					html += "<li style='background-color:#ddd;'>" + $(this).html() + "</li>";
				else
					html += "<li><img src='" + $(this).html() + "'></li>";
			}
			i++;
		});
	}
	else {
		var i = 0;
		$(item).find("li:not(:first-child)").each(function() {
			if(i%2 == 0){
				html += "<li style='background-color:#eee;'>" + $(this).html() + "</li>";
			}else{
				html += "<li style='background-color:#ddd;'>" + $(this).html() + "</li>";
			}
			i++;
		});
	}

	html += "</ul></div></li>";

	$(lista).append(html);
		
	$(lista).children(":last").addClass(classe).data("dadosEntidade", dados);

	$("." + classe).draggable({
        //revert: 'invalid',
        containment: '.main',
        cursor: 'auto',
        opacity: 0.75,
        //helper: 'clone',
        //appendTo: 'body'
    });

	$(".resize").resizable({		
	    maxHeight: 350,
	    maxWidth: 350,
	    minHeight: 200,
	    minWidth: 200
	});
		
	$(listaOposta).find(item).remove();
}

function addToTrash(item) {
	
	$("body").css("cursor", "auto");
	
	for(var i in dropArray){	    
        if(dropArray[i].id == item.data("dadosEntidade").id && dropArray[i].idBaseDados == item.data("dadosEntidade").idBaseDados){
            dropArray.splice(i, 1);
        }
    }
	
	$("#views").find(item).remove();
	
	$("#poolList").find(item).remove();
}

function fecharMenuSlider() {
	
	$("#filtro").hide();
	$("#opcaoFiltro").parent().removeClass("active");
	
	$("#opcaoFiltro").find("img").attr("src", "img/icone-filtro.png");
	
}