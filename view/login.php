<?php include 'header.php'; ?>
	<div id="formularioLogin" class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
	
				<div id="loginTitulo" class="page-header">
					<h1>Login</h1>
				</div>
				
				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Usu&aacute;rio</label>
						<div class="col-sm-6">
							<input type="email" class="form-control" id="inputEmail3">
						</div>
					</div>
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Senha</label>
						<div class="col-sm-6">
							<input type="password" class="form-control" id="inputPassword3">
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
							<button type="submit" class="btn btn-default">Entrar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php include 'footer.php'; ?>