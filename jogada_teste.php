<?php

include 'header.php';
include 'dao/MetaBaseDadosDAO.php';
include 'dao/EntidadesListaDAO.php';
include 'model/MetaBaseDados.php';
include 'controller/jogadaBancoControle.php';

$metaBaseDadosDAO = new MetaBaseDadosDAO();
$entidadesListaDAO = new EntidadesListaDAO();

$dadosArray1 = $metaBaseDadosDAO->listarDados(1);
$dadosArray2 = $metaBaseDadosDAO->listarDados(2);
$dadosArray3 = $metaBaseDadosDAO->listarDados(3);

$referenciaArray1 = $entidadesListaDAO->recuperarPrimeiraLinha(1, 'entidades_lista_a');
$referenciaArray2 = $entidadesListaDAO->recuperarPrimeiraLinha(2, 'entidades_lista_b');
$referenciaArray3 = $entidadesListaDAO->recuperarPrimeiraLinha(3, 'entidades_lista_c');

?>

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-3 col-md-2 sidebar">
			<ul class="nav nav-sidebar">
				<li class="tituloMenuSidebar"><a href="#" style="pointer-events: none; cursor: default;">Ferramentas</a></li>
				<li><a href="#" id="opcaoFiltro">Filtro</a></li>
				<li><a href="#" id="opcaoComparador">Comparador</a></li>
				<li><a href="#" id="opcaoDicionario">Dicionário</a></li>
				<li><a href="#" id="opcaoArquivos">Arquivos</a></li>
			</ul>
		</div>
		
		<!-- ------------------------------ FILTRO ----------------------------- -->
		
		<div class="col-sm-9 col-sm-offset-3 col-md-4 col-md-offset-2 menu-slider" id="filtro" style="padding: 15px">
			<div class="col-sm-12" style="padding-bottom: 15px;" id="divFiltro">
				<ul class="nav nav-tabs" role="tablist">
					<li class="active" id="liCaixaA"><a href="#tabCaixaA" role="tab" data-toggle="tab">Caixa A</a></li>
					<li id="liCaixaB"><a href="#tabCaixaB" role="tab" data-toggle="tab">Caixa B</a></li>
					<li id="liCaixaC"><a href="#tabCaixaC" role="tab" data-toggle="tab">Caixa C</a></li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content" style="margin-top: 20px">
					<div class="tab-pane active tab" id="tabCaixaA">
						<form class="form-horizontal" id="formCaixaA">
							<?php
							foreach($dadosArray1 as $dado) {
							?>					
								<div class="form-group">
									<label for="<?php echo $dado->getNomeAtributo(); ?>" class="col-sm-3 control-label"><?php echo $dado->getNomeJogo(); ?></label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="<?php echo $dado->getNomeAtributo(); ?>" name="<?php echo $dado->getNomeAtributo(); ?>">
									</div>
								</div>
							<?php
							}
							?>

							<div class="col-sm-11" style="padding-bottom: 15px;">
								<button class="btn btn-success" id="buttonFiltrarA">Filtrar</button>
							</div>
						</form>
					</div>
					<div class="tab-pane tab" id="tabCaixaB">
						<form class="form-horizontal" id="formCaixaB">
							<?php
							foreach($dadosArray2 as $dado) {
							?>					
								<div class="form-group">
									<label for="<?php echo $dado->getNomeAtributo(); ?>" class="col-sm-3 control-label"><?php echo $dado->getNomeJogo(); ?></label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="<?php echo $dado->getNomeAtributo(); ?>">
									</div>
								</div>
							<?php
							}
							?>

							<div class="col-sm-11" style="padding-bottom: 15px;">
								<button class="btn btn-success" id="buttonFiltrarB">Filtrar</button>
							</div>
						</form>
					</div>
					<div class="tab-pane tab" id="tabCaixaC">
						<form class="form-horizontal" id="formCaixaC">
							<?php
							foreach($dadosArray3 as $dado) {
							?>					
								<div class="form-group">
									<label for="<?php echo $dado->getNomeAtributo(); ?>" class="col-sm-3 control-label"><?php echo $dado->getNomeJogo(); ?></label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="<?php echo $dado->getNomeAtributo(); ?>">
									</div>
								</div>
							<?php
							}
							?>

							<div class="col-sm-11" style="padding-bottom: 15px;">
								<button class="btn btn-success" id="buttonFiltrarC">Filtrar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			
			<div class="clearfix"></div>

			<div class="col-sm-12 divTabelaFiltro" id="divTabelaFiltroA">
				<table class="table tablesorter" id="tabelaFiltroA">
					<thead>
						<tr></tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
			
			<div class="col-sm-12 divTabelaFiltro" id="divTabelaFiltroB">
				<table class="table tablesorter" id="tabelaFiltroB">
					<thead>
						<tr></tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
			
			<div class="col-sm-12 divTabelaFiltro" id="divTabelaFiltroC">
				<table class="table tablesorter" id="tabelaFiltroC">
					<thead>
						<tr></tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
			
			<div class="col-sm-12">
				<button class="btn btn-info" id="buttonLimparBusca">Limpar busca</button>
			</div>
		</div>
		
		<!-- ------------------------------ COMPARADOR ----------------------------- -->
		
		<div class="col-sm-9 col-sm-offset-3 col-md-4 col-md-offset-2 menu-slider" id="comparador">
		
			<div class="col-lg-6" style="height: 250px; border: 1px solid black;">
			</div>
			<div class="col-lg-6" style="height: 250px; border: 1px solid black;">
			</div>
			
			<div class="clearfix"></div>
			
			<div class="col-sm-12 text-center" style="padding-top: 10px; padding-bottom: 15px;">
				<button class="btn btn-success">Comparar</button>
			</div>
		</div>
		
		<!-- ------------------------------ DICIONÁRIO ----------------------------- -->
		
		<div class="col-sm-9 col-sm-offset-3 col-md-4 col-md-offset-2 menu-slider" id="dicionario">
		
			<div class="col-sm-12 text-center" style="padding-top: 10px; padding-bottom: 15px;">
				<input type="text" class="form-control">
			</div>
			
			<div class="col-sm-12 text-center" style="padding-bottom: 15px;">
				<button class="btn btn-success">Buscar</button>
			</div>
			
			<div class="col-sm-12" style="padding-bottom: 15px;">
				<ul class="nav nav-tabs" role="tablist">
					<li class="active"><a href="#tabNome" role="tab" data-toggle="tab">Nome</a></li>
					<li><a href="#tabEndereco" role="tab" data-toggle="tab">Endereço</a></li>
					<li><a href="#tabCPF" role="tab" data-toggle="tab">CPF</a></li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane active tab" id="tabNome">
						<table class="table">
							<thead>
								<tr>
									<th>Nome</th>
									<th>Frequência</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Ana Madalena</td>
									<td>2</td>
								</tr>
								<tr>
									<td>Claudio Matos da Silva</td>
									<td>1</td>
								</tr>
								<tr>
									<td>Lucas Matias</td>
									<td>3</td>
								</tr>
								<tr>
									<td>Jonathan Luiz</td>
									<td>5</td>
								</tr>
								<tr>
									<td>Maria de Jesus</td>
									<td>2</td>
								</tr>
								<tr>
									<td>Michel Litie</td>
									<td>10</td>
								</tr>
								<tr>
									<td>Renato Ares</td>
									<td>3</td>
								</tr>
								<tr>
									<td>William Marcos</td>
									<td>2</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="tab-pane tab" id="tabEndereco">Tabela endereços</div>
					<div class="tab-pane tab" id="tabCPF">Tabela CPF</div>
				</div>
			</div>
			
		</div>
		
		<!-- ------------------------------ ARQUIVOS ----------------------------- -->
		
		<div class="col-sm-9 col-sm-offset-3 col-md-7 col-md-offset-2 menu-slider" id="arquivos">
			<div class="col-lg-2">
				<div class="row">
					<img src="img/box.png" style="width: 100%" />
				</div>
				<div class="row text-center">
					<h4>Caixa A</h4>
				</div>
			</div>
			<div class="col-lg-10 fixed-height" style="border: 1px solid black; margin-bottom: 10px">
				<table class="table">
					<thead>
						<tr>
							<th>Característica</th>
							<th>Nome no Jogo</th>
							<th>Descrição</th>
							<th>Referência</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 0;
						foreach($dadosArray1 as $caixaA) {
						?>
							<tr>
								<td><?php echo $caixaA->getNomeAtributo(); ?></td>
								<td><?php echo $caixaA->getNomeJogo(); ?></td>
								<td><?php echo $caixaA->getDescricaoAtributo(); ?></td>
								<td><?php echo $referenciaArray1[$i]; ?></td>
							</tr>
						<?php
						$i++;
						}
						?>
					</tbody>
				</table>
			</div>
			
			<div class="clearfix"></div>
			
			<div class="col-lg-2">
				<div class="row">
					<img src="img/box.png" style="width: 100%" />
				</div>
				<div class="row text-center">
					<h4>Caixa B</h4>
				</div>
			</div>
			<div class="col-lg-10 fixed-height" style="border: 1px solid black; margin-bottom: 10px">
				<table class="table">
					<thead>
						<tr>
							<th>Característica</th>
							<th>Nome no Jogo</th>
							<th>Descrição</th>
							<th>Referência</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$j = 0;
						foreach($dadosArray2 as $caixaB) {
						?>
							<tr>
								<td><?php echo $caixaB->getNomeAtributo(); ?></td>
								<td><?php echo $caixaB->getNomeJogo(); ?></td>
								<td><?php echo $caixaB->getDescricaoAtributo(); ?></td>
								<td><?php echo $referenciaArray2[$j]; ?></td>
							</tr>
						<?php
						$j++;
						}
						?>
					</tbody>
				</table>
			</div>
			
			<div class="clearfix"></div>
			
			<div class="col-lg-2">
				<div class="row">
					<img src="img/box.png" style="width: 100%" />
				</div>
				<div class="row text-center">
					<h4>Caixa C</h4>
				</div>
			</div>
			<div class="col-lg-10 fixed-height" style="border: 1px solid black; margin-bottom: 10px">
				<table class="table">
					<thead>
						<tr>
							<th>Característica</th>
							<th>Nome no Jogo</th>
							<th>Descrição</th>
							<th>Referência</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$k = 0;
						foreach($dadosArray3 as $caixaC) {
						?>
							<tr>
								<td><?php echo $caixaC->getNomeAtributo(); ?></td>
								<td><?php echo $caixaC->getNomeJogo(); ?></td>
								<td><?php echo $caixaC->getDescricaoAtributo(); ?></td>
								<td><?php echo $referenciaArray3[$k]; ?></td>
							</tr>
						<?php
						$k++;
						}
						?>
					</tbody>
				</table>
			</div>
			
		</div>
		
		<!-- ------------------------------ JOGO ----------------------------- -->

		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<div class="row">
				<div style="display: inline-block; width: 75%; text-align: center"><h1>Rodada de Qualificação</h1></div>
				<div class="example" data-timer="300" style="float: right; width: 20%; display: inline-block"></div>
			</div>

			<div class="row">
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