<?php include 'header.php'; ?>

<div class="container-fluid">
	<div class="row">
		
		
		<div class="col-sm-3 col-md-6 sidebar" style="left:150px;" id="filtro">
			<ul class="nav nav-sidebar">
				<li class="active"><a href="#" style="pointer-events: none; cursor: default;">Filtro</a></li>
			</ul>
			<form class="form-horizontal" role="form" action="controller/cadastroControle.php" method="POST" id="formCadastro">
				<div class="form-group">
					<label for="inputNome" class="col-sm-2 control-label">Nome</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputNome" name="inputNome">
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail" class="col-sm-2 control-label">Endereço</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="inputEmail" name="inputEmail">
					</div>
				</div>
				<div class="form-group">
					<label for="inputSenha" class="col-sm-2 control-label">CPF</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="inputSenha" name="inputSenha">
					</div>
				</div>
				<div class="form-group">
					<label for="selectEscolaridade" class="col-sm-2 control-label">Arquivo</label>
					<div class="col-sm-10">
						<select class="form-control" id="selectEscolaridade" name="selectEscolaridade">
							<option disabled selected></option>
							<option value="1" >Caixa A</option>
							<option value="2" >Caixa B</option>
							<option value="3" >Caixa C</option>							
						</select>
					</div>
				</div>				
				<div class="form-group">
					<div class="col-sm-12">
						<button type="submit" class="btn btn-success" name="buttonCadastrar" id="buttonCadastrar" style="float: right;">Filtrar</button>
					</div>										
				</div>
		</div>

		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<div id="entity-container" class="data-container ui-widget ui-helper-clearfix">
				<table id="data">
					<tbody>
					</tbody>
				</table>
			</div>
			<div id="entity-viewer" class="entity-viewer ui-widget ui-helper-clearfix">
				<ol id="views" class="views ui-helper-reset ui-helper-clearfix"></ol>
			</div>
			<div id="boxes" class="boxes ui-widget ui-helper-clearfix">
				<div id="pool" class="pool">
					<ol id="poolList" class="views ui-helper-reset ui-helper-clearfix"></ol>
				</div>
				<div id="trash" class="trash">
					<img src="trash.png">
					<ol id="trashList" class="views ui-helper-reset ui-helper-clearfix"></ol>
				</div>
			</div>
		</div>

	</div>
</div>


