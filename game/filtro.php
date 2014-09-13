<div class="col-sm-9 col-sm-offset-3 col-md-4 col-md-offset-2 menu-slider" id="filtro" style="padding: 15px; height: 92%">
	<div class="col-sm-12" style="padding-bottom: 15px;" id="divFiltro">
	
	<!--  Exemplo
		<ul class="nav nav-tabs" role="tablist">
			<li class="active" id="liCaixaA"><a href="#tabCaixaA" role="tab" data-toggle="tab">Caixa A</a></li>
			<li id="liCaixaB"><a href="#tabCaixaB" role="tab" data-toggle="tab">Caixa B</a></li>
			<li id="liCaixaC"><a href="#tabCaixaC" role="tab" data-toggle="tab">Caixa C</a></li>
		</ul>
	-->
	
		<ul class="nav nav-tabs" role="tablist">
				<?php foreach($entidade->getArrayBaseDados() as $key => $baseDados) { ?>
				<li class="abaFiltro <?php if ($key==0) echo 'active';?>" id="li<?php echo $baseDados->getNomeJogo();?>" value="<?php echo $baseDados->getId();?>">
					<a href="#tab<?php echo $baseDados->getNomeJogo();?>" role="tab" data-toggle="tab"><?php echo $baseDados->getNomeJogo();?></a>
				</li>
				<?php }?>
		</ul>
	
		<!-- Tab panes -->
		<div class="tab-content" style="margin-top: 20px">
		
			<?php foreach($entidade->getArrayBaseDados() as $key => $baseDados) { ?>
		
			<div class="tab-pane tab <?php if ($key==0) echo 'active';?>" id="tab<?php echo $baseDados->getNomeJogo();?>">
				<form class="form-horizontal" id="form<?php echo $baseDados->getNomeJogo();?>">
					<?php
					foreach($baseDados->getMetaBaseDados() as $key2 => $metaBaseDados) {
						if($metaBaseDados->getExibirAtributo() == 1) {
					?>					
							<div class="form-group">
								<label for="<?php echo $metaBaseDados->getNomeAtributo(); ?>" class="col-sm-3 control-label"><?php echo $metaBaseDados->getNomeJogo(); ?></label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="<?php echo $metaBaseDados->getNomeAtributo(); ?>" name="<?php echo $metaBaseDados->getNomeAtributo(); ?>">
								</div>
							</div>
					<?php
						}
					}
					?>

					<div class="col-sm-11" style="padding-bottom: 15px;">
						<button class="btn btn-success botaoFiltrar" id="buttonFiltrar<?php echo $baseDados->getNomeJogo();?>">Filtrar</button>
					</div>
				</form>
			</div>
			
			<?php }?>
			
		</div>
	</div>
	
	<div class="clearfix"></div>

	<?php foreach($entidade->getArrayBaseDados() as $key => $baseDados) { ?>
		<div class="col-sm-12 divTabelaFiltro" id="divTabelaFiltro<?php echo $baseDados->getNomeJogo();?>">
			<table class="table tablesorter table-hover table-bordered table-striped tabelaFiltro" id="tabelaFiltro<?php echo $baseDados->getNomeJogo();?>">
				<thead>
					<tr></tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	<?php }?>

	<div class="col-sm-12 teste">
		<button class="btn btn-info" id="buttonLimparBusca">Limpar busca</button>
	</div>
</div>