<?php include 'header.php'; ?>

<div id="formularioLogin" class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">

			<div class="page-header">
				<h2>Alterar senha</h2>
			</div>
			
			<?php
			session_start();
			
			if(isset($_SESSION["nome"])) {
			?>

			<form class="form-horizontal" role="form" action="../controller/alterarSenhaControle.php" method="POST" id="formAlterarSenha">
				<div class="form-group">
					<label for="inputSenhaAtual" class="col-sm-2 control-label">Senha atual</label>
					<div class="col-sm-6">
						<input type="password" class="form-control" id="inputSenhaAtual" name="inputSenhaAtual">
					</div>
				</div>
				
				<div class="form-group">
					<label for="inputNovaSenha" class="col-sm-2 control-label">Nova senha</label>
					<div class="col-sm-6">
						<input type="password" class="form-control" id="inputNovaSenha" name="inputNovaSenha">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default" name="buttonAlterarSenha" id="buttonAlterarSenha">Alterar senha</button>
					</div>										
				</div>	
			</form>
			
			<?php } ?>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$("#formAlterarSenha").bootstrapValidator({
			feedbackIcons: {
	            valid: 'glyphicon glyphicon-ok',
	            invalid: 'glyphicon glyphicon-remove',
	            validating: 'glyphicon glyphicon-refresh'
	        },
	        fields: {
	        	inputSenhaAtual: {
	        		validators: {
	        			notEmpty: {
	        				message: "Favor preencher o campo."
	        			}
	        		}
	        	},
	        	inputNovaSenha: {
	        		validators: {
	        			notEmpty: {
	        				message: "Favor preencher o campo."
	        			}
	        		}
	        	}
	        }
		});
	});
</script>
<?php include 'footer.php'; ?>