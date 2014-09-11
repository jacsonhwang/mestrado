<div class="col-sm-9 col-sm-offset-3 col-md-7 col-md-offset-2 menu-slider" id="arquivos">
	
	<?php foreach ($entidade as $key => $baseDados) { ?>
	
	<div class="col-lg-2">
		<div class="row">
			<img src="img/box.png" style="width: 100%" />
		</div>
		<div class="row text-center">
			<h4><?php echo $baseDados->getNomeJogo();?></h4>
		</div>
	</div>

	<div class="col-lg-10 fixed-height"
		style="border: 1px solid black; margin-bottom: 10px">
		<table class="table">
			<thead>
				<tr>
					<th>Caracter�stica</th>
					<th>Nome no Jogo</th>
					<th>Descri��o</th>
					<th>Refer�ncia</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 0;
					foreach($baseDados->getMetaBaseDados() as $key2 => $metaBaseDados) {
						if ($metaBaseDados->getExibirAtributo () == 1) {?>
							<tr>
								<td><?php echo $metaBaseDados->getNomeAtributo(); ?></td>
								<td><?php echo $metaBaseDados->getNomeJogo(); ?></td>
								<td><?php echo $metaBaseDados->getDescricaoAtributo(); ?></td>
								<td><?php echo 'teste'; //echo $referenciaArray1[$i]; ?></td>
							</tr>
						<?php }
						$i++;
					} ?>
			</tbody>
		</table>
	</div>

	<div class="clearfix"></div>

	<?php } ?>
</div>