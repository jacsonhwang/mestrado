<?php include 'header.php'; ?>

<div id="formularioLogin" class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">

			<div class="page-header">
				<h2>Alterar dados cadastrais</h2>
			</div>
			
			<?php
			session_start();
			
			if(isset($_SESSION["email"])) {
				if (isset($_SESSION["erroAlteracao"])) {
			?>
					<div class="alert alert-danger" role="alert"><?php echo $_SESSION["erroAlteracao"]; ?></div>
			<?php
				}
			?>

			<form class="form-horizontal" role="form" action="controller/alterarDadosControle.php" method="POST" id="formAlterarDados">
				<div class="form-group">
					<label for="inputNome" class="col-sm-2 control-label">Nome</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputNome" name="inputNome" value="<?php echo $_SESSION["nome"]; ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="inputEmail" name="inputEmail" value="<?php echo $_SESSION["email"]; ?>">
					</div>
				</div>				
				<div class="form-group">
					<label for="inputIdade" class="col-sm-2 control-label">Idade</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputIdade" name="inputIdade" value="<?php echo $_SESSION["idade"]; ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Sexo</label>
					<div class="col-sm-10">
						<label class="radio-inline"> <input type="radio"
							name="radioGenero" id="radioGenero" value="m" <?php if ($_SESSION["genero"] == "m") { echo "checked"; } ?>>Masculino
						</label> <label class="radio-inline"> <input type="radio"
							name="radioGenero" id="radioGenero" value="f" <?php if ($_SESSION["genero"] == "f") { echo "checked"; } ?>>Feminino
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
								
								if($_SESSION["escolaridade"] == $key) {
									echo " selected";
								}
								
								echo ">" . $opcao . "</option>";
							}
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="inputFormacaoAcademica" class="col-sm-2 control-label">Forma&ccedil;&atilde;o
						acad&ecirc;mica</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputFormacaoAcademica" name="inputFormacaoAcademica" <?php if($_SESSION["escolaridade"] <= 3) echo " disabled"; ?> value="<?php echo $_SESSION["formacaoAcademica"]; ?>">
					</div>
				</div>
				<p class="text-center"><strong>Participação em sistemas crowdsourcing</strong></p>
				<div class="form-group">
					<label class="col-sm-2 control-label">Marketplace</label>
					<div class="col-sm-10">
						<label class="radio-inline">
							<input type="radio" name="radioMarketplace" id="radioMarketplace" value="avancado" <?php if($_SESSION["marketplace"] == "avancado") { echo "checked"; } ?>>Avançado
						</label>
						<label class="radio-inline">
							<input type="radio" name="radioMarketplace" id="radioMarketplace" value="intermediario" <?php if($_SESSION["marketplace"] == "intermediario") { echo "checked"; } ?>>Intermediário
						</label>
						<label class="radio-inline">
							<input type="radio" name="radioMarketplace" id="radioMarketplace" value="basico" <?php if($_SESSION["marketplace"] == "basico") { echo "checked"; } ?>>Básico
						</label>
						<label class="radio-inline">
							<input type="radio" name="radioMarketplace" id="radioMarketplace" value="nenhum" <?php if($_SESSION["marketplace"] == "nenhum") { echo "checked"; } ?>>Nenhum
						</label>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Science</label>
					<div class="col-sm-10">
						<label class="radio-inline">
							<input type="radio" name="radioScience" id="radioScience" value="avancado" <?php if($_SESSION["science"] == "avancado") { echo "checked"; } ?>>Avançado
						</label>
						<label class="radio-inline">
							<input type="radio" name="radioScience" id="radioScience" value="intermediario" <?php if($_SESSION["science"] == "intermediario") { echo "checked"; } ?>>Intermediário
						</label>
						<label class="radio-inline">
							<input type="radio" name="radioScience" id="radioScience" value="basico" <?php if($_SESSION["science"] == "basico") { echo "checked"; } ?>>Básico
						</label>
						<label class="radio-inline">
							<input type="radio" name="radioScience" id="radioScience" value="nenhum" <?php if($_SESSION["science"] == "nenhum") { echo "checked"; } ?>>Nenhum
						</label>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Gaming</label>
					<div class="col-sm-10">
						<label class="radio-inline">
							<input type="radio" name="radioGaming" id="radioGaming" value="avancado" <?php if($_SESSION["gaming"] == "avancado") { echo "checked"; } ?>>Avançado
						</label>
						<label class="radio-inline">
							<input type="radio" name="radioGaming" id="radioGaming" value="intermediario" <?php if($_SESSION["gaming"] == "intermediario") { echo "checked"; } ?>>Intermediário
						</label>
						<label class="radio-inline">
							<input type="radio" name="radioGaming" id="radioGaming" value="basico" <?php if($_SESSION["gaming"] == "basico") { echo "checked"; } ?>>Básico
						</label>
						<label class="radio-inline">
							<input type="radio" name="radioGaming" id="radioGaming" value="nenhum" <?php if($_SESSION["gaming"] == "nenhum") { echo "checked"; } ?>>Nenhum
						</label>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default" name="buttonAlterar" id="buttonAlterar">Salvar alterações</button>
					</div>										
				</div>	
			</form>
			
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