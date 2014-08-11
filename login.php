<?php include 'header.php'; ?>
<div id="formularioLogin" class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">

			<div id="loginTitulo" class="page-header">
				<h1>Login</h1>
			</div>
			
			<?php
			session_start();
			
			if(!isset($_SESSION["nome"])) {
			?>
			
			<div class="alert alert-danger" role="alert" id="alertaLogin"><b>Erro!</b> E-mail ou senha incorretos.</div>
			
			<form class="form-horizontal" role="form" action="controller/loginControle.php" method="POST" id="formLogin">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-3 control-label">Usu&aacute;rio</label>
					<div class="col-sm-6">
						<input type="email" class="form-control" id="inputEmail3" name="inputEmail">
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-3 control-label">Senha</label>
					<div class="col-sm-6">
						<input type="password" class="form-control" id="inputPassword3" name="inputSenha">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-10">
						<div class="checkbox">
							<label> <input type="checkbox"> Lembrar</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-10">
						<button type="submit" class="btn btn-primary">Entrar</button>
					</div>
				</div>
			</form>
			
			<?php
			} else {
			?>
			
			<div class="alert alert-danger" role="alert"><b>Erro!</b> Usuário logado.</div>
			
			<a href="index.php">Voltar para página inicial</a>
			
			<?php } ?>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$("#formLogin").bootstrapValidator({
			feedbackIcons: {
	            valid: 'glyphicon glyphicon-ok',
	            invalid: 'glyphicon glyphicon-remove',
	            validating: 'glyphicon glyphicon-refresh'
	        },
	        fields: {
	        	inputEmail: {
	        		validators: {
	        			notEmpty: {
	        				message: "Favor preencher o campo."
	        			},
	        			emailAddress: {
	                        message: 'E-mail inválido.'
	                    }
	        		}
	        	},
	        	inputSenha: {
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