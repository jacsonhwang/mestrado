<?php include 'header.php'; ?>
<?php include 'controller/usuariosControle.php'; ?>

<div id="formularioLogin" class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">

			<div class="page-header">
				<h2>Editar Usuário</h2>
			</div>
			
			<ol class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li><a href="painel_admin.php">Painel administrativo</a></li>
				<li><a href="usuarios.php">Usuários</a></li>
				<li class="active">Editar</li>
			</ol>
			
			<?php
			session_start();
			
			if(isset($_SESSION["emailAdmin"])) {
				if (isset($_SESSION["erroAlteracao"])) {
			?>
					<div class="alert alert-danger" role="alert"><?php echo $_SESSION["erroAlteracao"]; ?></div>
			<?php
				}
			?>
			
			<?php
				if(isset($_GET["email"])) {
					$email = $_GET["email"];
					
					$usuario = recuperarUsuario($email);
					
					guardarUsuarioSessao($usuario);
				}
			?>

			<form class="form-horizontal" role="form" action="controller/alterarDadosAdminControle.php" method="POST" id="formAlterarDados">
				<div class="form-group">
					<label for="inputNome" class="col-sm-2 control-label">Nome</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputNome" name="inputNome" value="<?php echo $_SESSION["edicao"]["nome"]; ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="inputEmail" name="inputEmail" value="<?php echo $_SESSION["edicao"]["email"]; ?>">
					</div>
				</div>				
				<div class="form-group">
					<label for="inputIdade" class="col-sm-2 control-label">Idade</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputIdade" name="inputIdade" value="<?php echo $_SESSION["edicao"]["idade"]; ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Sexo</label>
					<div class="col-sm-10">
						<label class="radio-inline"> <input type="radio"
							name="radioGenero" id="radioGenero" value="m" <?php if ($_SESSION["edicao"]["genero"] == "m") { echo "checked"; } ?>>Masculino
						</label> <label class="radio-inline"> <input type="radio"
							name="radioGenero" id="radioGenero" value="f" <?php if ($_SESSION["edicao"]["genero"] == "f") { echo "checked"; } ?>>Feminino
						</label>
					</div>
				</div>
				<div class="form-group">
					<label for="inputIdade" class="col-sm-2 control-label">Escolaridade</label>
					<div class="col-sm-10">
						<select class="form-control" id="selectEscolaridade" name="selectEscolaridade">
							<?php
							$opcoes["1"] = "Analfabeto";
							$opcoes["2"] = "Ensino fundamental";
							$opcoes["3"] = "Ensino médio";
							$opcoes["4"] = "Superior incompleto";
							$opcoes["5"] = "Superior completo";
							$opcoes["6"] = "Pós-graduado";
							$opcoes["7"] = "Mestrado";
							$opcoes["8"] = "Doutorado";
							$opcoes["9"] = "Superior em andamento";

							foreach($opcoes as $key => $opcao) {
								echo '<option value="' . $key . '"';
								
								if($_SESSION["edicao"]["escolaridade"] == $key) {
									echo " selected";
								}
								
								echo ">" . $opcao . "</option>";
							}
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="inputFormacaoAcademica" class="col-sm-2 control-label">Forma&ccedil;&atilde;o acad&ecirc;mica</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputFormacaoAcademica" name="inputFormacaoAcademica" <?php if(intval($_SESSION["edicao"]["escolaridade"]) <= 3) { echo " disabled"; } ?> value="<?php echo $_SESSION["edicao"]["formacaoAcademica"]; ?>">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12" style="margin-top: 20px">
						<button type="submit" class="btn btn-success" name="buttonAlterar" id="buttonAlterar" style="float: right;">Salvar alterações</button>
						<a class="btn btn-info" href="usuarios.php" role="button" style="float: left;">Voltar</a>
					</div>										
				</div>	
			</form>
			
			<?php
			} else {
			?>
			
				<div class="col-lg-10 col-lg-offset-1">
					<?php echo ERRO_LOGAR; ?>
				</div>
			
			<?php } unset($_SESSION["erroAlteracao"]); ?>
			
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$("#formAlterarDados").bootstrapValidator({
			feedbackIcons: {
	            valid: 'glyphicon glyphicon-ok',
	            invalid: 'glyphicon glyphicon-remove',
	            validating: 'glyphicon glyphicon-refresh'
	        },
	        fields: {
	        	inputNome: {
	        		validators: {
	        			notEmpty: {
	        				message: "Favor preencher o campo."
	        			}
	        		}
	        	},
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
	    		inputIdade: {
	    			validators: {
	        			notEmpty: {
	        				message: "Favor preencher o campo."
	        			},
	        			numeric: {
		        			message: "Idade inválida."
	        			}
	        		}
			    },
			    radioGenero: {
				    validators: {
					    notEmpty: {
						    message: "Favor escolher uma opção."
					    }
					}
			    },
			    selectEscolaridade: {
			    	validators: {
	        			notEmpty: {
	        				message: "Favor escolher uma opção."
	        			}
	        		}
				},
				inputFormacaoAcademica: {
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