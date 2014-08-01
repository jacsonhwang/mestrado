<?php include 'header.php'; ?>
<div id="formularioLogin">

	<div id="loginTitulo">
		<h1>Cadastro</h1>
	</div>
	
	<?php /* if (isset($_POST["inputNome"])) {
			echo "sim";
	}
	else {
		echo "não";
	}
	
	echo $_GET["inputNome"]; */
?>

	<form class="form-horizontal" role="form" action="../controller/cadastroControle.php" method="POST">
		<div class="form-group">
			<label for="inputNome" class="col-sm-2 control-label">Nome</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="inputNome" name="inputNome">
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail" class="col-sm-2 control-label">Email</label>
			<div class="col-sm-10">
				<input type="email" class="form-control" id="inputEmail" name="inputEmail">
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
				<input type="text" class="form-control" id="inputIdade" name="inputIdade">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Sexo</label>
			<div class="col-sm-10">
				<label class="radio-inline"> <input type="radio"
					name="inlineRadioOptions" id="radioGenero" value="m">Masculino
				</label> <label class="radio-inline"> <input type="radio"
					name="inlineRadioOptions" id="radioGenero" value="f">Feminino
				</label>
			</div>
		</div>
		<div class="form-group">
			<label for="inputIdade" class="col-sm-2 control-label">Escolaridade</label>
			<div class="col-sm-10">
				<select class="form-control" id="selectEscolaridade" name="selectEscolaridade">
					<option value="0"></option>
					<option value="1">Analfabeto</option>
					<option value="2">Ensino fundamental</option>
					<option value="3">Ensino m&eacute;dio</option>
					<option value="4">Superior incompleto</option>
					<option value="5">Superior completo</option>
					<option value="6">P&oacute;s-graduado</option>
					<option value="7">Mestrado</option>
					<option value="8">Doutorado</option>
					<option value="9">Superior em andamento</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="inputFormacaoAcademica" class="col-sm-2 control-label">Forma&ccedil;&atilde;o
				acad&ecirc;mica</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="inputFormacaoAcademica" name="inputFormacaoAcademica" disabled>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-default" name="buttonCadastrar">Cadastrar</button>
			</div>
		</div>
	</form>
</div>
<?php include 'footer.php'; ?>