function Entity () {
	this.nome = "";
	this.endereco = "";
	this.cpf = "";
	this.id;
	
	this.setNome = function(nome) {
		this.nome = nome;
	}
	
	this.getNome = function() {
		return this.nome;
	}
	
	this.setEndereco = function(endereco) {
		this.endereco = endereco;
	}
	
	this.getEndereco = function() {
		return this.endereco;
	}
	
	this.setCPF = function(cpf) {
		this.cpf = cpf;
	}
	
	this.getCPF = function() {
		return this.cpf;
	}
	
	this.setID = function(id) {
		this.id = id;
	}
	
	this.getID = function() {
		return this.id;
	}
	
	this.displayData = function() {
		alert(this.nome+", "+this.endereco+", "+this.cpf+"");
	}
}