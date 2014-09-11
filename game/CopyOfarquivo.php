<div
	class="col-sm-9 col-sm-offset-3 col-md-7 col-md-offset-2 menu-slider"
	id="arquivos">
	<div class="col-lg-2">
		<div class="row">
			<img src="img/box.png" style="width: 100%" />
		</div>
		<div class="row text-center">
			<h4>Caixa A</h4>
		</div>
	</div>

	<div class="col-lg-10 fixed-height"
		style="border: 1px solid black; margin-bottom: 10px">
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
						foreach ( $entidade as $key => $baseDados ) {
							if ($caixaA->getExibirAtributo () == 1) {
								?>
								<tr>
					<td><?php echo $baseDados->getNomeAtributo(); ?></td>
					<td><?php echo $baseDados->getNomeJogo(); ?></td>
					<td><?php echo $baseDados->getDescricaoAtributo(); ?></td>
					<td><?php echo teste; //echo $referenciaArray1[$i]; ?></td>
				</tr>
						<?php
							}
							$i ++;
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

	<div class="col-lg-10 fixed-height"
		style="border: 1px solid black; margin-bottom: 10px">
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
						foreach ( $dadosArray2 as $caixaB ) {
							if ($caixaB->getExibirAtributo () == 1) {
								?>
								<tr>
					<td><?php echo $caixaB->getNomeAtributo(); ?></td>
					<td><?php echo $caixaB->getNomeJogo(); ?></td>
					<td><?php echo $caixaB->getDescricaoAtributo(); ?></td>
					<td><?php echo $referenciaArray2[$j]; ?></td>
				</tr>
						<?php
							}
							$j ++;
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

	<div class="col-lg-10 fixed-height"
		style="border: 1px solid black; margin-bottom: 10px">
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
						foreach ( $dadosArray3 as $caixaC ) {
							if ($caixaC->getExibirAtributo () == 1) {
								?>
								<tr>
					<td><?php echo $caixaC->getNomeAtributo(); ?></td>
					<td><?php echo $caixaC->getNomeJogo(); ?></td>
					<td><?php echo $caixaC->getDescricaoAtributo(); ?></td>
					<td><?php echo $referenciaArray3[$k]; ?></td>
				</tr>
						<?php
							}
							$k ++;
						}
						?>
					</tbody>
		</table>
	</div>

</div>