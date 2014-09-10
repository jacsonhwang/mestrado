<?php

include realpath('header.php');
include realpath('dao/MetaBaseDadosDAO.php');
include realpath('dao/EntidadesListaDAO.php');
include realpath('/model/MetaBaseDados.php');
include realpath('controller/jogadaBancoControle.php');

$metaBaseDadosDAO = new MetaBaseDadosDAO();
$entidadesListaDAO = new EntidadesListaDAO();

$dadosArray1 = $metaBaseDadosDAO->listarDados(1);
$dadosArray2 = $metaBaseDadosDAO->listarDados(2);
$dadosArray3 = $metaBaseDadosDAO->listarDados(3);

$referenciaArray1 = $entidadesListaDAO->recuperarPrimeiraLinha(1, 'entidade_pessoa_1');
$referenciaArray2 = $entidadesListaDAO->recuperarPrimeiraLinha(2, 'entidade_pessoa_2');
$referenciaArray3 = $entidadesListaDAO->recuperarPrimeiraLinha(3, 'entidade_pessoa_3');

/* session_start();

$_SESSION["inicioJogo"] = date('Y-m-d H:i:s');

var_dump($_SESSION["inicioJogo"]); */

?>

<script>
$.blockUI({ message: null });

new Messi("Clique em OK para iniciar o jogo.", {
    title : "Iniciar jogo",
    titleClass : 'info',
    buttons : [ {
        id : 0,
        label : 'OK',
        val : 'X'
    } ],
    callback: function(val) {
        if(val == 'X') {
            
        	recuperarEntidadeAleatoria(1);
            iniciarContador();
            
            $.unblockUI();
        }
    }
});
</script>

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
		
		<div class="col-sm-9 col-sm-offset-3 col-md-4 col-md-offset-2 menu-slider" id="filtro" style="padding: 15px; height: 92%">
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
								if($dado->getExibirAtributo() == 1) {
							?>					
									<div class="form-group">
										<label for="<?php echo $dado->getNomeAtributo(); ?>" class="col-sm-3 control-label"><?php echo $dado->getNomeJogo(); ?></label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="<?php echo $dado->getNomeAtributo(); ?>" name="<?php echo $dado->getNomeAtributo(); ?>">
										</div>
									</div>
							<?php
								}
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
								if($dado->getExibirAtributo() == 1) {
							?>					
									<div class="form-group">
										<label for="<?php echo $dado->getNomeAtributo(); ?>" class="col-sm-3 control-label"><?php echo $dado->getNomeJogo(); ?></label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="<?php echo $dado->getNomeAtributo(); ?>">
										</div>
									</div>
							<?php
								}
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
								if($dado->getExibirAtributo() == 1) {
							?>					
									<div class="form-group">
										<label for="<?php echo $dado->getNomeAtributo(); ?>" class="col-sm-3 control-label"><?php echo $dado->getNomeJogo(); ?></label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="<?php echo $dado->getNomeAtributo(); ?>">
										</div>
									</div>
							<?php
								}
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
				<table class="table tablesorter table-hover" id="tabelaFiltroA">
					<thead>
						<tr></tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
			
			<div class="col-sm-12 divTabelaFiltro" id="divTabelaFiltroB">
				<table class="table tablesorter table-hover" id="tabelaFiltroB">
					<thead>
						<tr></tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
			
			<div class="col-sm-12 divTabelaFiltro" id="divTabelaFiltroC">
				<table class="table tablesorter table-hover" id="tabelaFiltroC">
					<thead>
						<tr></tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
			
			<div class="col-sm-12 teste">
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
							if ($caixaA->getExibirAtributo() == 1) {
						?>
								<tr>
									<td><?php echo $caixaA->getNomeAtributo(); ?></td>
									<td><?php echo $caixaA->getNomeJogo(); ?></td>
									<td><?php echo $caixaA->getDescricaoAtributo(); ?></td>
									<td><?php echo $referenciaArray1[$i]; ?></td>
								</tr>
						<?php
							}
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
							if ($caixaB->getExibirAtributo() == 1) {
						?>
								<tr>
									<td><?php echo $caixaB->getNomeAtributo(); ?></td>
									<td><?php echo $caixaB->getNomeJogo(); ?></td>
									<td><?php echo $caixaB->getDescricaoAtributo(); ?></td>
									<td><?php echo $referenciaArray2[$j]; ?></td>
								</tr>
						<?php
							}
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
							if ($caixaC->getExibirAtributo() == 1) {
						?>
								<tr>
									<td><?php echo $caixaC->getNomeAtributo(); ?></td>
									<td><?php echo $caixaC->getNomeJogo(); ?></td>
									<td><?php echo $caixaC->getDescricaoAtributo(); ?></td>
									<td><?php echo $referenciaArray3[$k]; ?></td>
								</tr>
						<?php
							}
							$k++;
						}
						?>
					</tbody>
				</table>
			</div>
			
		</div>
		
		<!-- ------------------------------ JOGO ----------------------------- -->
		
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		
			<!-- ------------------------------ LINHA 1 ------------------------------ -->
			
			<div class="row linha-titulo">
				<div class="titulo-rodada"><h1>Rodada de Qualificação</h1></div>
				
				<div style="float: right">
					<div class='text-center buttonJogo' id="buttonLimparTudo">
						<div>X</div>
						<div>Limpar</div>
					</div>
					<div class='text-center buttonJogo' id="buttonEncerrarJogo">
						<div>X</div>
						<div>Encerrar</div>
					</div>
					<div class='text-center buttonJogo' id="buttonDesistirJogo">
						<div>X</div>
						<div>Desistir</div>
					</div>
				</div>
				
				<!-- <div class="text-center linha-titulo-botoes">
				Limpar Encerrar Desistir
					<button type="button" class="btn btn-success btn-lg btn-block" id="buttonEncerrarJogo">ENCERRAR JOGO</button>
					<button type="button" class="btn btn-warning btn-lg btn-block" id="buttonLimparTudo">LIMPAR TUDO</button>
					<button type="button" class="btn btn-danger btn-lg btn-block" id="buttonDesistirJogo">DESISTIR</button>
				</div> -->
				
				<!-- <div class="contador" data-timer="300" style="float: right; width: 20%; display: inline-block"></div> -->
			</div>
			
			<div class="clearfix"></div>
			
			<!-- ------------------------------ LINHA 2 ------------------------------ -->
			
			<div class="row" style="width: 100%">
				<div class="contador" data-timer="300" style="float: right; width: 20%"></div>
			</div>
			
			<!-- ------------------------------ LINHA 3 ------------------------------ -->

			<div class="row area">

				<div id="views" class="col-lg-7">
					<ul id="viewsList" class='box-list'></ul>
					<!-- <div class="row lixeira">
						<div class="col-lg-7">
							<div id="trash" class="trash">
								<img src="trash.png" style="height: 100%">
							</div>
						</div>
					</div> -->
				</div>

				<div id="pool" class="col-lg-5">
					<ul id="poolList" class='box-list'></ul>
				</div>
			
			</div>
			
			<!-- ------------------------------ LINHA 4 ------------------------------ -->
			
			<!-- <div class="row lixeira">				
				<div class="col-lg-7">
					<div id="trash" class="trash">
						<img src="trash.png" style="height: 100%">
					</div>
				</div>
			</div> -->

		</div>

	</div>
</div>
</body>
</html>