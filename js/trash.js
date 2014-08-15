function Trash() {
	this.entidades = [];
	
	this.displayEntities = function() {
		alert(JSON.stringify(this.entidades));
	}
	
	this.deleteEntity = function(entity) {
		if(!this.contains(entity))
			this.entidades.push(entity);
	}
	
	this.restoreEntity = function(entity) {
		var recuperada = null;
		if(this.contains(entity)) {
			var index = this.indexOf(entity);
			recuperada = this.entidades[index];
			this.entidades.slice(index, 1);
		}
		return recuperada;
	}
	
	this.restoreAll = function() {
		var retorno = this.entidades;
		this.entidades = [];
		return retorno;
	}
	
	this.contains = function(entity) {
		return this.indexOf(entity) > -1;
	}
	
	this.indexOf = function(entity) {
		var index = -1
		for(var i=0; i<this.entidades.length; i++) {
			if(this.entidades[i].getID()==entity.getID()){
				index = i;
			}
		}
		return index;
	}
	
	this.isEmpty = function() {
		return this.entidades.length = 0;
	}
}