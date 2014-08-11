<?php include 'header.php'; ?>

<div id="formularioContato" class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">

			<div class="page-header">
				<h2>Contato</h2>
			</div>
			
			<div class="alert alert-danger" role="alert" id="alertaLogin"><b>Erro!</b> Erro ao enviar contato.</div>
						
			<form class="form-horizontal" role="form" action="controller/emailControle.php" method="POST" id="formContato">
				<div class="form-group">
					<label for="inputAssunto" class="col-sm-2 control-label">Assunto</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputAssunto" name="inputAssunto">
					</div>
				</div>				
				
				<div class="form-group">
					<label for="inputArea" class="col-sm-2 control-label">Mensagem</label>
					<div class="col-sm-10">					
						<textarea class="form-control" rows="3" name="inputMensagem"></textarea>
					</div>
				</div>
				
											
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default" name="buttonEnviarEmail" id="buttonEnviarEmail">Enviar</button>
					</div>										
				</div>	
			</form>
		</div>
	</div>
</div>