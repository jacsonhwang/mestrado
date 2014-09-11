<div
	class="col-sm-9 col-sm-offset-3 col-md-4 col-md-offset-2 menu-slider"
	id="dicionario">

	<div class="col-sm-12 text-center"
		style="padding-top: 10px; padding-bottom: 15px;">
		<input type="text" class="form-control">
	</div>

	<div class="col-sm-12 text-center" style="padding-bottom: 15px;">
		<button class="btn btn-success">Buscar</button>
	</div>

	<div class="col-sm-12" style="padding-bottom: 15px;">
		<ul class="nav nav-tabs" role="tablist">
			<li class="active"><a href="#tabNome" role="tab" data-toggle="tab">Nome</a></li>
			<li><a href="#tabEndereco" role="tab" data-toggle="tab">Endereço</a></li>
			<li><a href="#tabCPF" role="tab" data-toggle="tab">CPF</a></li>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content">
			<div class="tab-pane active tab" id="tabNome">
				<table class="table">
					<thead>
						<tr>
							<th>Nome</th>
							<th>Frequência</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Ana Madalena</td>
							<td>2</td>
						</tr>
						<tr>
							<td>Claudio Matos da Silva</td>
							<td>1</td>
						</tr>
						<tr>
							<td>Lucas Matias</td>
							<td>3</td>
						</tr>
						<tr>
							<td>Jonathan Luiz</td>
							<td>5</td>
						</tr>
						<tr>
							<td>Maria de Jesus</td>
							<td>2</td>
						</tr>
						<tr>
							<td>Michel Litie</td>
							<td>10</td>
						</tr>
						<tr>
							<td>Renato Ares</td>
							<td>3</td>
						</tr>
						<tr>
							<td>William Marcos</td>
							<td>2</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="tab-pane tab" id="tabEndereco">Tabela endereços</div>
			<div class="tab-pane tab" id="tabCPF">Tabela CPF</div>
		</div>
	</div>

</div>