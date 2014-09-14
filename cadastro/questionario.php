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
		<label class="radio-inline">
			<input type="radio" name="radioMarketplace" id="radioMarketplace" value="nao sei" <?php if($_SESSION["marketplaceCadastro"] == "nao sei") { echo "checked"; } ?>>Não sei
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
		<label class="radio-inline">
			<input type="radio" name="radioScience" id="radioScience" value="nao sei" <?php if($_SESSION["scienceCadastro"] == "nao sei") { echo "checked"; } ?>>Não sei
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
		<label class="radio-inline">
			<input type="radio" name="radioGaming" id="radioGaming" value="nao sei" <?php if($_SESSION["gamingCadastro"] == "nao sei") { echo "checked"; } ?>>Não sei
		</label>
	</div>
</div>