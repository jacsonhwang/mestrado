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
					<label class="col-sm-2 control-label">Gênero</label>
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
					<label for="inputFormacaoAcademica" class="col-sm-2 control-label">Forma&ccedil;&atilde;o
						acad&ecirc;mica</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputFormacaoAcademica" name="inputFormacaoAcademica"  value="<?php echo $_SESSION["formacaoAcademicaCadastro"]; ?>" <?php if($_SESSION["escolaridadeCadastro"] <= 3 || !isset($_SESSION["escolaridadeCadastro"])) { echo " disabled"; }?>>
					</div>
				</div>
				<p class="text-center"><strong>Participação em sistemas crowdsourcing</strong></p>
				<div class="form-group">
					<label class="col-sm-2 control-label">Marketplace</label>
					<div class="col-sm-10">
						<label class="radio-inline">
							<input type="radio" name="radioMarketplace" id="radioMarketplace" value="avancado" <?php if($_SESSION["marketplaceCadastro"] == "avancado") { echo "checked"; } ?>>Avançado
						</label>
						<label class="radio-inline">
							<input type="radio" name="radioMarketplace" id="radioMarketplace" value="intermediario" <?php if($_SESSION["marketplaceCadastro"] == "intermediario") { echo "checked"; } ?>>Intermediário
						</label>
						<label class="radio-inline">
							<input type="radio" name="radioMarketplace" id="radioMarketplace" value="basico" <?php if($_SESSION["marketplaceCadastro"] == "basico") { echo "checked"; } ?>>Básico
						</label>
						<label class="radio-inline">
							<input type="radio" name="radioMarketplace" id="radioMarketplace" value="nenhum" <?php if($_SESSION["marketplaceCadastro"] == "nenhum") { echo "checked"; } ?>>Nenhum
						</label>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Science</label>
					<div class="col-sm-10">
						<label class="radio-inline">
							<input type="radio" name="radioScience" id="radioScience" value="avancado" <?php if($_SESSION["scienceCadastro"] == "avancado") { echo "checked"; } ?>>Avançado
						</label>
						<label class="radio-inline">
							<input type="radio" name="radioScience" id="radioScience" value="intermediario" <?php if($_SESSION["scienceCadastro"] == "intermediario") { echo "checked"; } ?>>Intermediário
						</label>
						<label class="radio-inline">
							<input type="radio" name="radioScience" id="radioScience" value="basico" <?php if($_SESSION["scienceCadastro"] == "basico") { echo "checked"; } ?>>Básico
						</label>
						<label class="radio-inline">
							<input type="radio" name="radioScience" id="radioScience" value="nenhum" <?php if($_SESSION["scienceCadastro"] == "nenhum") { echo "checked"; } ?>>Nenhum
						</label>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Gaming</label>
					<div class="col-sm-10">
						<label class="radio-inline">
							<input type="radio" name="radioGaming" id="radioGaming" value="avancado" <?php if($_SESSION["gamingCadastro"] == "avancado") { echo "checked"; } ?>>Avançado
						</label>
						<label class="radio-inline">
							<input type="radio" name="radioGaming" id="radioGaming" value="intermediario" <?php if($_SESSION["gamingCadastro"] == "intermediario") { echo "checked"; } ?>>Intermediário
						</label>
						<label class="radio-inline">
							<input type="radio" name="radioGaming" id="radioGaming" value="basico" <?php if($_SESSION["gamingCadastro"] == "basico") { echo "checked"; } ?>>Básico
						</label>
						<label class="radio-inline">
							<input type="radio" name="radioGaming" id="radioGaming" value="nenhum" <?php if($_SESSION["gamingCadastro"] == "nenhum") { echo "checked"; } ?>>Nenhum
						</label>
					</div>
				</div>
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