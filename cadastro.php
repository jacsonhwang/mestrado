<?php include_once __DIR__ . '/header.php'; ?>

<div id="formularioLogin" class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">

			<div class="page-header">
				<h2>Cadastro</h2>
			</div>
			
			<ol class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li class="active">Cadastro</li>
			</ol>
			
			<?php session_start(); ?>
			
			<?php if (isset($_SESSION["erro"])) { ?>
				<div class="alert alert-danger" role="alert"><?php echo $_SESSION["erro"]; ?></div>
			<?php } ?>

			<form class="form-horizontal" role="form" action="controller/cadastroControle.php" method="POST" id="formCadastro">
				<div class="form-group">
					<label for="inputNome" class="col-sm-2 control-label">Nome</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputNome" name="inputNome" value="<?php echo $_SESSION["nomeCadastro"]; ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="inputEmail" name="inputEmail" value="<?php echo $_SESSION["emailCadastro"]; ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="inputSenha" class="col-sm-2 control-label">Senha</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="inputSenha" name="inputSenha">
					</div>
				</div>
				<div class="form-group">
					<label for="inputIdade" class="col-sm-2 control-label">Idade</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputIdade" name="inputIdade" value="<?php echo $_SESSION["idadeCadastro"]; ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">G�nero</label>
					<div class="col-sm-10">
						<label class="radio-inline"> <input type="radio"
							name="radioGenero" id="radioGenero" value="m" <?php if($_SESSION["generoCadastro"] == "m") { echo "checked"; } ?>>Masculino
						</label> <label class="radio-inline"> <input type="radio"
							name="radioGenero" id="radioGenero" value="f" <?php if($_SESSION["generoCadastro"] == "f") { echo "checked"; } ?>>Feminino
						</label>
					</div>
				</div>
				<div class="form-group">
					<label for="selectEscolaridade" class="col-sm-2 control-label">Escolaridade</label>
					<div class="col-sm-10">
						<select class="form-control" id="selectEscolaridade" name="selectEscolaridade">
							<option disabled selected></option>
							<option value="1" <?php if($_SESSION["escolaridadeCadastro"] == "1") { echo "selected"; } ?>>Analfabeto</option>
							<option value="2" <?php if($_SESSION["escolaridadeCadastro"] == "2") { echo "selected"; } ?>>Ensino fundamental</option>
							<option value="3" <?php if($_SESSION["escolaridadeCadastro"] == "3") { echo "selected"; } ?>>Ensino m&eacute;dio</option>
							<option value="4" <?php if($_SESSION["escolaridadeCadastro"] == "4") { echo "selected"; } ?>>Superior incompleto</option>
							<option value="5" <?php if($_SESSION["escolaridadeCadastro"] == "5") { echo "selected"; } ?>>Superior completo</option>
							<option value="6" <?php if($_SESSION["escolaridadeCadastro"] == "6") { echo "selected"; } ?>>P&oacute;s-graduado</option>
							<option value="7" <?php if($_SESSION["escolaridadeCadastro"] == "7") { echo "selected"; } ?>>Mestrado</option>
							<option value="8" <?php if($_SESSION["escolaridadeCadastro"] == "8") { echo "selected"; } ?>>Doutorado</option>
							<!-- <option value="9" <?php //if($_SESSION["escolaridadeCadastro"] == "9") { echo "selected"; } ?>>Superior em andamento</option> -->
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="inputFormacaoAcademica" class="col-sm-2 control-label">Forma&ccedil;&atilde;o<br/>acad&ecirc;mica</label>
					<a href="#" title="<?php echo TOOLTIP_CADASTRO_FORMACAO_ACADEMICA;?>" class="tooltipQualificacao">
						<img src="img/help.png"/>
					</a>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputFormacaoAcademica" name="inputFormacaoAcademica"  value="<?php echo $_SESSION["formacaoAcademicaCadastro"]; ?>" <?php if($_SESSION["escolaridadeCadastro"] <= 3 || !isset($_SESSION["escolaridadeCadastro"])) { echo " disabled"; }?>>
					</div>
				</div>

				<?php include_once __DIR__ . "/cadastro/questionario.php"; ?>
				
				<div class="form-group">
					<div class="col-sm-12">
						<button type="submit" class="btn btn-success" name="buttonCadastrar" id="buttonCadastrar" style="float: right;">Cadastrar</button>
					</div>										
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$("#formCadastro").bootstrapValidator({
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
	                        message: 'E-mail inv�lido.'
	                    }
	        		}
	        	},
	        	inputSenha: {
	        		validators: {
	        			notEmpty: {
	        				message: "Favor preencher o campo."
	        			}
	        		}
	    		},
	    		inputIdade: {
	    			validators: {
	        			notEmpty: {
	        				message: "Favor preencher o campo."
	        			},
	        			numeric: {
		        			message: "Idade inv�lida."
	        			}
	        		}
			    },
			    radioGenero: {
				    validators: {
					    notEmpty: {
						    message: "Favor escolher uma op��o."
					    }
					}
			    },
			    selectEscolaridade: {
			    	validators: {
	        			notEmpty: {
	        				message: "Favor escolher uma op��o."
	        			}
	        		}
				},
				inputFormacaoAcademica: {
					validators: {
	        			notEmpty: {
	        				message: "Favor preencher o campo."
	        			}
	        		}
				},
				radioMarketplace: {
					validators: {
						notEmpty: {
							message: "Favor preencher o campo."
						}
					}
				},
				radioScience: {
					validators: {
						notEmpty: {
							message: "Favor preencher o campo."
						}
					}
				},
				radioGaming: {
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
<?php include_once __DIR__ . '/footer.php'; ?>