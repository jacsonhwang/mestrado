<?php

function erro ($titulo, $mensagem, $linkVoltar) { ?>

<div class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">

			<div class="page-header">
				<h1><?php echo $titulo; ?></h1>
			</div>

			<div class="alert alert-danger" role="alert"><b>Erro!</b>&nbsp;<?php echo $mensagem; ?></div>

			<a href="<?php echo $linkVoltar; ?>">Voltar</a>

		</div>
	</div>
</div>

<?php }?>