<script>
$.getJSON('entidades.json', function(data){
	
	var html = $("#gallery").html();
	var dados = "";
	for(var i in data.entidades) {			
		dados += "<tr class='entity fromContainer' id='"+data.entidades[i].id+"'>"+
				"<td style='width:100%'>"+data.entidades[i].nome+"</td>"+
				"<td style='width:100%'>"+data.entidades[i].endereco+"</td>"+
				"<td style='width:100%'>"+data.entidades[i].cpf+"</td></tr>";
		$("#data").find('tbody').html(dados);			
	}
	
	var $pool = new Pool();
	var $trash = new Trash();
	var $viewer = new EntityViewer();
	var $selected = null;
	
	$(".entity").draggable({
		revert: 'invalid',
		containment: 'document',
		helper: function(event) {
			return getEntityLayout(this);
		},
		cursor: 'move',
		opacity: 0.75
	});
	
	$('.fromContainer').draggable({
		revert: 'invalid',
		containment: 'document',
		helper: function(event) {
			return getEntityLayout(this);
		},
		cursor: 'move',
		opacity: 0.75
	});
	
	$('.fromViewer').draggable({
		revert: 'invalid',
		containment: 'document',
		helper: function(event) {
			return getEntityLayout(this);
		},
		cursor: 'move',
		opacity: 0.75
	});
	
	$('.fromPool').draggable({
		revert: 'invalid',
		containment: 'document',
		helper: function(event) {
			return getEntityLayout(this);
		},
		cursor: 'move',
		opacity: 0.75
	});

	$(".pool").droppable({
		accept: ".entity:not(.fromPool)",
		drop: function(event, ui) {
			addToPool(ui.draggable);
		}
	});

	$(".entity-viewer").droppable({
		accept: ".entity:not(.fromViewer)",
		drop: function(event, ui) {
			addToViewer(ui.draggable);
		}
	});
	
	$(".trash").droppable({
		accept: ".entity",
		drop: function(event, ui) {
			addToTrash(ui.draggable);
		}
	});

	$(".entity-viewer").sortable({
		revert: true
	});		
	
	function getEntityLayout(item) {
		var atributos = recuperarDadosPorID(item.id);
		var nome = atributos.nome;
		var endereco = atributos.endereco;
		var cpf = atributos.cpf;
		var classe = atributos.classe;
		var html = "<div class='entity ui-corner-all grey' id='"+item.id+"' style='max-width:128px'><img src='stickman.png' class='stickman'></img><h5>"+nome+"</h5><h5>"+endereco+"</h5><h5>"+cpf+"</h5></div>";
		return $(html);
	}

	function addToPool(item) {
		var pool = $("#pool");
		$("#views").find(item).remove();
		$('#data').find(item).css({
			'background':'grey'
		});
		var id = item.attr('id');
		var atributos = recuperarDadosPorID(id);
		var nome = atributos.nome;
		var endereco = atributos.endereco;
		var cpf = atributos.cpf;
		var html = "<li class='entity ui-widget-content ui-corner-all' id='"+id+"'><img src='stickman.png'></img><h5>"+nome+"</h5><h5>"+endereco+"</h5><h5>"+cpf+"</h5></li>";
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
		$selected = new Entity();
		$selected.setNome(nome);
		$selected.setEndereco(endereco);
		$selected.setCPF(cpf);
		$selected.setID(id);
		$pool.addEntity($selected);
		$viewer.removeEntity($selected);
	}

	function addToViewer(item) {
		$("#poolList").find(item).remove();
		var id = item.attr('id');
		var atributos = recuperarDadosPorID(id);
		var nome = atributos.nome;
		var endereco = atributos.endereco;
		var cpf = atributos.cpf;
		var classe = atributos.classe;
		
		var html = $("<li class='entity ui-widget-content ui-corner-all' id='"+id+"'><img src='stickman.png'></img><h5>"+nome+"</h5><h5>"+endereco+"</h5><h5>"+cpf+"</h5></li>");
		var views = $("#views");
		$('#data').find(item).css({
			'background':'grey'
		}).removeClass('entity');
		views.append(html);
		views.find('li:last-child').addClass('fromViewer');
		views.find('li:last-child').draggable({
			//revert: 'invalid',
			containment: 'document',
			helper: 'original',
			cursor: 'move',
			opacity: 0.75
		});
		$selected = new Entity();
		$selected.setNome(nome);
		$selected.setEndereco(endereco);
		$selected.setCPF(cpf);
		$selected.setID(id);
		$viewer.addEntity($selected);
		$pool.removeEntity($selected);
	}
	
	function addToTrash(item) {
		var trash = $("#trash");
		$('#data').find(item).css({
			'background':'white'
		});
		$("#views").find(item).remove();
		$("#poolList").find(item).remove();
		var id = item.attr('id');
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
		$pool.removeEntity($selected);
	}

	function exibirBox() {
		$pool.displayEntities();
	}
	
	function exibirLixo() {
		$trash.displayEntities();
	}
	
	function recuperarDadosPorID(id) {
		for(var i in data.entidades) {
			if(data.entidades[i].id==id) {
				return data.entidades[i];
			}
		}
	}
	
	function resetAll() {
		$('#data').find('tr').addClass('entity').css({
			'background':'white'
		});
		$pool.removeAll();
		$trash.restoreAll();
		$('#trashList').find('li').remove();
		$('#poolList').find('li').remove();
		$('#views').find('li').remove();
	}
	
	$("#pool").on('click', function(event) {
		exibirBox();
	});
	
	$("#trash").on('click', function(event) {
		exibirLixo();
	});
	
	$('#entity-viewer').on('click', function(event) {
		$viewer.displayEntities();
	});
	
	$('#reset').on('click', function(event) {
		resetAll();
	});
});
</script>

<?php include 'footer.php'; ?>