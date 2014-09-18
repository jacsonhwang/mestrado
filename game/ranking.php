<?php session_start(); ?>

<div class="col-sm-3 col-md-2 sidebar">

	<ul class="nav nav-sidebar">
		<li class="tituloMenuSidebar"><a href="#" style="pointer-events: none; cursor: default;">Ranking</a></li>
	</ul>

	<ul class="nav nav-sidebar nav-tabs" role="tablist">
		<li class="active"><a href="#geral" role="tab" data-toggle="tab">Geral</a></li>
		
		<?php
		$entidadesArray = listarEntidade();
		
		foreach($entidadesArray as &$entidade) {
		?>
			<li><a href="<?php echo '#' . $entidade->getNome(); ?>" role="tab" data-toggle="tab"><?php echo $entidade->getNomeJogo(); ?></a></li>
		<?php 
		}
		?>
		
	</ul>
	
	<div class="tab-content">
		<div class="tab-pane active" id="geral">
		
			<?php
			// Exibir somente o ranking da entidade Produto.
			$rankingArray = listarQualidadeUsuarios(43);
			
			criarTabelaRanking($rankingArray);
			?>
			
		</div>
		
		<?php
		foreach($entidadesArray as &$entidade) {
		?>
			<div class="tab-pane" id="<?php echo $entidade->getNome(); ?>">
				<?php
				
				// Pontuação da entidade Pessoa está incompleta. Não exibir ranking.
				if($entidade->getId() == 1) {
					echo "Ranking indisponível.";
				}
				else {
					$rankingArray = listarQualidadeUsuarios($entidade->getId());
					criarTabelaRanking($rankingArray);
				}
				?>
			</div>
		<?php
		}
		?>
	</div>
	
</div>

<?php
function criarTabelaRanking($rankingArray) {
?>

	<div class="table-responsive">
		<table class="table table-bordered table-hover table-striped tabela-ranking">
			<thead>
				<tr>
					<th>#</th>
					<th>Nome</th>
					<th>Pontuação</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$i = 1;
				foreach($rankingArray as &$ranking) {
				?>
					<tr <?php if ($ranking["id"] == $_SESSION["id"]) { echo "style='font-weight: bold'"; } ?>>
						<td><?php echo $i; ?></td>
						<td><?php echo $ranking["nome"]; ?></td>
						<td><?php echo $ranking["qualidade"]; ?></td>
					</tr>
				<?php
				$i++;
				}
				?>
			</tbody>
		</table>
	</div>

<?php 
}
?>