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
				<!-- <div class="form-group">
					<div class="col-sm-offset-3 col-sm-10">
						<div class="checkbox">
							<label> <input type="checkbox"> Lembrar</label>
						</div>
					</div>
				</div> -->
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-10">
						<button type="submit" class="btn btn-default">Entrar</button>
								
						<a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">Esqueci a senha</a>
						
						<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
						  <div class="modal-dialog modal-lg">

						      <div class="modal-dialog">
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
								        <h4 class="modal-title">Recuperação de Senha</h4>
								      </div>
								      <div class="modal-footer">
								      		<div>
										        <label for="inputEmail3" class="col-sm-3 control-label">Usu&aacute;rio</label>
												<div class="col-sm-6">
													<input type="email" class="form-control" name="inputEmailRecuperacao" id="inputEmailRecuperacao">
												</div>
											</div>
								      
								        <button type="button" class="btn btn-primary" id="buttonRecuperarSenha">Enviar</button>
								      </div>
									  <div  role="alert" id="alertaRecuperaLogin" style="visibility: hidden;"><b>Enviado com sucesso</div>	
								  </div><!-- /.modal-dialog -->
								</div>
						    </div>
						  </div>
						</div>		
						
					</div>
				</div>
			</form>
			
			<?php
			} else {
			?>
			
			<div class="alert alert-danger" role="alert"><b>Erro!</b> Usuário logado.</div>
			
			<a class="btn btn-info" href="index.php" role="button" style="float: left;">Voltar</a>
			
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


		 $('#buttonRecuperarSenha').click(function () {
			var emailRecuperacao = $("#inputEmailRecuperacao").val();

			$.ajax({
				type: "POST",
				url: "controller/recuperarSenhaControle.php",
				data: "email="+emailRecuperacao,
				async: false,
				success: function(msg) {
					if(msg){
					    $("#alertaRecuperaLogin").css('visibility','visible');
					    $("#alertaRecuperaLogin").addClass("alert alert-success");						
					} else {
						$("#alertaRecuperaLogin").css('visibility','visible');
						$("#alertaRecuperaLogin").addClass("alert alert-danger");
					}
				}
			}); 
		 });

	});
</script>
<?php include 'footer.php'; ?>