function Pool() {
	this.entidades = [];
	
	this.displayEntities = function() {
		alert(JSON.stringify(this.entidades));
	}
	
	this.addEntity = function(entity) {
		if(!this.contains(entity))
			this.entidades.push(entity);
	}
	
	this.removeEntity = function(entity) {
		if(this.contains(entity)) {
			var index = this.indexOf(entity);
			this.entidades.splice(index,1);
		}
	}
	
	this.removeAll = function() {
		this.entidades = [];
	}
	
	this.returnAll = function() {
		return this.entidades;
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