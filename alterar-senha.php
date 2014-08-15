<?php include 'header.php'; ?>

<div id="formularioLogin" class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">

			<div class="page-header">
				<h2>Alterar senha</h2>
			</div>
			
			<ol class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li><a href="perfil_usuario.php">Configurações</a></li>
				<li class="active">Alterar senha</li>
			</ol>
			
			<?php
			session_start();
			
			if(isset($_SESSION["email"])) {
				if(isset($_SESSION["erroSenha"])) {
			?>
					<div class="alert alert-danger" role="alert"><?php echo $_SESSION["erroSenha"]; ?></div>
			<?php
				}
			?>
			
				<div class="col-lg-10 col-lg-offset-2">

					<form class="form-horizontal" role="form" action="controller/alterarSenhaControle.php" method="POST" id="formAlterarSenha">
						<div class="form-group">
							<label for="inputSenhaAtual" class="col-sm-3 control-label">Senha atual</label>
							<div class="col-sm-6">
								<input type="password" class="form-control" id="inputSenhaAtual" name="inputSenhaAtual">
							</div>
						</div>
						
						<div class="form-group">
							<label for="inputNovaSenha" class="col-sm-3 control-label">Nova senha</label>
							<div class="col-sm-6">
								<input type="password" class="form-control" id="inputNovaSenha" name="inputNovaSenha">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-1 col-sm-8">
								<button type="submit" class="btn btn-success" name="buttonAlterarSenha" id="buttonAlterarSenha" style="float: right">Alterar senha</button>
								<a class="btn btn-info" href="perfil_usuario.php" role="button" style="float: left;">Voltar</a>
							</div>										
						</div>	
					</form>
				</div>
			
			<?php
			} else {
			?>
				<div class="alert alert-danger" role="alert"><b>Erro!</b> Favor efetuar o login.</div>
			<?php
			}
			
			unset($_SESSION["erroSenha"]); 
			?>
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